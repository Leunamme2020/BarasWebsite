<?php
require_once 'config.php';

header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Get the email from the request
$data = json_decode(file_get_contents('php://input'), true);
$email = filter_var($data['email'] ?? '', FILTER_VALIDATE_EMAIL);

if (!$email) {
    echo json_encode(['success' => false, 'message' => 'Please provide a valid email address']);
    exit;
}

// Check if user exists
$stmt = $conn->prepare("SELECT id, name FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // For security, don't reveal if the email exists or not
    echo json_encode(['success' => true, 'message' => 'If an account exists with this email, a password reset link has been sent.']);
    exit;
}

$user = $result->fetch_assoc();

// Generate a secure token
$token = bin2hex(random_bytes(32));
$expires = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token expires in 1 hour

// Store the token in the database
$stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_token_expires = ? WHERE id = ?");
$stmt->bind_param("ssi", $token, $expires, $user['id']);

if ($stmt->execute()) {
    // In a real application, you would send an email with a reset link
    // For demo purposes, we'll just log the reset link
    $resetLink = "http://" . $_SERVER['HTTP_HOST'] . "/gg/reset_password.php?token=" . $token;
    error_log("Password reset link for {$user['email']}: $resetLink");
    
    echo json_encode([
        'success' => true, 
        'message' => 'If an account exists with this email, a password reset link has been sent.',
        // For demo purposes, include the reset link in the response
        // In production, remove this and send an actual email
        'reset_link' => $resetLink
    ]);
} else {
    error_log("Failed to generate reset token for user {$user['id']}: " . $conn->error);
    echo json_encode([
        'success' => false, 
        'message' => 'Failed to process your request. Please try again.'
    ]);
}
?>
