<?php
$conn = new mysqli("localhost", "root", "", "laporan_cetak");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ambil informasi file
    $sql = "SELECT * FROM laporan_files WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $file = $result->fetch_assoc();
        $path_file = $file['path_file'];

        // Hapus file dari folder
        if (file_exists($path_file)) {
            unlink($path_file);
        }

        // Hapus data dari database
        $sql = "DELETE FROM laporan_files WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        echo "File berhasil dihapus!";
    } else {
        echo "File tidak ditemukan.";
    }

    $stmt->close();
}

$conn->close();
?>
