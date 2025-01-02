<?php
// Koneksi ke database
// $conn = new mysqli('localhost', 'root', '11999988zamA@', 'db_kunjungan');
$conn = new mysqli('lpi.maalhidayahkauman.sch.id', 'u697166679_templpi', '11999988zamA@', 'u697166679_templpi');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data berdasarkan ID
$id = $_GET['id'];
$query = "SELECT * FROM kunjungan WHERE id=$id";
$result = $conn->query($query);
$data = $result->fetch_assoc();

// Membuat gambar
$image = imagecreate(400, 200);

// Warna
$background = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 0, 0);
$watermark_color = imagecolorallocate($image, 200, 200, 200); // Warna watermark

// Menambahkan teks ke gambar
imagestring($image, 5, 10, 10, "Struk Kunjungan", $text_color);
imagestring($image, 4, 10, 40, "Nama Siswa: " . $data['nama_siswa'], $text_color);
imagestring($image, 4, 10, 60, "Nama Ortu: " . $data['nama_ortu'], $text_color);
imagestring($image, 4, 10, 80, "Tanggal: " . $data['tanggal'], $text_color);
imagestring($image, 4, 10, 100, "Sesi: " . $data['sesi'], $text_color);
imagestring($image, 4, 10, 120, "Asrama: " . $data['asrama'], $text_color);

// Menambahkan watermark di gambar
$watermark_text = "PPTQ AL - MANNAN | LPI AL - HIDAYAH";
imagestring($image, 3, 150, 150, $watermark_text, $watermark_color);

// Menetapkan header untuk mendownload gambar
header("Content-Type: image/jpeg");
header("Content-Disposition: attachment; filename=struk_kunjungan.jpg");

// Output gambar ke browser untuk diunduh
imagejpeg($image);

// Menghancurkan gambar setelah output
imagedestroy($image);
?>
