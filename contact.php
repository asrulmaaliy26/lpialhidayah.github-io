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
    <style>
    .btn-hover-effect {
        transition: all 0.3s ease-in-out; /* Efek transisi halus */
    }

    .btn-hover-effect:hover {
        background-color: #0056b3; /* Warna tombol saat hover */
        transform: scale(1.1); /* Membesarkan tombol saat hover */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Menambah bayangan */
    }
</style>
</head>

<body>

    <?php require 'navbar.php' ?>
    <?php require 'data.php' ?>
    <!-- Toast Container -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <!-- Pesan akan diganti secara dinamis dengan PHP -->
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $contactData = [
                            'name' => $_POST['name'],
                            'email' => $_POST['email'],
                            'pendidikan' => $_POST['pendidikan'],
                            'subject' => $_POST['subject'],
                            'message' => $_POST['message'],
                            'created_at' => date('Y-m-d\TH:i:s.000000Z'),
                            'updated_at' => date('Y-m-d\TH:i:s.000000Z'),
                        ];

                        $response = $controller->sendContactData($contactData);
                        if ($response) {
                            echo 'Pesan berhasil dikirim!';
                        } else {
                            echo 'Terjadi kesalahan, silakan coba lagi.';
                        }
                    }
                    ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Hubungi Kami</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">LPI</a></li>
                <li class="breadcrumb-item active text-primary">Contact</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->
    </div>
    <!-- Navbar & Hero End -->

    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
                <div class="row g-5">
                <div class="col-xl-6">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">

                        <div class="text-center mb-4">
                        <a href="https://lpi.maalhidayahkauman.sch.id/kunjunganwali.php" 
                        class="btn btn-primary btn-lg px-5 py-3 btn-hover-effect">
                            Form Kunjungnan Calon Santri Baru
                            </a>
                        </div>

                        <div class="text-center mb-4">
                        <a href="https://lpi.maalhidayahkauman.sch.id/kunjungantamu.php" 
                        class="btn btn-primary btn-lg px-5 py-3 btn-hover-effect">
                            Form Kunjungnan Tamu
                            </a>
                        </div>
                        <div class="bg-light rounded p-5 mb-5">
                            <h4 class="text-primary mb-4">Pengaduan dan Saran</h4>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="contact-add-item d-flex align-items-center mb-3">
                                        <div class="contact-icon text-primary me-3">
                                            <i class="fas fa-map-marker-alt fa-2x"></i>
                                        </div>
                                        <h4>Alamat</h4>
                                        
                                    </div>
                                    <p class="mb-0">Jl. KH Hasyim Asyari No.54, Kauman, Kec. Kauman, Kabupaten Tulungagung, Jawa Timur 66261</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-add-item d-flex align-items-center mb-3">
                                        <div class="contact-icon text-primary me-3">
                                            <i class="fas fa-tshirt fa-2x"></i> <!-- Ikon Laundry -->
                                        </div>
                                        <h4>Laundry</h4>
                                    </div>
                                    <p class="medium">WA: <a href="https://wa.me/+6287722318051">Bu Riris: +62 877‑2231‑8051</a></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-add-item d-flex align-items-center mb-3">
                                        <div class="contact-icon text-primary me-3">
                                            <i class="fas fa-school fa-2x"></i> <!-- Ikon SMP -->
                                        </div>
                                        <h4>SMP</h4>
                                    </div>
                                    <p class="medium">WA Bisnis: <a href="https://wa.me/+628563568978">Bu Latifah: +62 856‑3568‑978</a></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-add-item d-flex align-items-center mb-3">
                                        <div class="contact-icon text-primary me-3">
                                            <i class="fas fa-graduation-cap fa-2x"></i> <!-- Ikon MA -->
                                        </div>
                                        <h4>MA</h4>
                                    </div>
                                    <p class="medium">WA Bisnis: <a href="https://wa.me/08563559078">Bu Mei: 0856‑355‑9078</a></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-add-item d-flex align-items-center mb-3">
                                        <div class="contact-icon text-primary me-3">
                                            <i class="fas fa-mosque fa-2x"></i> <!-- Ikon Pondok -->
                                        </div>
                                        <h4>Pondok</h4>
                                    </div>
                                    <p class="medium">WA Bisnis: <a href="https://wa.me/085732189755">Bu Lia: 0857‑3218‑9755</a></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-add-item d-flex align-items-center mb-3">
                                        <div class="contact-icon text-primary me-3">
                                            <i class="fas fa-laptop-code fa-2x"></i> <!-- Ikon IT -->
                                        </div>
                                        <h4>IT</h4>
                                    </div>
                                    <p class="medium">WA Bisnis: <a href="https://wa.me/085730488236">Bu Ina: 0857‑3048‑8236</a></p>
                                </div>
                            </div>
                        </div>


                        <div class="bg-light p-5 rounded h-100 wow fadeInUp" data-wow-delay="0.2s">
                            <h4 class="text-primary">Kirim Pesan / Aduan Anda di Sini</h4>
                            <p class="mb-4">Silakan isi formulir di bawah ini untuk pertanyaan atau bantuan lebih lanjut. Kami akan segera menanggapi pesan Anda. Terima kasih.</p>
                            <form method="POST" action="">
                                <div class="row g-4">
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" id="name" name="name" placeholder="Nama Anda">
                                            <label for="name">Nama Lengkap</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control border-0" id="email" name="email" placeholder="Email Anda">
                                            <label for="email">Alamat Email</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <label for="phone">Tingkat Pendidikan :</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating custom-select-arrow">
                                            <?php
                                            $apiUrl = 'https://admin.maalhidayahkauman.sch.id/api/pendidikans';
                                            $pendidikanData = json_decode(file_get_contents($apiUrl), true);
                                            ?>
                                            <select class="form-control border-0" id="pendidikan" name="pendidikan">
                                                <?php foreach ($pendidikanData as $pendidikan): ?>
                                                    <option value="<?= $pendidikan['pendidikan_slug']; ?>"><?= $pendidikan['pendidikan_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <label for="project">Pendidikan</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" id="subject" name="subject" placeholder="Subjek">
                                            <label for="subject">Subjek Pengaduan</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control border-0" placeholder="Tulis pesan Anda di sini" id="message" name="message" style="height: 160px"></textarea>
                                            <label for="message">Pesan</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3">Kirim Pesan</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="rounded h-100">
                        <iframe class="rounded h-100 w-100"
                            style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15801.777997849458!2d111.8664144!3d-8.0560593!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78e300c4156a41%3A0xeb19fa0c03d695d3!2sMA%20AL%20HIDAYAH!5e0!3m2!1sid!2sid!4v1723621722673!5m2!1sid!2sid"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Tampilkan toast setelah form dikirim
        window.onload = function() {
            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') : ?>
                var toastElement = document.getElementById('liveToast');
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            <?php endif; ?>
        };
    </script>
    <!-- Contact End -->
    <?php require 'footer.php' ?>