<h1>Hasil Diagnosa</h1>
<?php

#$gejala = $_SESSION['gejala'];
$rows = $db->get_results("SELECT * FROM tb_gejala WHERE kode_gejala IN (SELECT kode_gejala FROM tb_konsultasi WHERE jawaban='Ya')");

// Ambil data pasien berdasarkan session kode_pasien
if (isset($_SESSION["kode_pasien"])) {
    $kode_pasien = $_SESSION["kode_pasien"];
    // Query untuk mengambil data pasien berdasarkan kode_pasien dari session
    $query = "SELECT * FROM pasien WHERE kode_pasien = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $kode_pasien);
    $stmt->execute();
    $pasien = $stmt->get_result()->fetch_object();
} else {
    // Jika tidak ada session, pasien dianggap null
    $pasien = null;
}

# Pastikan query mengambil data berdasarkan kode_pasien yang valid dan terbaru
// Gunakan kode berikut jika tidak menggunakan session, misalnya mengambil pasien berdasarkan ID terakhir
$pasien = $db->get_row("SELECT * FROM pasien WHERE kode_pasien = (SELECT kode_pasien FROM pasien ORDER BY id DESC LIMIT 1)");
?>

<?php if ($pasien): ?>
<h3>Data Pasien</h3>
<table>
    <tr><td>Kode Pasien</td><td><?= htmlspecialchars($pasien->kode_pasien) ?></td></tr>
    <tr><td>Nama</td><td><?= htmlspecialchars($pasien->nama) ?></td></tr>
    <tr><td>Jenis Kelamin</td><td><?= htmlspecialchars($pasien->jenis_kelamin) ?></td></tr>
    <tr><td>Umur</td><td><?= htmlspecialchars($pasien->umur) ?></td></tr>
    <tr><td>Alamat</td><td><?= htmlspecialchars($pasien->alamat) ?></td></tr>
    <tr><td>Nama Dokter</td><td><?= htmlspecialchars($pasien->nama_dokter) ?></td></tr>
    <tr><td>No HP</td><td><?= htmlspecialchars($pasien->no_hp) ?></td></tr>
</table>



<?php else: ?>
    <p>Data pasien tidak ditemukan.</p>
<?php endif; ?>

<h3>Gejala Terpilih</h3>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Gejala</th>
        </tr>
    </thead>
    <?php
    $no = 1;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row->nama_gejala ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
$rows = $db->get_results("SELECT * 
    FROM tb_relasi r INNER JOIN tb_diagnosa d ON d.kode_diagnosa = r.kode_diagnosa      
    WHERE r.kode_gejala IN (SELECT kode_gejala FROM tb_konsultasi WHERE jawaban='Ya') ORDER BY r.kode_diagnosa, r.kode_gejala");
$diagnosa = array();
foreach ($rows as $row) {
    if (!isset($diagnosa[$row->kode_diagnosa]['cf']))
        $diagnosa[$row->kode_diagnosa]['cf'] = 0;
    $diagnosa[$row->kode_diagnosa]['cf'] = $diagnosa[$row->kode_diagnosa]['cf'] + $row->cf * (1 - $diagnosa[$row->kode_diagnosa]['cf']);
}
?>

<h3>Hasil Analisa</h3>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Diagnosa</th>
            <th>Kepercayaan</th>
        </tr>
    </thead>
    <?php
    $no = 1;
    function ranking($array)
    {
        $new_arr = array();
        foreach ($array as $key => $value) {
            $new_arr[$key] = $value['cf'];
        }
        arsort($new_arr);

        $result = array();
        $no = 0;
        foreach ($new_arr as $key => $value) {
            $result[$key] = ++$no;
        }
        return $result;
    }

    $rank = ranking($diagnosa);

    foreach ($rank as $key => $value) : ?>
        <tr class="<?= ($value == 1) ? 'text-primary' : '' ?>">
            <td><?= $no++ ?></td>
            <td><?= $DIAGNOSA[$key]->nama_diagnosa ?></td>
            <td><?= round($diagnosa[$key]['cf'] * 100, 2) ?>%</td>
        </tr>
    <?php endforeach;
    reset($rank);
    ?>
</table>

<table>
    <tr>
        <td>Diagnosa</td>
        <td><?= $DIAGNOSA[key($rank)]->nama_diagnosa ?></td>
    </tr>
    <tr>
        <td>Solusi</td>
        <td><?= $DIAGNOSA[key($rank)]->keterangan ?></td>
    </tr>
</table>














<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Diagnosa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h3 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: white;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .text-primary {
            font-weight: bold;
            color: #d9534f;
        }
        p {
            text-align: center;
            font-size: 16px;
            color: #555;
        }
    </style>

</body>
</html>
