<?php
// Koneksi ke database
$host = "localhost";
$user = "root";  
$pass = "";
$dbname = "cf_fc";

$conn = new mysqli($host, $user, $pass, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses form ketika dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_pasien = $_POST["kode_pasien"];
    $nama = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $umur = $_POST["umur"];
    $alamat = $_POST["alamat"];
    $nama_dokter = $_POST["nama_dokter"];
    $no_hp = $_POST["no_hp"];

    // Menggunakan prepared statement untuk keamanan
    $query = $conn->prepare("INSERT INTO pasien (kode_pasien, nama, jenis_kelamin, umur, alamat, nama_dokter, no_hp) 
                             VALUES (?, ?, ?, ?, ?, ?, ?)");
    $query->bind_param("sssssss", $kode_pasien, $nama, $jenis_kelamin, $umur, $alamat, $nama_dokter, $no_hp);

    if ($query->execute()) {
        // Redirect ke halaman konsultasi setelah berhasil
        header("Location: aksi.php?m=konsultasi&act=new");
        exit();
    } else {
        echo "<p class='error'>Error: " . $conn->error . "</p>";
    }

    $query->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Pasien</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg,rgb(118, 43, 117), #4e4376);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: rgba(255, 255, 255, 0.15);
            padding: 20px;
            border-radius: 20px;
            backdrop-filter: blur(10
            px);
            box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.2);
            width: 350px;
            text-align: center;
        }
        h3 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 90%;
            padding: 5px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
        }
        button {
            background:rgb(255, 126, 160);
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #ff4a87;
        }
        .success {
            color: #4caf50;
            font-weight: bold;
        }
        .error {
            color: #ff4a4a;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h3>Form Input Data Pasien</h3>
    <form method="post">
    <label>Kode Pasien (contoh: 0004):</label>
    <input type="text" name="kode_pasien" pattern="\d{4}" required placeholder="Masukkan 4 digit angka">

        <label>Nama:</label>
        <input type="text" name="nama" required>

        <label>Jenis Kelamin:</label>
        <select name="jenis_kelamin" required>
            <option value="Jantan">Jantan</option>
            <option value="Betina">Betina</option>
        </select>

        <label>Umur:</label>
        <input type="text" name="umur" required>

        <label>Alamat:</label>
        <textarea name="alamat" required></textarea>

        <label>Nama Dokter:</label>
        <select name="nama_dokter" required>
            <option value="Drh. Jefri Matheus Manurung">Drh. Jefri Matheus Manurung</option>
        </select>

        <label>No HP:</label>
        <input type="tel" name="no_hp" pattern="08[0-9]{9,11}" required placeholder="081234567890">

        <button type="submit">Simpan</button>
    </form>
</div>
