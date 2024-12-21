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


    <?php require 'navbar.php' ?>
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Blogs & News</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">LPI</a></li>
                <li class="breadcrumb-item active text-primary">Berita</li>
            </ol>
        </div>
    </div>
    <!-- Navbar & Hero End -->
    <?php
    require 'data.php';

    // Menentukan jumlah post per halaman
    $posts_per_page = 5;

    // Mendapatkan halaman saat ini dari query string, default ke halaman 1 jika tidak ada
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Menghitung offset untuk query
    $offset = ($current_page - 1) * $posts_per_page;

    // Mendapatkan semua post dan menyortirnya secara ascending berdasarkan ID
    $articlesMA = $controller->index();
    $getCategiry = $controller->getCategory();
    $getPendidikans = $controller->getPendidikan();

    // Mendapatkan jumlah total post
    $total_posts = count($articlesMA);

    // Memotong array berdasarkan halaman yang aktif
    $posts_on_current_page = array_slice($articlesMA, $offset, $posts_per_page);

    // Menghitung jumlah halaman yang diperlukan
    $total_pages = ceil($total_posts / $posts_per_page);

    // Mendapatkan artikel terbaru (hanya 3 artikel)
    $articlesMApaginasi = array_slice($articlesMA, 0, 2);

    // Fungsi untuk memotong teks
    function truncateContent($text, $maxLength)
    {
        return strlen($text) > $maxLength ? substr($text, 0, $maxLength) . '...' : $text;
    }
    // Memeriksa apakah ada error dalam array articlesMA
    if (isset($articlesMA['error'])) {
        // Menampilkan pesan error jika ditemukan
        echo '<p class="text-center m-5">Article tidak ditemukan.</p>';
        require 'footer.php';
        exit();
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <section class="mx-5">
                    <div class="container pb-5 j1" style="max-width: 800px; margin: auto;">
                        <?php if (isset($error_message)): ?>
                            <p><?php echo htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8'); ?></p>
                        <?php else: ?>
                        <?php endif; ?>
                        <?php if (isset($posts_on_current_page['error'])): ?>
                            <p><?php echo htmlspecialchars($posts_on_current_page['error'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <?php elseif (!empty($posts_on_current_page)): ?>
                            <?php foreach ($posts_on_current_page as $post): ?>
                                <div class="wow fadeInUp" data-wow-delay="0.2s">
                                    <a href="detail.php?id=<?php echo $post['article_id']; ?>" class="text-decoration-none text-dark">
                                        <h4 class="text-center pt-5 pb-2"><?php echo htmlspecialchars($post['article_title'], ENT_QUOTES, 'UTF-8'); ?></h4>
                                        <div class="row border-bottom border-dark mb">
                                            <div class="col-md-6">
                                                <img style="width: 100%; max-height: 200px; object-fit: cover; border-radius: 10px;" src="<?php echo htmlspecialchars($post['article_image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($post['article_title'], ENT_QUOTES, 'UTF-8'); ?>" />
                                                <p class="text-center text-muted mt-5"></p>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <p class="mb-4">
                                                    <?php 
                                                        // Deteksi apakah konten memiliki gambar menggunakan regex
                                                        if (preg_match('/<img[^>]*>/i', $post['article_content'])) {
                                                            echo "Lihat gambar selengkapnya";
                                                        } else {
                                                            echo truncateContent($post['article_content'], 200);
                                                        }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No articles found.</p>
                        <?php endif; ?>
                    </div>

                    <!-- Pagination Controls -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center wow fadeIn" data-wow-delay="0.5s">
                            <!-- Previous page link -->
                            <?php if ($current_page > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <!-- Page numbers -->
                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?php if ($i == $current_page) echo 'active'; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>

                            <!-- Next page link -->
                            <?php if ($current_page < $total_pages): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo $current_page + 1; ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </section>

            </div>
            <div class="col-sm-3 pr">

                <div class="row py-4 wow fadeInUp" data-wow-delay="0.4s">
                    <table class="table table-hover mt-3">
                        <h3 class="text-center">Kategori</h3>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($getCategiry)): ?>
                                <?php foreach ($getCategiry as $category): ?>
                                    <tr class="category-row">
                                        <td style="text-align: center;">
                                            <a href="beritacategory.php?id=<?php echo htmlspecialchars($category['category_id'], ENT_QUOTES, 'UTF-8'); ?>" class="category-link text-decoration-none">
                                                <?php echo htmlspecialchars($category['category_name'], ENT_QUOTES, 'UTF-8'); ?>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td style="text-align: center;">No categories available.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="row py-4 wow fadeInUp" data-wow-delay="0.4s">
                    <table class="table table-hover mt-3">
                        <h3 class="text-center">Pendidikan</h3>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($getPendidikans)): ?>
                                <?php foreach ($getPendidikans as $pend): ?>
                                    <tr class="category-row">
                                        <td style="text-align: center;">
                                            <?php if (strtolower($pend['pendidikan_name']) === 'kampus'): ?>
                                                <!-- Jika nama pendidikan 'kampus', arahkan ke afiliasikampus.php -->
                                                <a href="afiliasikampus.php" class="pendidikan-link text-decoration-none">
                                                    <?php echo htmlspecialchars($pend['pendidikan_name'], ENT_QUOTES, 'UTF-8'); ?>
                                                </a>
                                            <?php elseif (strtolower($pend['pendidikan_name']) === 'ma'): ?>
                                                <!-- Jika nama pendidikan 'ma', arahkan ke maalhidayahkauman.sch.id -->
                                                <a href="https://maalhidayahkauman.sch.id/berita.php" class="pendidikan-link text-decoration-none">
                                                    <?php echo htmlspecialchars($pend['pendidikan_name'], ENT_QUOTES, 'UTF-8'); ?>
                                                </a>
                                            <?php elseif (strtolower($pend['pendidikan_name']) === 'umum'): ?>
                                                <!-- Jika nama pendidikan 'ma', arahkan ke maalhidayahkauman.sch.id -->
                                                <a href="" class="pendidikan-link text-decoration-none" target="_blank">
                                                    <?php echo htmlspecialchars($pend['pendidikan_name'], ENT_QUOTES, 'UTF-8'); ?>
                                                </a>
                                            <?php else: ?>
                                                <!-- Untuk pendidikan lain, gunakan nama file sesuai dengan pendidikan -->
                                                <a href="<?php echo strtolower($pend['pendidikan_name']); ?>.php" class="pendidikan-link text-decoration-none">
                                                    <?php echo htmlspecialchars($pend['pendidikan_name'], ENT_QUOTES, 'UTF-8'); ?>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td style="text-align: center;">No categories available.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                </div>
                <div class="row pt-4 wow fadeInUp" data-wow-delay="0.2s">
                    <h2>Berita Terbaru</h2>
                </div>
                <div class="row pt-4">
                    <?php if (isset($error_message)): ?>
                        <p><?php echo htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php else: ?>
                    <?php endif; ?>
                    <?php if (isset($articlesMApaginasi['error'])): ?>
                        <p><?php echo htmlspecialchars($articlesMApaginasi['error'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php elseif (!empty($articlesMApaginasi)): ?>
                        <?php foreach ($articlesMApaginasi as $post): ?>
                            <div class="card pt-3 mb-4 bg-light wow fadeInRight" data-wow-delay="0.2s" style="width: 18rem">
                                <a href="detail.php?id=<?php echo $post['article_id']; ?>" class="text-decoration-none text-dark">
                                    <img style="width: 100%; max-height: 200px; object-fit: cover; border-radius: 10px;" class="card-img-top" src="<?php echo htmlspecialchars($post['article_image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($post['article_title'], ENT_QUOTES, 'UTF-8'); ?>" />
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($post['article_title'], ENT_QUOTES, 'UTF-8'); ?></h5>
                                    <p class="card-text">
                                        <?php 
                                            // Deteksi apakah konten memiliki gambar menggunakan regex
                                            if (preg_match('/<img[^>]*>/i', $post['article_content'])) {
                                                echo "Lihat gambar selengkapnya";
                                            } else {
                                                echo truncateContent($post['article_content'], 20);
                                            }
                                        ?>
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
    <?php require 'footer.php' ?>