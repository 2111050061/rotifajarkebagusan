<?php
// Query untuk mengambil data
$sql = "SELECT Kode_Pasien, Nama_Pasien, Usia, Alamat FROM laporan_files";
$result = $conn->query($sql);

// Memeriksa apakah ada data yang ditemukan
if ($result->num_rows > 0) {
    // Menampilkan data
    while($row = $result->fetch_assoc()) {
        echo "Kode Pasien: " . $row["Kode_Pasien"]. " - Nama Pasien: " . $row["Nama_Pasien"]. " - Usia: " . $row["Usia"]. " - Alamat: " . $row["Alamat"]. "<br>";
    }
} else {
    echo "0 hasil";
}
?>
