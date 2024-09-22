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


    <?php include 'navbar.php' ?>
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Prestasi Al Hidayah</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">LPI</a></li>
                <li class="breadcrumb-item active text-primary">Prestasi</li>
            </ol>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <?php
    include 'data.php';

    // Mengambil artikel berdasarkan kategori, pendidikan, dan tingkat
    $articlesMATingkatkecamatan = $controller->getArticleByThreeTypes('Category', '3', 'pendidikan', '3', 'tingkat', '2');
    $articlesMATingkatkabupaten = $controller->getArticleByThreeTypes('Category', '3', 'pendidikan', '3', 'tingkat', '3');
    $articlesMATingkatprovinsi = $controller->getArticleByThreeTypes('Category', '3', 'pendidikan', '3', 'tingkat', '4');
    $articlesMATingkatnasional = $controller->getArticleByThreeTypes('Category', '3', 'pendidikan', '3', 'tingkat', '5');
    $articlesMATingkatasia = $controller->getArticleByThreeTypes('Category', '3', 'pendidikan', '3', 'tingkat', '6');
    $articlesMApaginasi = $controller->getArticleByTwoTypes('Category', '3', 'pendidikan', '3');
    $articlesMApaginasi = array_slice($articlesMApaginasi, 0, 2);
    ?>

    <!-- section -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <!-- Tingkat Asia -->
                <div class="row pt-4 wow fadeInDown" data-wow-delay="0.2s">
                    <?php if (isset($error_message)): ?>
                        <p><?php echo htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php else: ?>
                    <?php endif; ?>
                    <?php if (isset($articlesMATingkatasia['error'])): ?>
                        <p><?php echo htmlspecialchars($articlesMATingkatasia['error'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php elseif (!empty($articlesMATingkatasia)): ?>
                        <h4>TINGKAT ASIA<br><br></h4>
                        <?php foreach ($articlesMATingkatasia as $post): ?>
                            <a href="detail.php?id=<?php echo htmlspecialchars($post['article_id'], ENT_QUOTES, 'UTF-8'); ?>" class="text-decoration-none text-dark">
                                <p><?php echo htmlspecialchars($post['article_title'], ENT_QUOTES, 'UTF-8'); ?></p>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No articles found.</p>
                    <?php endif; ?>
                </div>


                <!-- Tingkat Nasional -->

                <div class="row pt-4 wow fadeInDown" data-wow-delay="0.2s">
                    <?php if (isset($error_message)): ?>
                        <p><?php echo htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php else: ?>
                    <?php endif; ?>
                    <?php if (isset($articlesMATingkatnasional['error'])): ?>
                        <p><?php echo htmlspecialchars($articlesMATingkatnasional['error'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php elseif (!empty($articlesMATingkatnasional)): ?>
                        <h4>TINGKAT nasional<br><br></h4>
                        <?php foreach ($articlesMATingkatnasional as $post): ?>
                            <a href="detail.php?id=<?php echo htmlspecialchars($post['article_id'], ENT_QUOTES, 'UTF-8'); ?>" class="text-decoration-none text-dark">
                                <p><?php echo htmlspecialchars($post['article_title'], ENT_QUOTES, 'UTF-8'); ?></p>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No articles found.</p>
                    <?php endif; ?>
                </div>

                <!-- Tingkat Provinsi -->

                <div class="row pt-4 wow fadeInUp" data-wow-delay="0.2s">
                    <?php if (isset($error_message)): ?>
                        <p><?php echo htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php else: ?>
                    <?php endif; ?>
                    <?php if (isset($articlesMATingkatprovinsi['error'])): ?>
                        <p><?php echo htmlspecialchars($articlesMATingkatprovinsi['error'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php elseif (!empty($articlesMATingkatprovinsi)): ?>
                        <h4>TINGKAT provinsi<br><br></h4>
                        <?php foreach ($articlesMATingkatprovinsi as $post): ?>
                            <a href="detail.php?id=<?php echo htmlspecialchars($post['article_id'], ENT_QUOTES, 'UTF-8'); ?>" class="text-decoration-none text-dark">
                                <p><?php echo htmlspecialchars($post['article_title'], ENT_QUOTES, 'UTF-8'); ?></p>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No articles found.</p>
                    <?php endif; ?>
                </div>

                <!-- Tingkat Kabupaten -->

                <div class="row pt-4 wow fadeInUp" data-wow-delay="0.2s">
                    <?php if (isset($error_message)): ?>
                        <p><?php echo htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php else: ?>
                    <?php endif; ?>
                    <?php if (isset($articlesMATingkatkabupaten['error'])): ?>
                        <p><?php echo htmlspecialchars($articlesMATingkatkabupaten['error'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php elseif (!empty($articlesMATingkatkabupaten)): ?>
                        <h4>TINGKAT kabupaten<br><br></h4>
                        <?php foreach ($articlesMATingkatkabupaten as $post): ?>
                            <a href="detail.php?id=<?php echo htmlspecialchars($post['article_id'], ENT_QUOTES, 'UTF-8'); ?>" class="text-decoration-none text-dark">
                                <p><?php echo htmlspecialchars($post['article_title'], ENT_QUOTES, 'UTF-8'); ?></p>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No articles found.</p>
                    <?php endif; ?>
                </div>

                <!-- Tingkat Kecamatan -->

                <div class="row pt-4 wow fadeInUp" data-wow-delay="0.2s">
                    <?php if (isset($error_message)): ?>
                        <p><?php echo htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php else: ?>
                    <?php endif; ?>
                    <?php if (isset($articlesMATingkatkecamatan['error'])): ?>
                        <p><?php echo htmlspecialchars($articlesMATingkatkecamatan['error'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php elseif (!empty($articlesMATingkatkecamatan)): ?>
                        <h4>TINGKAT kecamatan<br><br></h4>
                        <?php foreach ($articlesMATingkatkecamatan as $post): ?>
                            <a href="detail.php?id=<?php echo htmlspecialchars($post['article_id'], ENT_QUOTES, 'UTF-8'); ?>" class="text-decoration-none text-dark">
                                <p><?php echo htmlspecialchars($post['article_title'], ENT_QUOTES, 'UTF-8'); ?></p>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No articles found.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Sidebar untuk Prestasi Terbaru -->
            <div class="col-sm-4 pr">
                <div class="row pt-4 wow fadeInUp" data-wow-delay="0.2s">
                    <h2>Prestasi Terbaru</h2>
                </div>
                <div class="row pb-5 wow fadeInRight" data-wow-delay="0.2s"">
                    <?php
                    if (!empty($articlesMApaginasi)) {
                        foreach ($articlesMApaginasi as $post): ?>
                            <a href="detail.php?id=<?php echo htmlspecialchars($post['article_id'], ENT_QUOTES, 'UTF-8'); ?>" class="text-decoration-none text-dark">
                                <div class="card mt-5 pt-2 bg-light" style="width: 18rem;">
                                    <img class="card-img-top" src="<?php echo htmlspecialchars($post['article_image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo htmlspecialchars($post['article_title'], ENT_QUOTES, 'UTF-8'); ?></h5>
                                        <p class="card-text"><?php echo mb_strimwidth($post['article_content'], 0, 50, "..."); ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <p>No recent posts found.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir section -->

    <?php include 'footer.php'; ?>