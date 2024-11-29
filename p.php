<?php
// URL untuk login dan dashboard
$loginUrl = "https://admin.maalhidayahkauman.sch.id/admin/login";
$dashboardUrl = "https://admin.maalhidayahkauman.sch.id/admin";

// Inisialisasi session cURL
$ch = curl_init();

// Set opsi cURL untuk mengambil halaman login
curl_setopt($ch, CURLOPT_URL, $loginUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt'); // Simpan cookie

// Eksekusi permintaan untuk mendapatkan halaman login
$loginPage = curl_exec($ch);

// Mengambil token CSRF dari halaman login
preg_match('/<input type="hidden" name="_token" value="(.*?)"/', $loginPage, $matches);
$csrfToken = $matches[1] ?? '';

if ($csrfToken) {
    // Data login dengan token yang didapat
    $data = [
        'email' => 'admin@admin.com',
        'password' => 'mencoba123',
        '_token' => $csrfToken
    ];

    // Set opsi untuk permintaan login
    curl_setopt($ch, CURLOPT_URL, $loginUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    // Eksekusi login
    $loginResponse = curl_exec($ch);

    // Akses halaman dashboard menggunakan session yang sama
    curl_setopt($ch, CURLOPT_URL, $dashboardUrl);
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');

    $dashboardPage = curl_exec($ch);

    if ($dashboardPage) {
        // Ekstrak total artikel
        preg_match('/<div class="card-body"><div class="h4">(\d+)<\/div><\/div>/', $dashboardPage, $matches);
        $totalArtikel = $matches[1] ?? 'Data tidak ditemukan';
        echo "Total Artikel: " . $totalArtikel;
    } else {
        echo "Gagal mengakses halaman dashboard.";
    }
} else {
    echo "Token CSRF tidak ditemukan.";
}

// Tutup session cURL
curl_close($ch);
?>
