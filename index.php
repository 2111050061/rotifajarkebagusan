<?php
include 'functions.php';

//if(empty(_session('login')))

//header("location:login.php");

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar Deteksi Diagnosa Penyakit Kucing</title>
    <link rel="icon" href="assets/favicon.ico" />
    <link href="assets/css/yeti-bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/general.css" rel="stylesheet" />
    <link href="assets/css/select2.min.css" rel="stylesheet" />
    <style>
        /* Tambahkan gaya Anda di sini */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .header {
            background: linear-gradient(to right, #C96B8E, #DA69FA, #6E7DFD);
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .toggler {
            font-size: 24px;
            cursor: pointer;
            display: none;
        }
        .nav-menu {
            display: flex;
            gap: 20px;
        }
        .nav-menu a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }
        .footer {
            text-align: center;
            padding: 10px 0;
            background-color: #e0e0e0;
            margin-top: auto;
        }
        .stats {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin: 20px 0;
        }
        .stat-box {
            padding: 20px;
            color: #fff;
            text-align: center;
            border-radius: 8px;
            font-size: 18px;
            flex: 1;
        }
        .stat-box:nth-child(1) { background-color: #29b6f6; }
        .stat-box:nth-child(2) { background-color: #66bb6a; }
        .stat-box:nth-child(3) { background-color: #ffa726; }
        .stat-box:nth-child(4) { background-color: #ef5350; }




        <link rel="icon" href="assets/favicon.ico" />
    <link href="assets/css/yeti-bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/general.css" rel="stylesheet" />
    <link href="assets/css/select2.min.css" rel="stylesheet" />
    <style>
        /* Existing styles remain unchanged */

        /* New styles for chat box */
        .chat-box {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 300px;
            height: 400px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
        .chat-header {
            background-color:rgb(246, 41, 222);
            color: white;
            padding: 25px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
        }
        .chat-content {
            padding: 15px;
            overflow-y: auto;
            height: calc(100% - 50px);
        }
        .chat-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            background-color:rgb(241, 241, 241);
            display: flex;
        }
        .chat-footer input {
            flex: 1;
            padding: 5px;
            border-radius: 50px;
            border: 1px solid #ddd;
        }
        .chat-footer button {
            background-color:rgb(229, 41, 246);
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .chat-footer button:hover {
            background-color:rgb(209, 2, 178);
        }
        .chat-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #29b6f6;
            color: white;
            padding: 15px;
            border-radius: 50%;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }










    </style>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script>
        $(function() {
            $("select:not(.default)").select2();
        });
        function toggleMenu() {
            const navMenu = document.getElementById("navMenu");
            navMenu.classList.toggle("show");
        }





        $(function() {
            $("select:not(.default)").select2();
        });

        function toggleMenu() {
            const navMenu = document.getElementById("navMenu");
            navMenu.classList.toggle("show");
        }

        // Chat box toggle function
        function toggleChatBox() {
            const chatBox = document.getElementById('chatBox');
            chatBox.style.display = chatBox.style.display === 'block' ? 'none' : 'block';
        }







    </script>
</head>
<body>
    <div class="header">
        <h1>Sistem Pakar</h1>
        <span class="toggler" onclick="toggleMenu()">☰</span>
        <div class="nav-menu" id="navMenu">
            <a href="?">Beranda</a>
			<a href="?m=login">Login</a>
			<a href="?m=signup">Daftar</a>
            <?php if (_session('level') == 'admin') : ?>
                <a href="?m=user">Pengguna</a>
                <a href="?m=diagnosa">Diagnosa</a>
                <a href="?m=gejala">Gejala</a>
                <a href="?m=relasi">Relasi</a>
                <a href="?m=rule">Rule</a>
                <a href="form_pasien.php">Konsultasi</a>
                <a href="?m=password">Password</a>
                <a href="aksi.php?act=logout">Logout (<?= _session('signup') ?>)</a>
            <?php elseif (_session('level') == 'user') : ?>
                <a href="form_pasien.php">Konsultasi</a>
                <a href="?m=password">Password</a>
                <a href="aksi.php?act=logout">Logout (<?= _session('signup') ?>)</a>
            <?php else : ?>
                <a href="?m=bantuan">Bantuan</a>
            <?php endif; ?>
        </div>
    </div>
	<div class="container">
        <div class="stats">
            <div class="stat-box">30<br>Total Gejala</div>
            <div class="stat-box">10<br>Total Penyakit</div>
            <div class="stat-box">65<br>Total Aturan</div>
            <div class="stat-box">1<br>Total Admin Pakar</div>
        </div>



        <?php
        if (!_session('login') && in_array($mod, array('diagnosa', 'gejala', 'relasi', 'rule', 'password'))) {
            $mod = 'home';
        }
        if (file_exists($mod . '.php')) {
            include $mod . '.php';
        } else {
            include 'home.php';
        }
        ?>

















    </div>
    <div class="footer">
        Copyright &copy; <?= date('Y') ?> Yusnita Dahlia Putri
    </div>










  
   














</body>
</html>