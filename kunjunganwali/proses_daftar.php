<?php
session_start(); // Mulai session untuk melacak status form

// Cek apakah form sudah pernah diproses
if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] === true) {
    echo "Anda sudah mendaftar. Harap tunggu konfirmasi lebih lanjut.";
    exit; // Stop eksekusi jika form sudah diproses
}

// Koneksi ke database
// $conn = new mysqli('localhost', 'root', '11999988zamA@', 'db_kunjungan');
$conn = new mysqli('lpi.maalhidayahkauman.sch.id', 'u697166679_templpi', '11999988zamA@', 'u697166679_templpi');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama_siswa = $_POST['nama_siswa'];
$nama_ortu = $_POST['nama_ortu'];
$tanggal = $_POST['tanggal'];
$sesi = $_POST['sesi'];
$asrama = $_POST['asrama'];

// Cek kapasitas
$query = "SELECT COUNT(*) AS total FROM kunjungan WHERE tanggal='$tanggal' AND sesi='$sesi'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

if ($row['total'] >= 30) {
    echo "Kuota untuk sesi ini sudah penuh. Silakan pilih sesi lain.";
} else {
    // Simpan data ke database
    $stmt = $conn->prepare("INSERT INTO kunjungan (nama_siswa, nama_ortu, tanggal, sesi, asrama, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("sssss", $nama_siswa, $nama_ortu, $tanggal, $sesi, $asrama);
    if ($stmt->execute()) {
        // Tandai form sudah diproses
        $_SESSION['form_submitted'] = true;
        echo "Pendaftaran berhasil!";
        // Redirect ke halaman untuk generate struk
        header("Location: generate_struk.php?id=" . $stmt->insert_id);
        exit(); // Jangan lanjutkan kode setelah redirect
    } else {
        echo "Gagal menyimpan data.";
    }
    $stmt->close();
}
$conn->close();
?>
