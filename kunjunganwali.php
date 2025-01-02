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

    <script>
        // Fungsi untuk menonaktifkan tombol setelah diklik
        function disableSubmitButton() {
            document.getElementById("submitBtn").disabled = true;
            document.getElementById("submitBtn").value = "Sedang memproses...";
        }
    </script>

    <style>
        .btn-hover-effect {
            transition: all 0.3s ease-in-out;
        }

        .btn-hover-effect:hover {
            background-color: #0056b3;
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .col-form-label {
            font-weight: bold;
        }

        .tabs-container {
            margin-top: 30px;
        }

        .nav-tabs .nav-item .nav-link {
            border-radius: 0;
            padding: 10px 20px;
        }

        .tab-content {
            padding: 20px;
            border-top: 1px solid #ddd;
        }

        .table-responsive {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
</head>

<body>

    <?php require 'navbar.php' ?>
    <?php require 'data.php' ?>

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Pendaftaran Kunjungan</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">LPI</a></li>
                <li class="breadcrumb-item active text-primary">Pendaftaran Kunjungan</li>
            </ol>
        </div>
    </div>

    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="bg-light p-5 rounded h-100 wow fadeInUp" data-wow-delay="0.2s">
                    <h4 class="text-primary">Pendaftaran Kunjungan</h4>
                    <p class="mb-4">Silakan isi formulir di bawah ini untuk mendaftar kunjungan. Kami akan segera mengonfirmasi pendaftaran Anda. Terima kasih.</p>
                    <form method="POST" action="kunjunganwali/proses_daftar.php" onsubmit="disableSubmitButton()">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="nama_siswa" class="col-form-label">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="nama_ortu" class="col-form-label">Nama Orang Tua</label>
                                <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal" class="col-form-label">Tanggal Kunjungan</label>
                            <select class="form-control" id="tanggal" name="tanggal" required>
                                <option value="2025-01-18">18 Januari 2025</option>
                                <option value="2025-01-25">25 Januari 2025</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sesi" class="col-form-label">Sesi</label>
                            <select class="form-control" id="sesi" name="sesi" required>
                                <option value="09.00 - 11.00">09.00 - 11.00</option>
                                <option value="13.00 - 15.00">13.00 - 15.00</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="asrama" class="col-form-label">Asrama</label>
                            <select class="form-control" id="asrama" name="asrama" required>
                                <option value="SMP Putra - Al Majid 2">SMP Putra - Al Majid 2</option>
                                <option value="MA Putra - Al Majid 1">MA Putra - Al Majid 1</option>
                                <option value="SMP & MA Putri - Asmah">SMP & MA Putri - Asmah</option>
                            </select>
                        </div>
                        <button id="submitBtn" type="submit" class="btn btn-primary">Daftar</button>
                    </form>
                </div>
            </div>
        

            <div class="wow fadeInDown m-5" data-wow-delay="0.2s">
                <?php 
                
                include 'tabel_antrian.php'; // Harus sesuaikan dengan sesi yang dipilih
                ?>
            </div>
            
        </div>
    </div>
    <!-- Contact End -->

    <?php require 'footer.php' ?>

    <script>
        // Membuat tab bekerja secara dinamis
        const tabLinks = document.querySelectorAll('.nav-link');
        tabLinks.forEach(link => {
            link.addEventListener('click', function() {
                tabLinks.forEach(link => link.classList.remove('active'));
                link.classList.add('active');
            });
        });
    </script>

</body>

</html>
