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
    require 'data.php';

    $articlesPaginasi = $controller->getArticlesPaginasi(4); // Misalnya, mengambil halaman 1
    $articlesPaginasi8 = $controller->getArticlesPaginasi(8);
    function truncateContent($text, $maxLength)
    {
        return strlen($text) > $maxLength ? substr($text, 0, $maxLength) . '...' : $text;
    }
    ?>
    <?php include 'navbar.php' ?>

    <!-- Carousel Start -->
    <div class="header-carousel owl-carousel">
        <div class="header-carousel-item">
            <img src="https://admin.maalhidayahkauman.sch.id/uploads/articleimage/masa-taaruf-siswa-madrasah_20240827_163702.jpg?page=index.php"
                class="img-fluid w-100" alt="Image">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-12 animated fadeInUp">
                            <div class="text-center">
                                <h4 class="text-primary text-uppercase fw-bold mb-4">Welcome To LPI Alhidayah</h4>
                                <h1 class="display-4 text-uppercase text-white mb-4">MASA TA'ARUF SISWA MADRASAH
                                </h1>
                                <p class="mb-5 fs-5">Masa Perkenalan siswa - siswi madrasah kepada para kyai dan
                                    guru guru madrasah ....
                                </p>
                                <div class="d-flex justify-content-center flex-shrink-0 mb-5 p-2">
                                    <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="404.php"><i
                                            class="fas fa-play-circle me-2"></i> Watch Video</a>
                                    <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="404.php">Learn
                                        More</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-carousel-item">
            <img src="https://admin.maalhidayahkauman.sch.id/uploads/articleimage/haflah-tasyakuran-purna-siswa-kelas-xii_20240827_163334.jpg?page=index.php"
                class="img-fluid w-100" alt="Image">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row gy-0 gx-5">
                        <div class="col-lg-0 col-xl-5"></div>
                        <div class="col-xl-7 animated fadeInLeft">
                            <div class="text-sm-center text-md-end">
                                <h4 class="text-primary text-uppercase fw-bold mb-4">Welcome To LPI Alhidayah</h4>
                                <h1 class="display-4 text-uppercase text-white mb-4">HAFLAH TASYAKURAN AKHIRUSANNAH
                                </h1>
                                <p class="mb-5 fs-5">Purna siswa siswi madrasah aliyah kelas XII di akhirsannahnya
                                    menggelar HAFLAH TSYAKURAN untuk menghargai keberhasil siswa siswi .....
                                </p>
                                <div
                                    class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-5 p-2">
                                    <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="404.php"><i
                                            class="fas fa-play-circle me-2"></i> Watch Video</a>
                                    <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="404.php">Learn
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="https://ppdb.almannan.id/" style="text-decoration: none;">
        <div style="width: 100%; height: 100px; background-color: #343a40; color: white; display: flex; justify-content: center; align-items: center; font-size: 24px; font-weight: bold; transition: background-color 0.3s;">
            -- --> PPDB <-- --
                </div>
    </a>


    <!-- Carousel End -->
    </div>
    <!-- Navbar & Hero End -->


    <!-- Abvout Start -->
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <div class="image-container">
                        <div class="arrow-right">
                            <span class="arrow-text">←</span>
                        </div>
                        <img class="mb-5" src="images/LOGOLPI.png" alt="" style="width: 200px; height: 200px;">
                        <div class="arrow-left">
                            <span class="arrow-text">→</span>
                        </div>
                    </div>



                    <h4 class="text-primary">About Us</h4>
                    <h1 class="display-5">Video Profil</h1>
                </div>
                <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                    <div>
                        <p class="mb-4">Kami dengan bangga mengundang putra-putri Anda untuk bergabung bersama kami
                            dalam lingkungan pendidikan yang Islami dan berprestasi. Di PP Al Mannan, kami tidak hanya
                            fokus pada pembelajaran akademis, tetapi juga pada pembentukan karakter Islami dan
                            pengembangan kemampuan hafalan Al-Qur'an.

                        </p>
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="d-flex">
                                    <div><i class="fas fa-lightbulb fa-3x text-primary"></i></div>
                                    <div class="ms-4">
                                        <h4>Kreatifitas Siswa</h4>
                                        <p>Madrasah kami mencetak generasi kreatif dengan ide-ide cemerlang untuk masa
                                            depan gemilang.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <div class="d-flex">
                                    <div><i class="bi bi-bookmark-heart-fill fa-3x text-primary"></i></div>
                                    <div class="ms-4">
                                        <h4>Kenyamanan Belajar</h4>
                                        <p>Tempat nyaman untuk belajar dan menghafal Al-Qur'an dengan penuh ketenangan
                                            dan fokus!.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <a href="https://wa.me/+6282234639615"
                                    class="btn btn-primary rounded-pill py-3 px-5 flex-shrink-0">Discover Now</a>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex">
                                    <i class="fas fa-phone-alt fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>Call Us</h4>
                                        <p class="mb-0 fs-5" style="letter-spacing: 1px;">+6282234639615</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="bg-primary rounded position-relative overflow-hidden">
                        <iframe style="padding: 20px;" width="100%" height="315"
                            src="https://www.youtube.com/embed/1iDEgAOfr6k?si=OzusF-J7RLyTXTwm" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Features Start -->
    <div class="container-fluid feature pb-5 background-section" style="background-image: url('images/bg1.png'); background-attachment: fixed; background-size: cover; background-position: center;">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-white " style="font-weight: 700;">Our Features</h4>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item p-4">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fas fa-chalkboard-teacher  fa-4x text-primary"></i>
                        </div>
                        <h4>Total Pendidik</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit
                            pariatur...
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="404.php">Learn More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="feature-item p-4">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fas fa-university fa-4x text-primary"></i>
                        </div>
                        <h4>Total Siswa</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit
                            pariatur...
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="404.php">Learn More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="feature-item p-4">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fas fa-graduation-cap fa-4x text-primary"></i>
                        </div>
                        <h4>Total Alumni</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit
                            pariatur...
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="404.php">Learn More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="feature-item p-4">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fas fa-file-alt fa-4x text-primary"></i>
                        </div>
                        <h4>Total Pendaftar</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit
                            pariatur...
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="404.php">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Offer Start -->
    <div class="container-fluid offer-section pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Offer</h4>
                <h1 class="display-5 mb-4">Articles We Offer</h1>
                <p class="mb-0">Explore our latest articles covering various topics. Stay updated with fresh content!</p>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="nav nav-pills bg-light rounded p-5">
                        <?php if (!empty($articlesPaginasi)): ?>
                            <?php $i = 1; ?>
                            <?php foreach ($articlesPaginasi as $post): ?>
                                <a class="accordion-link p-4 <?php echo ($i === 1) ? 'active mb-4' : 'mb-4'; ?>" data-bs-toggle="pill" href="#collapse<?php echo $i; ?>">
                                    <h5 class="mb-0"><?php echo htmlspecialchars($post['article_title'], ENT_QUOTES, 'UTF-8'); ?></h5>
                                </a>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No articles found.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.4s">
                    <div class="tab-content">
                        <?php if (!empty($articlesPaginasi)): ?>
                            <?php $i = 1; ?>
                            <?php foreach ($articlesPaginasi as $post): ?>
                                <div id="collapse<?php echo $i; ?>" class="tab-pane fade <?php echo ($i === 1) ? 'show p-0 active' : 'p-0'; ?>">
                                    <div class="row g-4">
                                        <div class="col-md-7">
                                            <img src="<?php echo htmlspecialchars($post['article_image'], ENT_QUOTES, 'UTF-8'); ?>" class="img-fluid w-100 rounded" alt="Article Image">
                                        </div>
                                        <div class="col-md-5">
                                            <h1 class="display-5 mb-4"><?php echo htmlspecialchars($post['article_title'], ENT_QUOTES, 'UTF-8'); ?></h1>
                                            <p class="mb-4"><?php echo truncateContent($post['article_content'], 200); ?>...</p>
                                            <a class="btn btn-primary rounded-pill py-2 px-4" href="detail.php?id=<?php echo htmlspecialchars($post['article_id'], ENT_QUOTES, 'UTF-8'); ?>">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Blog Start -->
    <div class="container-fluid blog py-5" style="background-color:#343a40;">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Blog & News</h4>
                <h1 class="display-5 mb-4 text-white">Kegiatan Terkini Madrasah</h1>

            </div>
            <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay="0.2s">

                <?php if (!empty($articlesPaginasi8)): ?>
                    <?php foreach ($articlesPaginasi8 as $post): ?>
                        <div class="blog-item p-4">
                            <div class="blog-img mb-4">
                                <img src="<?php echo htmlspecialchars($post['article_image'], ENT_QUOTES, 'UTF-8'); ?>" class="img-fluid w-100 rounded" alt="">
                                <div class="blog-title">
                                    <a href="404.php" class="btn"><?php echo $controller->getOneCategory($post['category_id']) ?></a>
                                </div>
                            </div>
                            <a href="404.php" class="h4 d-inline-block mb-3"><?php echo htmlspecialchars($post['article_title'], ENT_QUOTES, 'UTF-8'); ?></a>
                            <p class="mb-4"><?php echo truncateContent($post['article_content'], 200); ?>
                            </p>
                            <div class="d-flex align-items-center">
                                <img src="images/logoma.png " class="img-fluid rounded-circle"
                                    style="width: 60px; height: 60px;" alt="">
                                <div class="ms-3">
                                    <h5><?php echo $controller->getOnePendidikan($post['pendidikan_id']) ?> Al Hidayah</h5>
                                    <p class="mb-0"><?php echo date('j F, Y', strtotime($post['created_at'] ?? 'now')); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No articles found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Blog End -->



    <section class="testimonials text-center">
        <!-- Testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                    <h1 class="display-6 mb-5">Kata Mereka</h1>
                    <hr size="4px" style="color: var(--dark);">
                </div>
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="katamereka-item text-center w-75">
                                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4"
                                        src="https://sekolahsabilillah.sch.id/public/img/testimoni/muhajjir.jpg"
                                        style="width: 100px; height: 100px;">
                                    <div class="katamereka-text">
                                        <p>“Penyemaian karakter di Lembaga pendidikan Islam Sabilillah Malang dengan
                                            mengedepankan komitmen keislaman, yakni komitmen kebangsaan serta
                                            kecendekiaannya, saya optimis akan berhasil dengan baik dan semoga
                                            menginspirasi lembaga-lembaga pendidikan yang lain”</p>
                                        <h5>Prof. Dr. Muhadjir Effendy, MAP</h5>
                                        <span>Menteri Pendidikan dan Kebudayaan Republik Indonesia Periode
                                            2016-2019</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="katamereka-item text-center w-75">
                                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4"
                                        src="https://sekolahsabilillah.sch.id/public/img/testimoni/walikota (1).jpg"
                                        style="width: 100px; height: 100px;">
                                    <div class="katamereka-text">
                                        <p>“Lembaga Pendidikan Sabilillah telah sukses dalam menerapkan inovasi dan
                                            kreatifitas yang dapat digunakan dalam menunjang proses belajar mengajar
                                            khususnya untuk menghadapi era milenial dan revolusi industri 4.0.”</p>
                                        <h5>Drs. H. Sutiaji</h5>
                                        <span>Walikota Malang</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tambahkan testimonial lainnya sesuai kebutuhan -->
                    </div>
                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                        data-bs-slide="prev">
                        <span class="fa fa-arrow-left" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                        data-bs-slide="next">
                        <span class="fa fa-arrow-right" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>
            </div>
        </div>
        <!-- Testimonial End -->
    </section>


    <div class="container-fluid blog py-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary mb-5">Kerja sama</h4>
                <div style="border-bottom: 2px solid #000;"></div>
            </div>

            <div class="marquee-wrapper wow fadeIn" data-wow-delay="0.2s">
                <div class="marquee">
                    <!-- Masukkan gambar atau logo di sini dan gandakan untuk efek infinite loop -->
                    <img src="images/logolpi.png" alt="Logo 1">
                    <img src="images/logolpi.png" alt="Logo 2">
                    <img src="images/logolpi.png" alt="Logo 3">
                    <img src="images/logolpi.png" alt="Logo 4">
                    <img src="images/logolpi.png" alt="Logo 5">
                    <img src="images/logolpi.png" alt="Logo 6">

                    <!-- Duplikat gambar untuk menghindari jeda animasi -->
                    <img src="images/logolpi.png" alt="Logo 1">
                    <img src="images/logolpi.png" alt="Logo 2">
                    <img src="images/logolpi.png" alt="Logo 3">
                    <img src="images/logolpi.png" alt="Logo 4">
                    <img src="images/logolpi.png" alt="Logo 5">
                    <img src="images/logolpi.png" alt="Logo 6">
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>