<?php
require_once 'config.php';
require_once 'includes/auth_functions.php';

header('Content-Type: application/json');

$response = ['success' => false, 'message' => 'An error occurred.'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $response['message'] = 'Please fill in all fields.';
    } else {
        $login_result = login($email, $password);
        if ($login_result === true) {
            $response['success'] = true;
            $response['message'] = 'Login successful!';
        } elseif ($login_result === 'not_verified') {
            $response['message'] = 'Your account is not verified. Please check your email for a verification code.';
        } else {
            $response['message'] = 'Invalid email or password.';
        }
    }
}

echo json_encode($response);
?>
