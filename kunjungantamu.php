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
                                'contact_id' => 1, // Contoh ID tetap
                                'name' => $_POST['nama_penanggung_jawab'] . ' - ' . $_POST['nama_lembaga'], // Menggabungkan nama penanggung jawab dan nama lembaga
                                'email' => $_POST['email'], // Menggunakan nomor telepon sebagai email
                                'pendidikan' => 'kunjungan', // Dipatenkan sebagai 'kunjungan'
                                'subject' => $_POST['keperluan'], // Diisi dari combobox keperluan
                                'message' => 
                                    "nomor: " . $_POST['nomor_telepon'] . "\n" . 
                                    "Jumlah Guru: " . $_POST['jumlah_guru'] . "\n" .
                                    "Jumlah Siswa: " . $_POST['jumlah_siswa'] . "\n" .
                                    "Tanggal: " . $_POST['tanggal'] . "\n" .
                                    "Keterangan: " . $_POST['keterangan'], // Sisanya dirangkum di message
                                'created_at' => date('Y-m-d\TH:i:s.000000Z'),
                                'updated_at' => date('Y-m-d\TH:i:s.000000Z'),
                            ];

                            // Kirim data ke controller
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
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Kunjungan dan Tamu</h4>
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
                <div class="col-xl-7">
                    
                    <div class="wow fadeInUp" data-wow-delay="0.2s">

                        <div class="text-center mb-4">
                        <a href="https://lpi.maalhidayahkauman.sch.id/contact.php" 
                        class="btn btn-primary btn-lg px-5 py-3 btn-hover-effect">
                            Form Aduan 
                            </a>
                        </div>

                        <div class="bg-light p-5 rounded h-100 wow fadeInUp" data-wow-delay="0.2s">
                            <h4 class="text-primary">Kirim Pesan Anda di Sini</h4>
                            <p class="mb-4">Silakan isi formulir di bawah ini untuk pertanyaan atau bantuan lebih lanjut. Kami akan segera menanggapi pesan Anda. Terima kasih.</p>
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="nama_penanggung_jawab" class="form-label">Nama Penanggung Jawab</label>
                                    <input type="text" class="form-control" id="nama_penanggung_jawab" name="nama_penanggung_jawab" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_lembaga" class="form-label">Nama Lembaga</label>
                                    <input type="text" class="form-control" id="nama_lembaga" name="nama_lembaga" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah_guru" class="form-label">Jumlah Guru</label>
                                    <input type="number" class="form-control" id="jumlah_guru" name="jumlah_guru">
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah_siswa" class="form-label">Jumlah Siswa</label>
                                    <input type="number" class="form-control" id="jumlah_siswa" name="jumlah_siswa">
                                </div>
                                <div class="mb-3">
                                    <label for="keperluan" class="form-label">keperluan</label>
                                    <input type="text" class="form-control" id="keperluan" name="keperluan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan / Rincian</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </form>
                        </div>
                        <div class="text-center mt-4">
                        <a href="https://lpi.maalhidayahkauman.sch.id/beritacategory.php?id=20241221005437" 
                        class="btn btn-primary btn-lg px-5 py-3 btn-hover-effect">
                            Baca daftar kunjungan kami ---->
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 wow fadeInRight" data-wow-delay="0.2s">
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