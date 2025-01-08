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
                        // Menambahkan array sesi dengan tanggal dan jam
                        $sessions = [
                            1 => ['date' => '18 Januari 2025', 'time' => '09.00 - 11.00'],
                            2 => ['date' => '18 Januari 2025', 'time' => '13.00 - 15.00'],
                            3 => ['date' => '25 Januari 2025', 'time' => '09.00 - 11.00'],
                            4 => ['date' => '25 Januari 2025', 'time' => '13.00 - 15.00']
                        ];

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $session = $_POST['sesi']; // Mendapatkan sesi yang dipilih
                            $total = $controller->countContactsByPendidikanAndSubject('kunjunganwali', $session);
                        
                            // Cek apakah total antrean sudah mencapai 25
                            if ($total >= 25) {
                                echo '<script>alert("Pendaftaran untuk sesi ini sudah penuh. Silakan pilih sesi lain.");</script>';
                            } else {
                                $nomor = $total + 1;
                        
                                // Mengambil tanggal dan waktu sesuai sesi
                                $tanggalSesi = $sessions[$session]['date'];
                                $jamSesi = $sessions[$session]['time'];
                        
                                // Data yang dikirimkan
                                $contactData = [
                                    'contact_id' => 1,
                                    'name' => $_POST['nama_siswa'] . ' - ' . $_POST['nama_ortu'],
                                    'email' => $_POST['email'],
                                    'pendidikan' => 'kunjunganwali',
                                    'subject' => $_POST['sesi'],
                                    'message' => 
                                        "nomor antrian: " . $nomor . "\n" .
                                        "nama siswa: " . $_POST['nama_siswa'] . "\n" .
                                        "nama ortu: " . $_POST['nama_ortu'] . "\n" .
                                        "jam: " . $jamSesi . "\n" .
                                        "Tanggal: " . $tanggalSesi . "\n" .
                                        "Keperluan: " . $_POST['keperluan'],
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
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Kunjungan Wali </h4>
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
            <div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="bg-light p-5 rounded h-100 wow fadeInUp" data-wow-delay="0.2s">
                    <h4 class="text-primary">Kirim Formulir Berikut ini </h4>
                   
                    <form method="POST" onsubmit="disableSubmitButton()">
                        <div class="row mb-3">
                            <div class="col-md-6 form-group">
                                <label for="nama_siswa" class="col-form-label">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="nama_ortu" class="col-form-label">Nama Orang Tua</label>
                                <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" required>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="sesi" class="col-form-label">Tanggal dan Sesi Kunjungan</label>
                            <select class="form-control" id="sesi" name="sesi" required>
                                <option value="1">18 Januari 2025 - 09.00 - 11.00</option>
                                <option value="2">18 Januari 2025 - 13.00 - 15.00</option>
                                <option value="3">25 Januari 2025 - 09.00 - 11.00</option>
                                <option value="4">25 Januari 2025 - 13.00 - 15.00</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="asrama" class="col-form-label">Asrama</label>
                            <select class="form-control" id="asrama" name="asrama" required>
                                <option value="SMP Putra - Al Majid 2">SMP Putra - Al Majid 2</option>
                                <option value="MA Putra - Al Majid 1">MA Putra - Al Majid 1</option>
                                <option value="SMP & MA Putri - Asmah">SMP & MA Putri - Asmah</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="keperluan" class="form-label">keperluan</label>
                            <textarea class="form-control" id="keperluan" name="keperluan" rows="5" required></textarea>
                        </div>
                        <p>Bagi yang tidak memiliki Email bisa hubungi kontak berikut :</p>
                        <p class="medium mb-4">WA: <a href="https://wa.me/+628563559078">Bu Mei: +62 856-3559-078</a></p>
                        <button id="submitBtn" type="submit" class="btn btn-primary">Daftar</button>
                    </form>
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
