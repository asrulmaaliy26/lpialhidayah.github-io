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
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="lib/animate/animate.min.css" />
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
        echo '<p class="text-center m-5">ID tidak ditemukan.</p>';
        require 'footer.php';
        exit();
    }

    // Menentukan jumlah post per halaman
    $posts_per_page = 6;

    $category_id = $post_id;

    // Mendapatkan halaman saat ini dari query string, default ke halaman 1 jika tidak ada
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Menghitung offset untuk query
    $offset = ($current_page - 1) * $posts_per_page;

    // Mendapatkan semua post dan menyortirnya secara ascending berdasarkan ID
    $articlesCategory = $controller->getArticleByOneTypes('category', $category_id);
    $getCategory = $controller->getOneCategory($category_id);

    // Mendapatkan jumlah total post
    $total_posts = count($articlesCategory);

    // Memotong array berdasarkan halaman yang aktif
    $posts_on_current_page = array_slice($articlesCategory, $offset, $posts_per_page);

    // Menghitung jumlah halaman yang diperlukan
    $total_pages = ceil($total_posts / $posts_per_page);
    ?>

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Kategori <?= $getCategory ?></h4>

            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">LPI</a></li>
                <li class="breadcrumb-item active text-primary">Kategori <?= $getCategory ?></li>
            </ol>
        </div>
    </div>
    <!-- Header End -->
    </div>

    <?php
    // Fungsi untuk memotong teks
    function truncateContent($text, $maxLength)
    {
        return strlen($text) > $maxLength ? substr($text, 0, $maxLength) . '...' : $text;
    }
    // Memeriksa apakah ada error dalam array articlesMA
    if (isset($articlesCategory['error'])) {
        // Menampilkan pesan error jika ditemukan
        echo '<p class="text-center m-5">Article tidak ditemukan.</p>';
        require 'footer.php';
        exit();
    }
    ?>

    <div class="container-fluid berita py-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <?php if (!empty($posts_on_current_page)): ?>
                    <?php foreach ($posts_on_current_page as $post): ?>
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="berita-item">
                                <div class="berita-img">
                                    <img src="<?php echo htmlspecialchars($post['article_image'], ENT_QUOTES, 'UTF-8'); ?>" class="img-fluid rounded-top w-100" style="height: 250px; object-fit: cover;" alt="<?php echo htmlspecialchars($post['article_title'], ENT_QUOTES, 'UTF-8'); ?>">
                                </div>
                                <div class="rounded-bottom p-4">
                                    <a href="detail.php?id=<?php echo $post['article_id']; ?>" class="h4 d-inline-block mb-4"><?php echo htmlspecialchars($post['article_title'], ENT_QUOTES, 'UTF-8'); ?></a>
                                    <p class="mb-4"><?php $content = strip_tags($post['article_content'] ?? '');
                                                    echo strlen($content) > 100 ? substr($content, 0, 100) . '...' : $content; ?></p>
                                    <a class="btn btn-primary rounded-pill py-2 px-4" href="detail.php?id=<?php echo $post['article_id']; ?>">Learn More</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No articles found.</p>
                <?php endif; ?>
            </div>

            <!-- Pagination Controls -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-between">
                    <!-- Previous Arrow -->
                    <?php if ($current_page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?id=<?php echo $post_id; ?>&page=<?php echo $current_page - 1; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <!-- Page Numbers -->
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php if ($i == $current_page) echo 'active'; ?>">
                            <a class="page-link" href="?id=<?php echo $post_id; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>

                    <!-- Next Arrow -->
                    <?php if ($current_page < $total_pages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?id=<?php echo $post_id; ?>&page=<?php echo $current_page + 1; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>

        </div>
    </div>

    <?php require 'footer.php' ?>