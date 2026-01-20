<?php
require_once __DIR__ . '/config.php';

if (!is_logged_in()) {
    redirect('/gg/login.php');
}

$attraction_id = isset($_GET['attraction_id']) ? (int)$_GET['attraction_id'] : 0;

$stmt = $pdo->prepare('SELECT * FROM attractions WHERE id = ?');
$stmt->execute([$attraction_id]);
$attraction = $stmt->fetch();

if (!$attraction) {
    redirect('/gg/attractions.php');
}

$errors = [];
$success = '';
$booking_date = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $booking_date = $_POST['booking_date'] ?? '';
    if ($booking_date === '') {
        $errors[] = 'Booking date is required.';
    }

    if (!$errors) {
        $stmt = $pdo->prepare('INSERT INTO bookings (user_id, attraction_id, booking_date) VALUES (?,?,?)');
        $stmt->execute([$_SESSION['user_id'], $attraction_id, $booking_date]);
        $success = 'Booking request submitted. We will confirm via email.';
    }
}

include __DIR__ . '/includes/header.php';
?>

<div class="container py-5" style="max-width: 600px;">
  <h2 class="fw-bold text-primary mb-3">Book: <?php echo htmlspecialchars($attraction['title']); ?></h2>
  <p class="text-muted mb-4"><?php echo htmlspecialchars($attraction['location'] ?? ''); ?></p>

  <?php if ($errors): ?>
    <div class="alert alert-danger alert-auto-hide"><?php echo implode('<br>', array_map('htmlspecialchars', $errors)); ?></div>
  <?php endif; ?>
  <?php if ($success): ?>
    <div class="alert alert-success alert-auto-hide"><?php echo htmlspecialchars($success); ?></div>
  <?php endif; ?>

  <form method="post" novalidate>
    <div class="mb-3">
      <label class="form-label">Select Date</label>
      <input type="date" name="booking_date" class="form-control" required value="<?php echo htmlspecialchars($booking_date); ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit Booking</button>
  </form>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
