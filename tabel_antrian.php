<?php
$conn = new mysqli('localhost', 'root', '11999988zamA@', 'db_kunjungan');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Definisikan tanggal dan sesi
$sessions = [
    ['tanggal' => '2025-01-18', 'sesi' => '09.00 - 11.00'],
    ['tanggal' => '2025-01-18', 'sesi' => '13.00 - 15.00'],
    ['tanggal' => '2025-01-25', 'sesi' => '09.00 - 11.00'],
    ['tanggal' => '2025-01-25', 'sesi' => '13.00 - 15.00'],
];

// Menampilkan tab content
echo "<ul class='nav nav-tabs' id='myTab' role='tablist'>";
$active = 'active'; // Menandai tab pertama sebagai aktif
foreach ($sessions as $key => $session) {
    echo "<li class='nav-item' role='presentation'>
            <a class='nav-link $active' id='session{$key}-tab' data-bs-toggle='tab' href='#session{$key}' role='tab' aria-controls='session{$key}' aria-selected='true'>
                Sesi {$session['sesi']} || {$session['tanggal']}
            </a>
          </li>";
    $active = ''; // Setelah tab pertama, yang lain tidak aktif
}
echo "</ul>";

echo "<div class='tab-content' id='myTabContent'>";
$active = 'show active'; // Menandai konten pertama sebagai aktif
foreach ($sessions as $key => $session) {
    $tanggal = $session['tanggal'];
    $sesi = $session['sesi'];
    // Ambil daftar pendaftar untuk tanggal dan sesi
    $query = "SELECT * FROM kunjungan WHERE tanggal='$tanggal' AND sesi='$sesi' ORDER BY created_at ASC";
    $result = $conn->query($query);

    echo "<div class='tab-pane fade $active' id='session{$key}' role='tabpanel' aria-labelledby='session{$key}-tab'>";
    echo "<h3>Daftar Pendaftar untuk Tanggal $tanggal dan Sesi $sesi</h3>";

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Nama Ortu</th>
                        <th>Tanggal</th>
                        <th>Sesi</th>
                        <th>Asrama</th>
                    </tr>
                </thead>
                <tbody>";
        $no = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $row['nama_siswa'] . "</td>
                    <td>" . $row['nama_ortu'] . "</td>
                    <td>" . $row['tanggal'] . "</td>
                    <td>" . $row['sesi'] . "</td>
                    <td>" . $row['asrama'] . "</td>
                </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "Tidak ada pendaftar untuk sesi ini.";
    }
    echo "</div>";
    $active = ''; // Setelah tab pertama, konten lainnya tidak aktif
}

echo "</div>";

$conn->close();
?>
