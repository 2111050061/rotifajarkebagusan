<?php
$target_dir = "riwayat/"; // Direktori penyimpanan file
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true); // Membuat folder jika belum ada
}

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "laporan_cetak");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi input
    $kode_pasien = isset($_POST['kode_pasien']) ? $_POST['kode_pasien'] : '';
    $nama_pasien = isset($_POST['nama_pasien']) ? $_POST['nama_pasien'] : '';
    $usia = isset($_POST['usia']) ? $_POST['usia'] : '';
    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
    $deskripsi = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : '';

    // Pastikan semua field diperlukan sudah diisi
    if (empty($kode_pasien) || empty($nama_pasien) || empty($usia) || empty($jenis_kelamin) || empty($alamat) || empty($deskripsi)) {
        echo "Semua kolom harus diisi!";
        exit;
    }

    // Validasi file upload
    $file_name = basename($_FILES["file"]["name"]);
    $target_file = $target_dir . $file_name;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = array("jpg", "jpeg", "png", "pdf"); // Hanya izinkan file JPG, PNG, PDF
    $max_file_size = 5 * 1024 * 1024; // Maksimal 5MB

    // Cek apakah file yang diupload sesuai tipe yang diizinkan dan tidak melebihi ukuran
    if (!in_array($file_type, $allowed_types)) {
        echo "Hanya file JPG, JPEG, PNG, dan PDF yang diperbolehkan.";
        exit;
    }

    if ($_FILES["file"]["size"] > $max_file_size) {
        echo "Ukuran file terlalu besar. Maksimal 5MB.";
        exit;
    }

    // Upload file ke folder
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        // Simpan informasi ke database
        $stmt = $conn->prepare("INSERT INTO laporan_files (kode_pasien, nama_pasien, usia, jenis_kelamin, alamat, deskripsi, nama_file, path_file) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $kode_pasien, $nama_pasien, $usia, $jenis_kelamin, $alamat, $deskripsi, $file_name, $target_file);

        if ($stmt->execute()) {
            echo "File berhasil diunggah dan informasi berhasil disimpan!";
        } else {
            echo "Gagal menyimpan informasi file: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Gagal mengunggah file.";
    }
}

$conn->close();
?>
