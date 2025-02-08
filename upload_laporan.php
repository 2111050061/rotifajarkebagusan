<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah Laporan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        form {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        label {
            font-weight: bold;
        }
        input, select, textarea, button {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Unggah Laporan</h1>
    <form action="proses_upload.php" method="post" enctype="multipart/form-data">
        
        <label>Kode Pasien (contoh: 0004):</label>
        <input type="text" name="kode_pasien" pattern="\d{4}" required placeholder="Masukkan 4 digit angka">
        
        <label for="nama_pasien">Nama Pasien:</label>
        <input type="text" name="nama_pasien" id="nama_pasien" required>
        
        <label for="usia">Usia:</label>
        <input type="text" name="usia" id="usia" required>
        
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <input type="text" name="jenis_kelamin" id="jenis kelamin" required>
      
        <label for="alamat">Alamat:</label>
        <textarea name="alamat" id="alamat" rows="4" cols="50" required></textarea>
        
        <label for="file">Pilih File Laporan:</label>
        <input type="file" name="file" id="file" required>
        
        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" id="deskripsi" rows="4" cols="50" required></textarea>
        
        <button type="submit">Unggah</button>
    </form>
</body>
</html>
