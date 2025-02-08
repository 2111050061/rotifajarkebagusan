<?php
// Koneksi ke database
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "cf_fc";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mendapatkan data riwayat medis
$sql = "SELECT id, nama_pasien, tanggal_kunjungan, diagnosa, pengobatan, catatan FROM riwayat_medis ORDER BY tanggal_kunjungan DESC";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Medis</title>
    <link rel="stylesheet" href="styles.css"> <!-- Tambahkan file CSS jika diperlukan -->
</head>
<body>
    <h1>Riwayat Medis</h1>

    <?php if ($result->num_rows > 0): ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pasien</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Diagnosa</th>
                    <th>Pengobatan</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['nama_pasien']); ?></td>
                        <td><?php echo htmlspecialchars($row['tanggal_kunjungan']); ?></td>
                        <td><?php echo htmlspecialchars($row['diagnosa']); ?></td>
                        <td><?php echo htmlspecialchars($row['pengobatan']); ?></td>
                        <td><?php echo htmlspecialchars($row['catatan']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada data riwayat medis yang ditemukan.</p>
    <?php endif; ?>

    <?php $conn->close(); // Menutup koneksi ?>
</body>
</html>
