<?php include __DIR__ . '/includes/header.php'; ?>

<section class="section-blue py-5 position-relative overflow-hidden">
  <!-- Background decoration -->
  <div class="position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(circle at 50% 0%, rgba(13, 110, 253, 0.05) 0%, transparent 50%); z-index: 0;"></div>
  
  <div class="container position-relative" style="z-index: 1;">
    <div class="row mb-5 text-center">
      <div class="col-lg-8 mx-auto">
        <div class="d-inline-flex align-items-center mb-3">
          <i class="fas fa-star text-warning fa-2x me-3"></i>
          <h2 class="section-title text-primary mb-0 display-5 fw-bold">Explore All Attractions</h2>
        </div>
        <p class="lead text-muted mb-0">Discover the complete collection of Catanduanes' amazing destinations and experiences</p>
      </div>
    </div>
    
    <!-- Category Filters -->
    <div class="row mb-4">
      <div class="col-12">
        <div class="d-flex flex-wrap justify-content-center gap-2" id="category-filters">
          <button class="btn btn-sm btn-outline-primary active" data-category="all">All</button>
          <button class="btn btn-sm btn-outline-primary" data-category="beach">Beaches</button>
          <button class="btn btn-sm btn-outline-primary" data-category="waterfall">Waterfalls</button>
          <button class="btn btn-sm btn-outline-primary" data-category="viewpoint">Viewpoints</button>
          <button class="btn btn-sm btn-outline-primary" data-category="cultural">Cultural</button>
          <button class="btn btn-sm btn-outline-primary" data-category="adventure">Adventure</button>
          <button class="btn btn-sm btn-outline-primary" data-category="nature">Nature</button>
        </div>
      </div>
    </div>
    
    <div id="attractions-list" class="row g-4">
      <?php
      $category = $_GET['category'] ?? 'all';
      
      $query = "SELECT * FROM attractions";
      $params = [];
      
      if ($category !== 'all') {
        $query .= " WHERE category = ?";
        $params[] = $category;
      }
      
      $query .= " ORDER BY created_at DESC";
      $stmt = $pdo->prepare($query);
      $stmt->execute($params);
      $rows = $stmt->fetchAll();
      
      if (!$rows): ?>
        <div class="col-12">
          <div class="alert alert-light border small mb-0">No attractions found. Add attractions from the admin dashboard to display them here.</div>
        </div>
      <?php endif; ?>

      <?php foreach ($rows as $row): ?>
        <div class="col-lg-4 col-md-6">
          <div class="tour-card h-100 animated-card shadow-lg" tabindex="0" onclick="window.location.href='/gg/attraction_view.php?id=<?php echo (int)$row['id']; ?>'">
            <div class="image-container">
              <?php if (!empty($row['image'])): ?>
                <img src="<?php echo htmlspecialchars($row['image']); ?>" class="w-100 card-image" alt="<?php echo htmlspecialchars($row['title']); ?>">
              <?php endif; ?>
            </div>
            <div class="tour-card-body d-flex flex-column p-4">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-primary bg-opacity-10 text-primary pill-soft pill-soft-blue"><?php echo htmlspecialchars($row['category'] ?: 'Attraction'); ?></span>
                <?php if (!empty($row['location'])): ?>
                  <small class="text-muted"><i class="fas fa-map-marker-alt me-1"></i><?php echo htmlspecialchars($row['location']); ?></small>
                <?php endif; ?>
              </div>
              <h5 class="card-title mb-2 fw-bold"><?php echo htmlspecialchars($row['title']); ?></h5>
              <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="fw-semibold text-primary fs-5"><?php echo (isset($row['price']) && $row['price'] !== null) ? '₱' . number_format($row['price'], 2) : 'Free'; ?></span>
                <div class="text-warning">
                  <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                </div>
              </div>
              <p class="card-text text-muted flex-grow-1 mb-3" style="text-align: justify;"><?php echo nl2br(htmlspecialchars(substr($row['description'],0,120))); ?>...</p>
              <div class="d-flex justify-content-between align-items-center mt-auto">
                <a href="/gg/attraction_view.php?id=<?php echo (int)$row['id']; ?>" class="btn btn-outline-primary px-3" onclick="event.stopPropagation();">View Tour</a>
                <?php if (is_logged_in()): ?>
                  <a href="/gg/book.php?attraction_id=<?php echo (int)$row['id']; ?>" class="btn btn-primary px-3" onclick="event.stopPropagation();">Book Now</a>
                <?php else: ?>
                  <a href="#" class="btn btn-primary px-3 login-to-book-btn" onclick="event.stopPropagation();">Login to Book</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<style>
/* Animated Card Effects */
.animated-card {
  cursor: pointer;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.animated-card:hover {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.animated-card:focus {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  outline: 3px solid rgba(13, 110, 253, 0.3);
  outline-offset: 2px;
}

.image-container {
  position: relative;
  overflow: hidden;
  border-radius: 8px 8px 0 0;
}

.card-image {
  transition: transform 0.3s ease;
  display: block;
  width: 100%;
  height: auto;
}

.animated-card:hover .card-image {
  transform: scale(1.1);
}

.animated-card:focus .card-image {
  transform: scale(1.1);
}

/* Tour Card Styles */
.tour-card {
  background: white;
  border-radius: 12px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
  border: 1px solid rgba(0, 0, 0, 0.05);
}

.tour-card:hover {
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
  transform: translateY(-5px) scale(1.02);
}

.tour-card:focus {
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
  transform: translateY(-5px) scale(1.02);
  outline: 3px solid rgba(13, 110, 253, 0.3);
  outline-offset: 2px;
}

.tour-card-body {
  background: white;
  padding: 1.5rem;
  display: flex;
  flex-direction: column;
  height: 100%;
}

/* Badge Styles */
.pill-soft {
  border-radius: 20px;
  padding: 0.25rem 0.75rem;
  font-size: 0.75rem;
  font-weight: 500;
}

.pill-soft-blue {
  background-color: rgba(13, 110, 253, 0.1);
  color: #0d6efd;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const categoryButtons = document.querySelectorAll('#category-filters button');
  const attractionsList = document.getElementById('attractions-list');
  
  // Handle category filter clicks
  categoryButtons.forEach(button => {
    button.addEventListener('click', function() {
      const category = this.getAttribute('data-category');
      
      // Update active state
      categoryButtons.forEach(btn => btn.classList.remove('active'));
      this.classList.add('active');
      
      // Update URL without page reload
      const url = new URL(window.location);
      if (category === 'all') {
        url.searchParams.delete('category');
      } else {
        url.searchParams.set('category', category);
      }
      window.history.pushState({}, '', url);
      
      // Show loading state
      attractionsList.style.opacity = '0.5';
      attractionsList.style.transition = 'opacity 0.3s ease';
      
      // Fetch filtered results
      fetch(url)
        .then(response => response.text())
        .then(html => {
          const parser = new DOMParser();
          const doc = parser.parseFromString(html, 'text/html');
          const newContent = doc.getElementById('attractions-list').innerHTML;
          
          // Fade out, update content, then fade in
          attractionsList.style.opacity = '0';
          setTimeout(() => {
            attractionsList.innerHTML = newContent;
            attractionsList.style.opacity = '1';
          }, 300);
        })
        .catch(error => {
          console.error('Error:', error);
          attractionsList.style.opacity = '1';
        });
    });
  });
  
  // Handle browser back/forward navigation
  window.addEventListener('popstate', function() {
    window.location.reload();
  });
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
