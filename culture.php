<?php include __DIR__ . '/includes/header.php'; ?>

<div class="container py-5">
  <h2 class="fw-bold text-primary mb-4">Festivals & Culture</h2>
  <div class="row g-4">
    <?php
    $stmt = $pdo->query("SELECT * FROM culture ORDER BY festival_date ASC");
    foreach ($stmt as $row): ?>
      <div class="col-md-4">
        <div class="card h-100 animated-card shadow-lg" tabindex="0" onclick="window.location.href='/gg/culture_view.php?id=<?php echo (int)$row['id']; ?>'">
          <div class="image-container">
            <?php if (strpos(strtolower($row['title']), 'peñafrancia') !== false || strpos(strtolower($row['title']), 'penafrancia') !== false): ?>
              <img src="/gg/assets/images/PE.jpg" class="card-img-top card-image" alt="<?php echo htmlspecialchars($row['title']); ?>" style="object-fit: cover; height: 250px; width: 100%; object-position: center;">
            <?php elseif (!empty($row['image'])): ?>
              <?php if (strpos(strtolower($row['title']), 'baras') !== false || strpos(strtolower($row['title']), 'fiesta') !== false): ?>
                <img src="/gg/assets/images/ad.jpg" class="card-img-top card-image" alt="<?php echo htmlspecialchars($row['title']); ?>" style="object-fit: cover; height: 250px;">
              <?php elseif (strpos(strtolower($row['title']), 'catandungan') !== false): ?>
                <img src="/gg/assets/images/cc.jpg" class="card-img-top card-image" alt="<?php echo htmlspecialchars($row['title']); ?>" style="object-fit: cover; height: 250px;">
              <?php elseif (strpos(strtolower($row['title']), 'holy week') !== false): ?>
                <img src="/gg/assets/images/c.jpg" class="card-img-top card-image" alt="<?php echo htmlspecialchars($row['title']); ?>" style="object-fit: cover; height: 250px;">
              <?php else: ?>
                <img src="<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top card-image" alt="<?php echo htmlspecialchars($row['title']); ?>">
              <?php endif; ?>
            <?php endif; ?>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <h5 class="card-title mb-0 fw-bold"><?php echo htmlspecialchars($row['title']); ?></h5>
              <?php if (!empty($row['festival_date'])): ?>
                <span class="badge bg-primary bg-opacity-10 text-primary pill-soft pill-soft-blue">Date: <?php echo htmlspecialchars($row['festival_date']); ?></span>
              <?php endif; ?>
            </div>
            <p class="card-text text-muted flex-grow-1 mb-3"><?php echo nl2br(htmlspecialchars(substr($row['description'],0,150))); ?>...</p>
            <div class="d-flex justify-content-between align-items-center mt-auto">
              <a href="/gg/culture_view.php?id=<?php echo (int)$row['id']; ?>" class="btn btn-outline-primary px-3" onclick="event.stopPropagation();">View Details</a>
              <a href="/gg/contact.php" class="btn btn-primary px-3" onclick="event.stopPropagation();">Inquire</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

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

<?php include __DIR__ . '/includes/footer.php'; ?>
