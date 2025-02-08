<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar Penyakit Kucing</title>
    <style>
    /* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Body */
body {
    background-color: #f9f9f9;
    color: #333;
    line-height: 1.6;
}

/* Header */
header {
    background-color: #6a1b9a;
    color: #fff;
    padding: 20px;
    text-align: center;
}

header h1 {
    font-size: 2.5em;
    margin-bottom: 10px;
}

header p {
    font-size: 1.2em;
}

/* Sections */
section {
    padding: 20px;
    max-width: 800px;
    margin: auto;
}

section h2 {
    color: #6a1b9a;
    font-size: 1.8em;
    margin-bottom: 10px;
}

section p, section ul {
    margin: 10px 0;
    font-size: 1.1em;
}

ul {
    list-style-type: square;
    margin-left: 20px;
}

/* Kucing Card */
#jenis-kucing-list {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 20px;
}

.kucing-card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    text-align: center;
    width: 200px;
}

.kucing-card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.kucing-card h3 {
    color: #6a1b9a;
    font-size: 1.2em;
    margin: 10px 0;
}

.kucing-card p {
    padding: 0 10px 10px;
}

/* Footer */
footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px;
    margin-top: 20px;
}

    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Sistem Pakar Diagnosis Penyakit Kucing Ras</h1>
        <p>Panduan lengkap untuk pemilik kucing dalam mendiagnosis dan merawat kesehatan kucing kesayangan.</p>
    </header>

    <!-- Deskripsi Sistem Pakar -->
    <section id="sistem-pakar">
        <h2>Apa Itu Sistem Pakar?</h2>
        <p>Sistem pakar adalah sistem komputer yang meniru kemampuan pemikiran manusia dalam memecahkan masalah spesifik. Sistem ini dirancang untuk mendiagnosis penyakit kucing dan memberikan saran perawatan berdasarkan gejala yang diinput pengguna.</p>
    </section>

    <!-- Metode Forward Chaining -->
    <section id="forward-chaining">
        <h2>Metode Forward Chaining dalam Sistem Pakar</h2>
        <p>Metode forward chaining adalah pendekatan penalaran yang bergerak maju dari gejala awal ke diagnosis. Dalam sistem pakar untuk penyakit kucing, sistem akan menggunakan metode ini untuk mencari aturan yang relevan guna menentukan diagnosis.</p>
    </section>

    <!-- Kucing Ras dan Domestik -->
    <section id="jenis-kucing">
        <h2>Perbedaan Kucing Ras Dengan Kucing Domestik</h2>
        <p>Kucing ras adalah kucing hasil pembiakan selektif, sementara kucing domestik lebih beragam dan umumnya lebih tahan penyakit. Kedua jenis ini memiliki kebutuhan perawatan yang berbeda.</p>
    </section>

<!-- Kucing Ras dan Domestik -->
<section id="jenis-kucing">
<h2>Jenis-Jenis Kucing Ras</h2>
        <p>Dibawah ini adalah berbagai jenis kucing ras, dengan berbagai karakteristik dan perilaku nya yang perlu pawrents ketahui.</p>   
    </section>



    <!-- Jenis-Jenis Kucing -->
    <section id="jenis-kucing-list">
        <div class="kucing-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQxGSDznVfs6Ssuv5vxm7v3XvV0YURPghlCSRyfJl4fsBH46X2f-i9lFHsweCHIWuqWyNanRQqcX8ArR176gwWZYD6C08q_uwkAf3FYfA" alt="Kucing Persia">
            <h3>Persia</h3>
            <p>Kucing Persia merupakan ras kucing yang cukup banyak dipelihara. Namun, merawat kucing ini tidaklah mudah. Kucing ini memiliki bulu yang panjang dan mudah rontok. Kucing ini memiliki sifat yang lembut.</p>
        </div>
        <div class="kucing-card">
            <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQss57FFWKHVApdQp1Ptl45ejW2l9YFK3Gk0e-8CBLYZbRw4U6l" alt="Kucing Siam">
            <h3>Siam</h3>
            <p>Kucing ramping dengan bulu pendek, sangat sosial.Selain dari usianya yang cenderung panjang, kucing siam banyak diminati oleh pecinta kucing karena bulunya yang khas.</p>
        </div>
        <div class="kucing-card">
            <img src="https://awsimages.detik.net.id/community/media/visual/2021/03/31/jenis-jenis-kucing-peliharaan_169.jpeg?w=1200" alt="Kucing Maine Coon">
            <h3>Maine Coon</h3>
            <p>Kucing besar dengan bulu tebal dan ramah. Tidak seperti jenis kucing kebanyakan Kucing ini bisa mencapai tinggi sekitar 25–40 cm dan panjang hingga 1 meter.</p>
        </div>
        <div class="kucing-card">
            <img src="https://image.popbela.com/content-images/post/20220816/a8a1362041e166fbe803a314f02e5ea7.jpeg?width=750&format=webp&w=750" alt="Kucing Ragdoll">
            <h3>Ragdoll</h3>
            <p>Hampir mirip dengan Ras himalayan, kucing cantik ini memiliki ciri khas bermata biru, kucing ini sangat digemari karena sifatnya yang penurut dan super clingy.</p>
        </div>
        <div class="kucing-card">
            <img src="https://www.blibli.com/friends-backend/wp-content/uploads/2024/02/B110054-2-Karakteristik-Kucing-Turkish-Angora-scaled.jpg" alt="Kucing Maine Coon">
            <h3>Angora</h3>
            <p>Kucing ini berasal dari, Angora memiliki sifat yang Ceria, suka bersosialisasi, cerdas, usil, dan kadang bersikap bossy. Kucing ini juga sangat digemari dikalangan para pecinta kucing.</p>
        </div>
        <div class="kucing-card">
            <img src="https://api.ternakhias.com/public/images/fcb0ad9e24924676abf859d2087e619c.webp" alt="Kucing Maine Coon">
            <h3>Sphynx</h3>
            <p>Kucing ini sekarang sedang menjadi trend di kalangan para pecinta hewan kelas atas, kucing asli mesir dengan ciri khas tanpa bulu ini memiliki harga yang cukup fantastis, dibandingkan kucing ras jenis lain.</p>
        </div>
        <div class="kucing-card">
            <img src="https://st.depositphotos.com/2547911/2886/i/450/depositphotos_28868203-stock-photo-small-black-marble-british-kitten.jpg" alt="Kucing Maine Coon">
            <h3>Kucing Marble</h3>
            <p>Sesuai dengan namanya kucing ini memiliki motif marble pada warna bulunya, kucing ini memiliki sifat yang ramah dan sangat penurut.</p>
        </div>
        <div class="kucing-card">
            <img src="https://foto.kontan.co.id/0gJPoJNwEtOp9Z38C7c5tHa0KEM=/smart/2022/01/21/490027068p.jpg" alt="Kucing Maine Coon">
            <h3>Kucing Munchkin</h3>
            <p>Kucing berkaki pendek ini sangatlah lucu dan uni untuk dipelihara, ciri khasnya ini membuat kucing Munchkin terlihat sangat menggemaskan.</p>
        </div>
        <div class="kucing-card">
            <img src="https://thumb.viva.co.id/media/frontend/thumbs3/2022/09/01/631054190fbf5-ras-kucing-scottish-fold_1265_711.jpg" alt="Kucing Maine Coon">
            <h3>Kucing Scottish Fold</h3>
            <p>Kucing ini memiliki ciri khas telinga yang menekuk kebawah dan sifat yang ramah, keunikannya tersebut yang membuat para pecinta kucing tertarik untuk memiliki nya.</p>
        </div>
    </section>

    <!-- Gejala Penyakit pada Kucing -->
    <section id="gejala-penyakit">
        <h2>Gejala Penyakit pada Kucing</h2>
        <ul>
            <li>Demam</li>
            <li>Muntah atau diare</li>
            <li>Lesu dan kurang nafsu makan</li>
            <li>Batuk dan bersin</li>
            <li>Gangguan pernapasan</li>
        </ul>
    </section>

    <!-- Kucing Ras yang Rawan Terinfeksi Penyakit -->
    <section id="kucing-rawan">
        <h2>Kucing Ras yang Rawan Terinfeksi Penyakit</h2>
        <ul>
            <li><strong>Persia:</strong> Rentan terhadap penyakit ginjal polikistik.</li>
            <li><strong>Siam:</strong> Rentan terhadap masalah pernapasan.</li>
            <li><strong>Maine Coon:</strong> Rentan terhadap kardiomiopati hipertrofik (penyakit jantung).</li>
        </ul>
    </section>

    <!-- Saran untuk Pemilik Kucing Ras -->
    <section id="saran-pemilik">
        <h2>Saran untuk Pemilik Kucing Ras</h2>
        <h3>Pencegahan</h3>
        <p>Berikan vaksinasi rutin, jaga kebersihan, dan hindari stres untuk mencegah penyakit umum.</p>
        <h3>Perawatan</h3>
        <p>Lakukan grooming, berikan makanan sehat, dan periksakan kesehatan secara berkala.</p>
        <h3>Pengobatan</h3>
        <p>Jika gejala muncul, segera konsultasikan dengan dokter hewan.</p>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2023 Sistem Pakar Penyakit Kucing - Semua Hak Dilindungi</p>
    </footer>
</body>
</html>
