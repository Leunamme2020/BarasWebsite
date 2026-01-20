<?php include __DIR__ . '/includes/header.php'; ?>

<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    redirect('/gg/culture.php');
}

$stmt = $pdo->prepare('SELECT * FROM culture WHERE id = ?');
$stmt->execute([$id]);
$culture = $stmt->fetch();

if (!$culture) {
    redirect('/gg/culture.php');
}
?>

<div class="container py-5">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/gg/index.php" class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item"><a href="/gg/culture.php" class="text-decoration-none">Culture & Festivals</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($culture['title']); ?></li>
    </ol>
  </nav>

  <!-- Culture Detail Section -->
  <div class="row">
    <div class="col-lg-8">
      <!-- Main Image -->
      <?php if (strpos(strtolower($culture['title']), 'peñafrancia') !== false || strpos(strtolower($culture['title']), 'penafrancia') !== false): ?>
        <div class="mb-4">
          <img src="/gg/assets/images/PE.jpg" 
               class="img-fluid rounded shadow-lg w-100" 
               alt="<?php echo htmlspecialchars($culture['title']); ?>"
               style="object-fit: cover; height: 600px; width: 100%; object-position: center;">
        </div>
      <?php elseif (!empty($culture['image'])): ?>
        <div class="mb-4">
          <?php if (strpos(strtolower($culture['title']), 'baras') !== false || strpos(strtolower($culture['title']), 'fiesta') !== false): ?>
            <img src="/gg/assets/images/ad.jpg" 
                 class="img-fluid rounded shadow-lg w-100" 
                 alt="<?php echo htmlspecialchars($culture['title']); ?>"
                 style="object-fit: cover; height: 600px;">
          <?php elseif (strpos(strtolower($culture['title']), 'catandungan') !== false): ?>
            <img src="/gg/assets/images/cc.jpg" 
                 class="img-fluid rounded shadow-lg w-100" 
                 alt="<?php echo htmlspecialchars($culture['title']); ?>"
                 style="object-fit: cover; height: 600px;">
          <?php elseif (strpos(strtolower($culture['title']), 'holy week') !== false): ?>
            <img src="/gg/assets/images/c.jpg" 
                 class="img-fluid rounded shadow-lg w-100" 
                 alt="<?php echo htmlspecialchars($culture['title']); ?>"
                 style="object-fit: cover; height: 600px;">
          <?php else: ?>
            <img src="<?php echo htmlspecialchars($culture['image']); ?>" 
                 class="img-fluid rounded shadow-lg w-100" 
                 alt="<?php echo htmlspecialchars($culture['title']); ?>"
                 style="max-height: 600px; object-fit: cover;">
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <!-- Title and Description -->
      <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="display-5 fw-bold mb-0"><?php echo htmlspecialchars($culture['title']); ?></h1>
            <?php if (!empty($culture['festival_date'])): ?>
              <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">
                <i class="fas fa-calendar-alt me-2"></i>
                 Date: <?php echo htmlspecialchars($culture['festival_date']); ?>
              </span>
            <?php endif; ?>
          </div>

          <div class="prose">
            <p class="lead"><?php echo nl2br(htmlspecialchars($culture['description'])); ?></p>
            
            <?php if (strpos(strtolower($culture['title']), 'peñafrancia') !== false || strpos(strtolower($culture['title']), 'penafrancia') !== false): ?>
            <div class="alert alert-info mt-4">
              <h5 class="alert-heading"><i class="fas fa-info-circle me-2"></i>Background of Peñafrancia Festival</h5>
              <p class="mb-2">
                The Peñafrancia Festival is one of the most significant religious celebrations in the Philippines, honoring Our Lady of Peñafrancia, the patroness of the Bicol Region. While originally centered in Naga City, this devotion has spread to various parts of Bicol, including Catanduanes.
              </p>
              <p class="mb-2">
                The festival traces its roots to 1710 when the image of Our Lady of Peñafrancia was brought to the Philippines from Spain. The devotion grew rapidly, and the feast day is celebrated every September 17th, drawing thousands of devotees who participate in various religious activities, processions, and cultural events.
              </p>
              <p class="mb-0">
                In Baras, the Peñafrancia celebration combines traditional religious practices with local culture, featuring novena prayers, fluvial processions (where applicable), street dancing, and community gatherings that showcase the deep faith and cultural heritage of the Catandunganons.
              </p>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- Additional Information -->
      <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body p-4">
          <h3 class="h4 fw-bold mb-3">About This Festival</h3>
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <h6 class="text-muted small mb-2">Location</h6>
                <p class="mb-0"><i class="fas fa-map-marker-alt text-primary me-2"></i>Baras, Catanduanes</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <h6 class="text-muted small mb-2">Category</h6>
                <p class="mb-0"><i class="fas fa-tag text-primary me-2"></i>Cultural Festival</p>
              </div>
            </div>
          </div>
          
          <div class="mt-3">
            <h6 class="text-muted small mb-2">What to Expect</h6>
            <ul class="list-unstyled">
              <?php if (strpos(strtolower($culture['title']), 'peñafrancia') !== false || strpos(strtolower($culture['title']), 'penafrancia') !== false): ?>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Novena prayers and religious processions</li>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Fluvial procession (if near water bodies)</li>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Street dancing and cultural presentations</li>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Traditional religious ceremonies</li>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Community feasts and gatherings</li>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Devotional activities and prayer services</li>
              <?php else: ?>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Traditional cultural performances</li>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Local cuisine and delicacies</li>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Community celebrations</li>
                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Cultural heritage displays</li>
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
            <a href="/gg/contact.php" class="btn btn-primary">
              <i class="fas fa-envelope me-2"></i>Inquire About This Festival
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
          <h5 class="fw-bold mb-3">Plan Your Visit</h5>
          <div class="small text-muted">
            <p class="mb-2">Experience the rich cultural heritage of Catanduanes through its vibrant festivals. Each celebration showcases the unique traditions, music, and cuisine of the island.</p>
            <p class="mb-0">Contact our tourism office for more information about accommodation and transportation during festival dates.</p>
          </div>
        </div>
      </div>

      <!-- Share -->
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">
          <h5 class="fw-bold mb-3">Share This Festival</h5>
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

  <!-- Back to Culture -->
  <div class="mt-5">
    <a href="/gg/culture.php" class="btn btn-outline-primary">
      <i class="fas fa-arrow-left me-2"></i>Back to Culture & Festivals
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
  const title = "<?php echo htmlspecialchars($culture['title']); ?>";
  window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}&quote=${encodeURIComponent(title)}`, '_blank');
}

function shareOnTwitter() {
  const url = window.location.href;
  const title = "<?php echo htmlspecialchars($culture['title']); ?>";
  window.open(`https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`, '_blank');
}

function shareOnWhatsApp() {
  const url = window.location.href;
  const title = "<?php echo htmlspecialchars($culture['title']); ?>";
  window.open(`https://wa.me/?text=${encodeURIComponent(title + ' ' + url)}`, '_blank');
}
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
