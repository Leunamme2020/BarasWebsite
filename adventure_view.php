<?php include __DIR__ . '/includes/header.php'; ?>

<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    redirect('/gg/adventure.php');
}

$stmt = $pdo->prepare('SELECT * FROM adventures WHERE id = ?');
$stmt->execute([$id]);
$adventure = $stmt->fetch();

if (!$adventure) {
    redirect('/gg/adventure.php');
}
?>

<div class="container py-5">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/gg/index.php" class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item"><a href="/gg/adventure.php" class="text-decoration-none">Outdoor Adventures</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($adventure['title']); ?></li>
    </ol>
  </nav>

  <!-- Adventure Detail Section -->
  <div class="row">
    <div class="col-lg-8">
      <!-- Main Image -->
      <?php if (!empty($adventure['image'])): ?>
        <div class="mb-4">
            <img src="<?php echo htmlspecialchars($adventure['image']); ?>" 
                 class="img-fluid rounded shadow-lg w-100" 
                 alt="<?php echo htmlspecialchars($adventure['title']); ?>"
                 style="max-height: 600px; object-fit: cover;">
        </div>
      <?php endif; ?>

      <!-- Title and Description -->
      <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="display-5 fw-bold mb-0"><?php echo htmlspecialchars($adventure['title']); ?></h1>
            <?php if (!empty($adventure['activity_type'])): ?>
              <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">
                <i class="fas fa-hiking me-2"></i>
                 <?php echo htmlspecialchars($adventure['activity_type']); ?>
              </span>
            <?php endif; ?>
          </div>

          <div class="prose">
            <p class="lead"><?php echo nl2br(htmlspecialchars($adventure['description'])); ?></p>
            
            <?php if (strpos(strtolower($adventure['title']), 'binurong point') !== false): ?>
            <div class="alert alert-info mt-4">
              <h5 class="alert-heading"><i class="fas fa-info-circle me-2"></i>About Binurong Point Adventure</h5>
              <p class="mb-2">
                Binurong Point is one of the most spectacular cliff-side destinations in Catanduanes, offering breathtaking panoramic views of the Pacific Ocean. This adventure involves a scenic trek through rolling hills and grassy landscapes leading to the iconic cliff viewpoint.
              </p>
              <p class="mb-2">
                The journey to Binurong Point is as rewarding as the destination itself, with trails that showcase the natural beauty of Baras municipality. The viewpoint provides perfect opportunities for photography, especially during sunrise and sunset when the landscape is bathed in golden light.
              </p>
              <p class="mb-0">
                This adventure is suitable for nature enthusiasts, photographers, and anyone looking to experience the raw, untouched beauty of Catanduanes' coastal landscapes. The moderate trek requires basic fitness levels but offers unforgettable views that make every step worthwhile.
              </p>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- Additional Information -->
      <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body p-4">
          <h3 class="h4 fw-bold mb-3">About This Adventure</h3>
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <h6 class="text-muted small mb-2">Location</h6>
                <p class="mb-0"><i class="fas fa-map-marker-alt text-primary me-2"></i>Baras, Catanduanes</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <h6 class="text-muted small mb-2">Activity Type</h6>
                <p class="mb-0"><i class="fas fa-hiking text-primary me-2"></i><?php echo htmlspecialchars($adventure['activity_type'] ?: 'Outdoor Adventure'); ?></p>
              </div>
            </div>
          </div>
          
          <div class="mt-3">
            <h6 class="text-muted small mb-2">What to Expect</h6>
            <ul class="list-unstyled">
              <?php if (strpos(strtolower($adventure['title']), 'binurong point') !== false): ?>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Scenic trek through rolling hills</li>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Panoramic ocean views</li>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Photography opportunities</li>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Sunrise/sunset viewing</li>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Nature immersion</li>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Guided trek options available</li>
              <?php else: ?>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Professional guides available</li>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Safety equipment provided</li>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Suitable for various skill levels</li>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Eco-friendly practices</li>
              <?php endif; ?>
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
              <a href="/gg/book.php?attraction_id=<?php echo (int)$adventure['id']; ?>" class="btn btn-primary">
                <i class="fas fa-calendar-check me-2"></i>Book This Adventure
              </a>
            <?php else: ?>
              <a href="#" class="btn btn-primary login-to-book-btn">
                <i class="fas fa-sign-in-alt me-2"></i>Login to Book
              </a>
            <?php endif; ?>
            <a href="/gg/contact.php" class="btn btn-outline-primary">
              <i class="fas fa-envelope me-2"></i>Inquire About This Adventure
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

      <!-- Related Information -->
      <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body p-4">
          <h5 class="fw-bold mb-3">Adventure Tips</h5>
          <div class="small text-muted">
            <p class="mb-2">Experience the thrill of outdoor adventures in Catanduanes. From cliff-side trekking to water sports, each activity offers unique opportunities to explore the island's natural beauty.</p>
            <p class="mb-0">Bring appropriate gear, stay hydrated, and always follow safety guidelines. Our local guides ensure a memorable and safe adventure experience.</p>
          </div>
        </div>
      </div>

      <!-- Share -->
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">
          <h5 class="fw-bold mb-3">Share This Adventure</h5>
          <div class="d-flex gap-2">
            <a href="#" class="btn btn-outline-primary btn-sm" onclick="shareOnFacebook()">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="btn btn-outline-info btn-sm" onclick="shareOnTwitter()">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="btn btn-outline-success btn-sm" onclick="shareOnWhatsApp()">
              <i class="fab fa-whatsapp"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Back to Adventures -->
  <div class="mt-5">
    <a href="/gg/adventure.php" class="btn btn-outline-primary">
      <i class="fas fa-arrow-left me-2"></i>Back to Outdoor Adventures
    </a>
  </div>
</div>

<style>
.prose {
  line-height: 1.8;
  color: #333;
}

.prose p {
  margin-bottom: 1.5rem;
}

.card {
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.breadcrumb {
  background: transparent;
  padding: 0;
}

.breadcrumb-item + .breadcrumb-item::before {
  content: ">";
  color: #6c757d;
}
</style>

<script>
function shareOnFacebook() {
  const url = window.location.href;
  const title = "<?php echo htmlspecialchars($adventure['title']); ?>";
  window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}&quote=${encodeURIComponent(title)}`, '_blank');
}

function shareOnTwitter() {
  const url = window.location.href;
  const title = "<?php echo htmlspecialchars($adventure['title']); ?>";
  window.open(`https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`, '_blank');
}

function shareOnWhatsApp() {
  const url = window.location.href;
  const title = "<?php echo htmlspecialchars($adventure['title']); ?>";
  window.open(`https://wa.me/?text=${encodeURIComponent(title + ' ' + url)}`, '_blank');
}
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
