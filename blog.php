<?php
require_once __DIR__ . '/config.php';

$stmt = $pdo->query("SELECT * FROM blog_posts WHERE published = 1 ORDER BY created_at DESC");
$posts = $stmt->fetchAll();

include __DIR__ . '/includes/header.php';
?>

<div class="container py-5">
  <h2 class="fw-bold text-primary mb-4">News & Updates</h2>
  <div class="row g-4">
    <?php foreach ($posts as $post): ?>
      <div class="col-md-4">
        <div class="card h-100 card-hover">
          <?php if (!empty($post['image'])): ?>
            <img src="<?php echo htmlspecialchars($post['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($post['title']); ?>">
          <?php endif; ?>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?php echo htmlspecialchars($post['title']); ?></h5>
            <p class="small text-muted"><?php echo htmlspecialchars(date('M d, Y', strtotime($post['created_at']))); ?></p>
            <p class="card-text small text-muted flex-grow-1"><?php echo nl2br(htmlspecialchars(substr($post['content'],0,150))); ?>...</p>
            <a href="/gg/blog_post.php?id=<?php echo (int)$post['id']; ?>" class="btn btn-sm btn-primary mt-2">Read More</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <?php if (!$posts): ?>
      <p class="text-muted">No news posts yet.</p>
    <?php endif; ?>
  </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
