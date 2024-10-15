<!-- Topbar Start -->
<div class="container-fluid topbar px-5 d-none d-lg-block">
    <div class="row gx-0 align-items-center">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-flex flex-wrap">
                <a href="https://www.google.com/maps?ll=-8.056043,111.86642&z=16&t=m&hl=id&gl=ID&mapclient=embed&cid=16940846402841777619" class="text-muted small me-4"><i
                        class="fas fa-map-marker-alt text-primary me-2"></i>Find A Location</a>
                <a href="https://wa.me/+6282234639615" class="text-muted small me-4"><i
                        class="fas fa-phone-alt text-primary me-2"></i>+6282234639615</a>
                <a href="contact.php" class="text-muted small me-0"><i
                        class="fas fa-envelope text-primary me-2"></i>lpialhidayakauman@gmail.com</a>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-flex align-items-center justify-content-center">
                <p class="text-black me-2 mt-3">Hubungi Kami:</p>
                <div class="d-flex justify-content-center ms-2">
                    <a class="btn btn-md-square btn-light rounded-circle me-2"
                        href="https://www.facebook.com/Alhidayah.20"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-md-square btn-light rounded-circle mx-2"
                        href="https://www.youtube.com/@MA_Al-Hidayah_Tulungagung/featured"><i
                            class="fab fa-youtube"></i></a>
                    <a class="btn btn-md-square btn-light rounded-circle mx-2"
                        href="https://www.instagram.com/maalhidayah_"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-md-square btn-light rounded-circle ms-2"
                        href="https://wa.me/+6282234639615"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
    <?php
    // Dapatkan URL halaman saat ini
    $current_page = basename($_SERVER['REQUEST_URI'], ".php");
    ?>

    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand pt-1">
            <h1 class="text-primary"><img class="mx-2" src="images/LOGOLPI.png" alt=""> LPI <i>Al-Hidayah</i></h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link <?php echo in_array($current_page, ['index', '']) ? 'active' : ''; ?>">Beranda</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link <?php echo in_array($current_page, ['visimisilpi', 'strukturlpi', 'akreditasilpi', 'prestasilpi']) ? 'active' : ''; ?>" data-bs-toggle="dropdown">
                        <span class="dropdown-toggle">Tentang</span>
                    </a>
                    <div class="dropdown-menu m-0 ">
                        <a href="visimisilpi.php" class="dropdown-item ">Profil & Visi Misi</a>
                        <a href="strukturlpi.php" class="dropdown-item ">Struktur Organisasi</a>
                        <a href="akreditasilpi.php" class="dropdown-item ">Akreditasi</a>
                        <a href="prestasilpi.php" class="dropdown-item ">Prestasi</a>
                    </div>
                </div>

                <a href="berita.php" class="nav-item nav-link <?php echo $current_page == 'berita' ? 'active' : ''; ?>">Berita</a>
                <a href="afiliasikampus.php" class="nav-item nav-link <?php echo $current_page == 'afiliasikampus' ? 'active' : ''; ?>">Afiliasi Kampus</a>
                <a href="https://maalhidayahkauman.sch.id/" class="nav-item nav-link <?php echo $current_page == 'MA' ? 'active' : ''; ?>">MA</a>
                <a href="smp.php" class="nav-item nav-link <?php echo $current_page == 'smp' ? 'active' : ''; ?>">SMP</a>
                <a href="mahad.php" class="nav-item nav-link <?php echo $current_page == 'mahad' ? 'active' : ''; ?>">MAHAD</a>
                <a href="tpq.php" class="nav-item nav-link <?php echo $current_page == 'tpq' ? 'active' : ''; ?>">TPQ</a>
                <a href="contact.php" class="nav-item nav-link <?php echo $current_page == 'contact' ? 'active' : ''; ?>">Hubungi Kami</a>
            </div>
            <a href="https://ppdb.almannan.id/"
                class="btn btn-primary rounded-pill py-2 px-4 my-3 my-lg-0 flex-shrink-0">PPDB</a>
        </div>
    </nav>