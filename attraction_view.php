<?php
require_once __DIR__ . '/config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $pdo->prepare('SELECT * FROM attractions WHERE id = ?');
$stmt->execute([$id]);
$attraction = $stmt->fetch();

if (!$attraction) {
    redirect('/gg/attractions.php');
}

$stmt = $pdo->prepare('SELECT r.*, u.name AS user_name FROM attraction_reviews r JOIN users u ON r.user_id = u.id WHERE r.attraction_id = ? ORDER BY r.created_at DESC');
$stmt->execute([$id]);
$reviews = $stmt->fetchAll();

$avgRating = null;
if ($reviews) {
    $sum = 0;
    foreach ($reviews as $r) {
        $sum += (int)$r['rating'];
    }
    $avgRating = round($sum / count($reviews), 1);
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && is_logged_in()) {
    $rating = (int)($_POST['rating'] ?? 0);
    $comment = trim($_POST['comment'] ?? '');
    if ($rating < 1 || $rating > 5) {
        $errors[] = 'Rating must be between 1 and 5.';
    }
    if (!$errors) {
        $stmt = $pdo->prepare('INSERT INTO attraction_reviews (user_id, attraction_id, rating, comment) VALUES (?,?,?,?)');
        $stmt->execute([$_SESSION['user_id'], $id, $rating, $comment]);
        redirect('/gg/attraction_view.php?id=' . $id);
    }
}

include __DIR__ . '/includes/header.php';
?>

<div class="container py-5">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/gg/index.php" class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item"><a href="/gg/attractions.php" class="text-decoration-none">Attractions</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($attraction['title']); ?></li>
    </ol>
  </nav>

  <!-- Attraction Detail Section -->
  <div class="row">
    <div class="col-lg-8">
      <!-- Main Image -->
      <?php if (!empty($attraction['image'])): ?>
        <div class="mb-4">
          <img src="<?php echo htmlspecialchars($attraction['image']); ?>" 
               class="img-fluid rounded shadow-lg w-100" 
               alt="<?php echo htmlspecialchars($attraction['title']); ?>"
               style="max-height: 600px; object-fit: cover; width: 100%;">
        </div>
      <?php endif; ?>

      <!-- Title and Description -->
      <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="display-5 fw-bold mb-0"><?php echo htmlspecialchars($attraction['title']); ?></h1>
            <?php if (!empty($attraction['category'])): ?>
              <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">
                <i class="fas fa-tag me-2"></i>
                 <?php echo htmlspecialchars($attraction['category']); ?>
              </span>
            <?php endif; ?>
          </div>

          <div class="prose">
            <p class="lead"><?php echo nl2br(htmlspecialchars($attraction['description'])); ?></p>
          </div>
        </div>
      </div>

      <!-- Additional Information -->
      <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body p-4">
          <h3 class="h4 fw-bold mb-3">About This Attraction</h3>
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <h6 class="text-muted small mb-2">Location</h6>
                <p class="mb-0"><i class="fas fa-map-marker-alt text-danger me-2"></i><?php echo htmlspecialchars($attraction['location']); ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <h6 class="text-muted small mb-2">Category</h6>
                <p class="mb-0"><i class="fas fa-tag text-primary me-2"></i><?php echo htmlspecialchars($attraction['category'] ?: 'Attraction'); ?></p>
              </div>
            </div>
          </div>
          
          <?php if (isset($attraction['price']) && $attraction['price'] !== null): ?>
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <h6 class="text-muted small mb-2">Price</h6>
                <p class="mb-0"><i class="fas fa-peso-sign text-success me-2"></i><?php echo '₱' . number_format($attraction['price'], 2); ?></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <h6 class="text-muted small mb-2">Duration</h6>
                <p class="mb-0"><i class="fas fa-clock text-primary me-2"></i><?php echo htmlspecialchars($attraction['duration'] ?: 'Flexible'); ?></p>
              </div>
            </div>
          </div>
          <?php endif; ?>
          
          <div class="mt-3">
            <h6 class="text-muted small mb-2">What to Expect</h6>
            <ul class="list-unstyled">
              <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Professional tour guides available</li>
              <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Safety equipment provided</li>
              <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Suitable for various skill levels</li>
              <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Eco-friendly practices</li>
              <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Photo opportunities</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
      <!-- Quick Actions -->
      <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body p-4">
          <h5 class="fw-bold mb-3">Quick Actions</h5>
          <div class="d-grid gap-2">
            <?php if (is_logged_in()): ?>
              <a href="/gg/book.php?attraction_id=<?php echo (int)$attraction['id']; ?>" class="btn btn-primary">
                <i class="fas fa-calendar-check me-2"></i>Book This Tour
              </a>
            <?php else: ?>
              <a href="#" class="btn btn-primary login-to-book-btn">
                <i class="fas fa-sign-in-alt me-2"></i>Login to Book
              </a>
            <?php endif; ?>
            <a href="/gg/contact.php" class="btn btn-outline-primary">
              <i class="fas fa-envelope me-2"></i>Inquire About This Tour
            </a>
            <a href="/gg/travel_guide.php" class="btn btn-outline-primary">
              <i class="fas fa-map me-2"></i>Travel Guide
            </a>
            <button class="btn btn-outline-secondary" onclick="window.print()">
              <i class="fas fa-print me-2"></i>Print Details
            </button>
          </div>
        </div>
      </div>

      <!-- Map -->
      <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body p-4">
          <h5 class="fw-bold mb-3">Map</h5>
          <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm mb-3">
            <iframe
              src="<?php echo !empty($attraction['map_embed_url']) ? htmlspecialchars($attraction['map_embed_url']) : 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63247.05917176302!2d124.0545!3d13.716667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a017b4f6f4d0b3%3A0x4c0c3d8f4d2ba8e7!2s' . urlencode(htmlspecialchars($attraction['location'] . ', Catanduanes, Philippines')) . '!5e0!3m2!1sen!2sph!4v1700000000000!5m2!1sen!2sph'; ?>"
              style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <?php 
          $directionsUrl = !empty($attraction['map_embed_url']) ? 
              ($attraction['title'] === 'Balacay Point' ? 'https://www.google.com/maps/dir/?api=1&destination=13.7052629,124.3926673' : 
               ($attraction['title'] === 'Binurong Point' ? 'https://www.google.com/maps/dir/?api=1&destination=13.6688234,124.4119557' : 
               ($attraction['title'] === 'Puraran Beach' ? 'https://www.google.com/maps/dir/?api=1&destination=13.6917432,124.3988179' : 
               ($attraction['title'] === 'Abihao Point' ? 'https://www.google.com/maps/dir/?api=1&destination=13.6550217,124.3991697' : 
               ($attraction['title'] === 'East cost Beach' ? 'https://www.google.com/maps/dir/?api=1&destination=13.6449217,124.3460071' : 
               ($attraction['title'] === 'Macutal Falls' ? 'https://www.google.com/maps/dir/?api=1&destination=13.6797755,124.3683567' : 
               'https://www.google.com/maps/dir/?api=1&destination=' . urlencode(htmlspecialchars($attraction['location'] . ', Catanduanes, Philippines')))))))) : 
              'https://www.google.com/maps/dir/?api=1&destination=' . urlencode(htmlspecialchars($attraction['location'] . ', Catanduanes, Philippines'));
          ?>
          <a href="<?php echo $directionsUrl; ?>" 
             target="_blank" 
             class="btn btn-primary btn-sm w-100">
            <i class="fas fa-directions me-2"></i>Get Directions
          </a>
        </div>
      </div>

      <!-- Ratings & Reviews -->
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">
          <h5 class="fw-bold mb-2">Ratings &amp; Reviews</h5>
          <?php if ($avgRating !== null): ?>
            <p class="mb-2">Average rating: <strong><?php echo $avgRating; ?>/5</strong> (<?php echo count($reviews); ?> reviews)</p>
          <?php else: ?>
            <p class="text-muted">No reviews yet. Be the first to review this attraction.</p>
          <?php endif; ?>

          <?php if ($errors): ?>
            <div class="alert alert-danger alert-auto-hide"><?php echo implode('<br>', array_map('htmlspecialchars', $errors)); ?></div>
          <?php endif; ?>

          <?php if (is_logged_in()): ?>
            <form method="post" class="mt-4">
              <div class="mb-3">
                <label class="form-label">Your Rating</label>
                <select name="rating" class="form-select" required>
                  <option value="">Select rating</option>
                  <option value="5">5 stars</option>
                  <option value="4">4 stars</option>
                  <option value="3">3 stars</option>
                  <option value="2">2 stars</option>
                  <option value="1">1 star</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Your Review</label>
                <textarea name="comment" rows="3" class="form-control" placeholder="Share your experience..." required></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit Review</button>
            </form>
          <?php else: ?>
            <p class="text-muted mt-3"><a href="#" class="login-to-book-btn">Login</a> to leave a review.</p>
          <?php endif; ?>

          <!-- Reviews List -->
          <div class="mt-4">
            <?php foreach ($reviews as $review): ?>
              <div class="list-group-item mb-2">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <strong><?php echo htmlspecialchars($review['user_name']); ?></strong>
                    <div class="text-warning small">
                      <?php for ($i = 1; $i <= 5; $i++): ?>
                        <?php if ($i <= (int)$review['rating']): ?>
                          <i class="fas fa-star"></i>
                        <?php else: ?>
                          <i class="far fa-star"></i>
                        <?php endif; ?>
                      <?php endfor; ?>
                    </div>
                  </div>
                  <small class="text-muted"><?php echo date('M j, Y', strtotime($review['created_at'])); ?></small>
                </div>
                <p class="mb-0 mt-2"><?php echo nl2br(htmlspecialchars($review['comment'])); ?></p>
              </div>
            <?php endforeach; ?>
            <?php if (!$reviews): ?>
              <div class="list-group-item text-muted">No reviews yet.</div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Back to Attractions -->
  <div class="mt-5">
    <a href="/gg/attractions.php" class="btn btn-outline-primary">
      <i class="fas fa-arrow-left me-2"></i>Back to Attractions
    </a>
  </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
