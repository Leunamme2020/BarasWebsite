<?php include __DIR__ . '/includes/header.php'; ?>

<section class="container py-5">
  <div class="row mb-4 text-center">
    <div class="col">
      <h2 class="section-title text-primary mb-2">Adventure Activities</h2>
      <p class="text-muted mb-0">Surf, trek, and explore the natural playgrounds of Catanduanes.</p>
    </div>
  </div>
  <div class="row g-4">
    <?php
    $stmt = $pdo->query("SELECT * FROM adventures ORDER BY created_at DESC");
    foreach ($stmt as $row): ?>
      <div class="col-md-4">
        <div class="tour-card h-100 animated-card zoom-on-hover" tabindex="0" onclick="window.location.href='/gg/adventure_view.php?id=<?php echo (int)$row['id']; ?>'">
          <?php if (!empty($row['image'])): ?>
            <img src="<?php echo htmlspecialchars($row['image']); ?>" class="w-100 card-image" alt="<?php echo htmlspecialchars($row['title']); ?>" style="object-fit: cover; height: 350px; object-position: center;">
          <?php endif; ?>
          <div class="tour-card-body d-flex flex-column">
            <div class="tour-meta mb-1"><?php echo htmlspecialchars($row['activity_type'] ?: 'Adventure'); ?></div>
            <h5 class="card-title mb-2"><?php echo htmlspecialchars($row['title']); ?></h5>
            <p class="card-text small text-muted flex-grow-1"><?php echo nl2br(htmlspecialchars(substr($row['description'],0,150))); ?>...</p>
            <div class="mt-2">
              <a href="/gg/adventure_view.php?id=<?php echo (int)$row['id']; ?>" class="btn btn-sm btn-outline-primary" onclick="event.stopPropagation();">View Details</a>
              <?php if (is_logged_in()): ?>
                <a href="/gg/book.php?attraction_id=<?php echo (int)$row['id']; ?>" class="btn btn-sm btn-primary" onclick="event.stopPropagation();">Book Activity</a>
              <?php else: ?>
                <a href="#" class="btn btn-sm btn-outline-primary login-to-book-btn" onclick="event.stopPropagation();">Login to Book</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

<style>
.zoom-on-hover {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.zoom-on-hover:hover {
  transform: scale(1.05);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
  z-index: 10;
}

.zoom-on-hover:hover img {
  transform: scale(1.05);
}
</style>
