<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Sekolah Islam Alhidayah</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="icon" href="images/LOGOLPI.png">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <?php
  require 'navbar.php';
  require 'data.php';

  // Mengambil ID dari URL
  $post_id = isset($_GET['id']) ? intval($_GET['id']) : null;

  // Memeriksa apakah post_id ada
  if (!$post_id) {
    echo "<p>ID tidak ditemukan.</p>";
    require 'footer.php';
    exit();
  }

  try {
    // Mengambil artikel berdasarkan ID
    $post = $controller->getOneArticle($post_id);
    $articlesPaginasi = $controller->getArticlesPaginasi(2  );
  } catch (\Exception $e) {
    $error_message = 'Error: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
    echo "<p>{$error_message}</p>";
    require 'footer.php';
    exit();
  }

  if (!$post) {
    echo "<p>Post tidak ditemukan.</p>";
    require 'footer.php';
    exit();
  }
  ?>
  <section style="position: relative; text-align: center;">
    <img width="100%" style="height: 500px; object-fit: cover; filter: brightness(50%);" src="<?php echo htmlspecialchars($post['article_image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Article Image">
    <!-- Wrapper for text above the image -->
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100%;">
      <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s"><?php echo htmlspecialchars($post['article_title'], ENT_QUOTES, 'UTF-8'); ?></h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
          <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
          <li class="breadcrumb-item"><a href="#" class="text-white">LPI</a></li>
          <li class="breadcrumb-item"><a href="berita.php" class="text-white">Berita</a></li>
          <li class="breadcrumb-item active text-primary"><?php echo htmlspecialchars($post['article_title'], ENT_QUOTES, 'UTF-8'); ?></li>
        </ol>
      </div>
    </div>
  </section>


  <div class="container">
    <div class="row">
      <div class="col-sm-9">
        <section>
          <div class="container pt-5 pb-5 j1" style="max-width: 800px; margin: auto">
            <h4 class="text-center pt-5"><?php echo htmlspecialchars($post['article_title'], ENT_QUOTES, 'UTF-8'); ?></h4>
            <p class="text-center text-muted mb-5"><em><?php echo date('F j, Y', strtotime($post['created_at'] ?? 'now')); ?></em></p>
            <img class="mb-5" style="width: 80%; border-radius: 10px; display: block; margin: auto" src="<?php echo htmlspecialchars($post['article_image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($post['article_title'], ENT_QUOTES, 'UTF-8'); ?>" />
            <p><?php echo $post['article_content']; ?></p>

            <p class="text-center text-muted mt-5">
              <em><?php echo date('F j, Y', strtotime($post['created_at'] ?? 'now')); ?> | By: <?php echo !empty($post['article_author']) ? htmlspecialchars($post['article_author'], ENT_QUOTES, 'UTF-8') : '-'; ?></em>
            </p>
          </div>
        </section>
      </div>

      <div class="col-sm-3 pr">
        <div class="row pt-4">
          <h2>Berita Terbaru</h2>
        </div>
        <div class="row pt-4">
          <?php if (!empty($articlesPaginasi)): ?>
            <?php foreach ($articlesPaginasi as $article): ?>
              <div class="card pt-3 mb-5 bg-light" style="width: 18rem">
                <a href="detail.php?id=<?php echo htmlspecialchars($article['article_id'], ENT_QUOTES, 'UTF-8'); ?>" class="text-decoration-none text-dark">
                  <img class="card-img-top" src="<?php echo htmlspecialchars($article['article_image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($article['article_title'], ENT_QUOTES, 'UTF-8'); ?>" />
                </a>
                <div class="card-body">
                  <h5 class="card-title"><?php echo htmlspecialchars($article['article_title'], ENT_QUOTES, 'UTF-8'); ?></h5>
                  <p class="card-text">
                    <?php echo truncateText($article['article_content'], 50); ?>
                  </p>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p>No articles found.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

  <?php require 'footer.php'; ?>