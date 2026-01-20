<?php include __DIR__ . '/includes/header.php'; ?>

<style>
  .card-hover {
    transition: transform 0.2s, box-shadow 0.2s;
    position: relative;
  }
  .card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  }
  .card-link-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1;
  }
  .card-body {
    position: relative;
    z-index: 2;
  }
</style>

<div class="container py-5">
  <h2 class="fw-bold text-primary mb-4">Food & Local Dishes</h2>
  <div class="row g-4">
    <?php
    $stmt = $pdo->query("SELECT * FROM food ORDER BY created_at DESC");
    foreach ($stmt as $row): ?>
      <div class="col-md-4">
        <div class="card h-100 card-hover position-relative">
          <a href="/gg/food_view.php?id=<?php echo (int)$row['id']; ?>" class="stretched-link card-link-overlay"></a>
          <?php if (!empty($row['image'])): ?>
            <?php 
            $imageSrc = $row['image'];
            // Check if it's a blob URL (which won't work)
            if (strpos($imageSrc, 'blob:') === 0) {
                // Use a fallback image
                $imageSrc = '/gg/assets/images/food.jpg';
                // If food.jpg doesn't exist, use a default image
                if (!file_exists(__DIR__ . '/assets/images/food.jpg')) {
                    $imageSrc = '/gg/assets/images/aa.jpg'; // Use an existing image as fallback
                }
            }
            ?>
            <img src="<?php echo htmlspecialchars($imageSrc); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['name']); ?>" onerror="this.src='/gg/assets/images/aa.jpg'">
          <?php else: ?>
            <img src="/gg/assets/images/aa.jpg" class="card-img-top" alt="<?php echo htmlspecialchars($row['name']); ?>">
          <?php endif; ?>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
            <?php if (!empty($row['location'])): ?>
              <p class="small text-muted mb-2">Location: <?php echo htmlspecialchars($row['location']); ?></p>
            <?php endif; ?>
            <p class="card-text small text-muted flex-grow-1"><?php echo nl2br(htmlspecialchars(substr($row['description'],0,140))); ?>...</p>
            <a href="/gg/food_view.php?id=<?php echo (int)$row['id']; ?>" class="btn btn-sm btn-outline-primary mt-2 position-relative" style="z-index: 3;">View More</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
