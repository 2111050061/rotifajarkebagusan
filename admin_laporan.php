<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "laporan_cetak");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


// Jika ada permintaan untuk menghapus laporan
if (isset($_GET['hapus_id'])) {
    $hapus_id = $_GET['hapus_id'];

    // Hapus file dari server
    $get_file_query = $conn->prepare("SELECT path_file FROM laporan_files WHERE id = ?");
    $get_file_query->bind_param("i", $hapus_id);
    $get_file_query->execute();
    $result_file = $get_file_query->get_result();

    if ($result_file->num_rows > 0) {
        $file_data = $result_file->fetch_assoc();
        $file_path = $file_data['path_file'];

        // Periksa apakah file ada, lalu hapus
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }
    $get_file_query->close();

    // Hapus data dari database
    $delete_query = $conn->prepare("DELETE FROM laporan_files WHERE id = ?");
    $delete_query->bind_param("i", $hapus_id);

    if ($delete_query->execute()) {
        echo "<script>alert('Laporan berhasil dihapus.'); window.location='admin_laporan.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus laporan.'); window.location='admin_laporan.php';</script>";
    }
    $delete_query->close();
}

// Ambil data dari tabel
$sql = "SELECT * FROM laporan_files ORDER BY diunggah_pada DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Query SQL gagal: " . $conn->error);
}








// Inisialisasi variabel pencarian
$kode_pasien = isset($_GET['kode_pasien']) ? $_GET['kode_pasien'] : '';
$nama_pasien = isset($_GET['nama_pasien']) ? $_GET['nama_pasien'] : '';
$jenis_kelamin = isset($_GET['jenis_kelamin']) ? $_GET['jenis_kelamin'] : '';
$usia = isset($_GET['usia']) ? $_GET['usia'] : '';
$alamat = isset($_GET['alamat']) ? $_GET['alamat'] : '';

// Query pencarian
$sql = "SELECT * FROM laporan_files WHERE 1=1";

if (!empty($kode_pasien)) {
    $sql .= " AND kode_pasien LIKE '%" . $conn->real_escape_string($kode_pasien) . "%'";
}
if (!empty($nama_pasien)) {
    $sql .= " AND nama_pasien LIKE '%" . $conn->real_escape_string($nama_pasien) . "%'";
}
if (!empty($jenis_kelamin)) {
    $sql .= " AND jenis_kelamin LIKE '%" . $conn->real_escape_string($jenis_kelamin) . "%'";
}
if (!empty($usia)) {
    $sql .= " AND usia LIKE '%" . $conn->real_escape_string($usia) . "%'";
}
if (!empty($alamat)) {
    $sql .= " AND alamat LIKE '%" . $conn->real_escape_string($alamat) . "%'";
}

// Eksekusi query
$result = $conn->query($sql);
















?>
<!doctype html>
<html>
<head>
    <title>Halaman Admin</title>
</head>




<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        input, select, button {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color:rgb(71, 80, 177);
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color:rgb(33, 81, 136);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }



    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
        color: #333;
    }

    h1 {
        text-align: center;
        margin: 20px 0;
        color: #555;
    }

    table {
        width: 90%;
        margin: 20px auto;
        border-collapse: collapse;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    th, td {
        padding: 10px 15px;
        text-align: left;
    }

    th {
        background-color: #007BFF;
        color: #fff;
        text-transform: uppercase;
        font-size: 14px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #dff0d8;
        cursor: pointer;
    }

    td a {
        color: #007BFF;
        text-decoration: none;
    }

    td a:hover {
        text-decoration: underline;
    }

    .confirm-btn {
        background-color: #dc3545;
        color: white;
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .confirm-btn:hover {
        background-color: #c82333;
    }

    .container {
        width: 90%;
        margin: auto;
        text-align: center;
    }

    .no-data {
        text-align: center;
        font-size: 16px;
        color: #888;
    }




    @media (max-width: 768px) {
    table {
        font-size: 12px;
    }

    th, td {
        padding: 8px;
    }

    .confirm-btn {
        font-size: 12px;
    }
}











    </style>




<body>
    <h1>Daftar Laporan yang Diunggah</h1>







    <form method="GET">
        <input type="text" name="kode_pasien" placeholder="Kode Pasien" value="<?php echo htmlspecialchars($kode_pasien); ?>">
        <input type="text" name="nama_pasien" placeholder="Nama Pasien" value="<?php echo htmlspecialchars($nama_pasien); ?>">
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <input type="text" name="jenis_kelamin" id="jenis kelamin" required>
        <label for="usia">Usia:</label>
        <input type="text" name="usia" id="usia" required>
        <input type="text" name="alamat" placeholder="Alamat" value="<?php echo htmlspecialchars($alamat); ?>">
        <button type="submit">Cari</button>
    </form>

    <?php if (isset($_GET['kode_pasien']) || isset($_GET['nama_pasien']) || isset($_GET['jenis_kelamin']) || isset($_GET['usia']) || isset($_GET['alamat'])): ?>
        <?php if ($result->num_rows > 0): ?>
            <h2>Hasil Pencarian</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Pasien</th>
                        <th>Nama Pasien</th>
                        <th>Jenis Kelamin</th>
                        <th>Usia</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                        <th>Path File</th>
                        <th>Waktu Unggah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['kode_pasien']); ?></td>
                            <td><?php echo htmlspecialchars($row['nama_pasien']); ?></td>
                            <td><?php echo htmlspecialchars($row['jenis_kelamin']); ?></td>
                            <td><?php echo htmlspecialchars($row['usia']); ?></td>
                            <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                            <td><?php echo htmlspecialchars($row['deskripsi']); ?></td>
                            <td><a href="<?php echo $row['path_file']; ?>" target="_blank">Unduh</a></td>
                        <td><?php echo $row['diunggah_pada']; ?></td>
                        <td>
                            <a href="admin_laporan.php?hapus_id=<?php echo $row['id']; ?>" class="confirm-btn" onclick="return confirm('Yakin ingin menghapus laporan ini?')">Hapus</a>
                        </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Tidak ada data ditemukan.</p>
        <?php endif; ?>
    <?php endif; ?>









    <div class="container">
    <h1>Daftar Laporan Pasien</h1>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Pasien</th>
                <th>Nama Pasien</th>
                <th>Usia</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Nama File</th>
                <th>Deskripsi</th>
                <th>Path File</th>
                <th>Waktu Unggah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['kode_pasien']); ?></td>
                        <td><?php echo htmlspecialchars($row['nama_pasien']); ?></td>
                        <td><?php echo htmlspecialchars($row['usia']); ?></td>
                        <td><?php echo htmlspecialchars($row['jenis_kelamin']); ?></td>
                        <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                        <td><?php echo htmlspecialchars($row['nama_file']); ?></td>
                        <td><?php echo htmlspecialchars($row['deskripsi']); ?></td>
                        <td><a href="<?php echo $row['path_file']; ?>" target="_blank">Unduh</a></td>
                        <td><?php echo $row['diunggah_pada']; ?></td>
                        <td>
                            <a href="admin_laporan.php?hapus_id=<?php echo $row['id']; ?>" class="confirm-btn" onclick="return confirm('Yakin ingin menghapus laporan ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="11" class="no-data">Tidak ada laporan yang diunggah.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>








    
</body>
</html>
<?php $conn->close(); ?>
