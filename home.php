
<style>
    
    /* Reset and Base Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    .container {
        padding: 20px;
        flex: 1;
    }
    
    /* Header */
    .header {
        color: #fff;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 24px;
        position: relative;
        background-image: url('your-image.jpg'); /* Ganti dengan path gambar Anda */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    
    /* Header */ .header { background: linear-gradient(
to right,
rgba(200, 107, 142, 1),
rgba(218, 105, 250, 1),
rgba(110, 125, 253, 1)
); 
    padding: 10px 20px; display: flex; justify-content: space-between; align-items: center; font-size: 24px; position: relative; }

    /* Toggler Button */
    .toggler {
        font-size: 24px;
        cursor: pointer;
        display: none; /* Toggler hanya muncul pada perangkat kecil */
    }
    
    /* Navigation Menu */
    .nav-menu {
        display: flex;
        gap: 20px;
    }
    .nav-menu a {
        color: white;
        text-decoration: none;
        font-size: 18px;
    }
    
    /* Responsive Styles */
    @media (max-width: 768px) {
        .nav-menu {
            display: none; /* Sembunyikan menu pada perangkat kecil */
            flex-direction: column;
            background-color: rgba(0, 0, 0, 0.8); /* Background warna hitam transparan */
            position: absolute;
            top: 60px;
            left: 0;
            width: 100%;
            padding: 10px 0;
        }
        .nav-menu.show {
            display: flex; /* Tampilkan menu jika toggler diklik */
        }
        .toggler {
            display: block;
        }
    }
    
    /* Statistic Boxes */
    .stats {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        margin: 20px 0;
    }
    .stat-box {
        flex: 1;
        min-width: 150px;
        padding: 20px;
        color: #fff;
        text-align: center;
        border-radius: 8px;
        font-size: 18px;
    }
    .stat-box:nth-child(1) { background-color: #29b6f6; }
    .stat-box:nth-child(2) { background-color: #66bb6a; }
    .stat-box:nth-child(3) { background-color: #ffa726; }
    .stat-box:nth-child(4) { background-color: #ef5350; }
    
    
    button {
        
        
        padding: 10px;

        border: none;

        text-align: center;
        
        border-radius: 5px;

        background-color: #6a1b9a;
        
        color: white;

        cursor: pointer;
            
        

    }
    
    .jumbotron {
    font-color: brown;
    flex-direction: column;                   
    justify-content: center; /* Menyelaraskan tombol secara vertikal */      align-items: center; /* Menyelaraskan tombol secara horizontal */      height: 420px; /* Pastikan jumbotron mengambil seluruh tinggi layar */ color: with; text-align: center;
   
    
   
    
    }
    button: hover {

        background-color: #007BFF;


    }
    
    /* Footer */
    .footer {
        text-align: center;
        padding: 10px 0;
        background-color: #e0e0e0;
        margin-top: auto;
    }

    /* Chat Icon */
    .chat-icon {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #6a1b9a;
        color: #fff;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 24px;
        cursor: pointer;
        z-index: 10;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Chat Box */
    .chat-box {
        position: fixed;
        bottom: 80px;
        right: 20px;
        width: 300px;
        max-width: 90%;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        display: none;
        flex-direction: column;
        z-index: 10;
    }
    .chat-box-header {
        background-color: #6a1b9a;
        color: #fff;
        padding: 10px;
        font-size: 18px;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        text-align: center;
    }
    .chat-box-body {
        padding: 10px;
        height: 200px;
        overflow-y: auto;
        font-size: 14px;
        color: #333;
    }
    .chat-box-footer {
        display: flex;
        padding: 10px;
        border-top: 1px solid #ddd;
    }
    .chat-input {
        flex: 1;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        outline: none;
    }
    .send-button {
        background-color: #6a1b9a;
        color: #fff;
        padding: 8px 12px;
        margin-left: 5px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    
    
    .slide-container {
position: relative;
max-width: 100%;
margin: auto;


}
.slide {
display: none; /* Hanya satu slide yang terlihat pada satu waktu */
text-align: center;
}
.slide img {
width: 100%; /* Atur lebar gambar sesuai kebutuhan */
border-radius: 8px;
}

    
</style>




<div class="page-header text-center">
    <h1 class="entry-title"></h1>
</div>
<div class="enrty-body flex-grow-1 px-3">
   


<!-- Jumbotron with img tag -->

<div class="jumbotron jumbotron-fluid text-center" style="background-image: url('https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2022/06/20065256/Manfaat-Kesehatan-Memiliki-Hewan-Peliharaan.jpg.webp'); background-size: cover; background-position: center; color: white;">


<br><h1 class="display-4" style="color:hsl(324, 70%, 40%);;" top="50%";>Selamat Datang di Sistem Pakar Kucing</h1>

<h2 style="color:hsl(324, 70%, 40%);">
<p class="lead">Mendiagnosa penyakit kucing Anda secara cepat dan mudah</p></br>    


 <!-- Button untuk menuju ke halaman 2 --> <form action="deskripsi.php" method="get"> <button type="submit">Deskripsi</button></form>   
</div>






    <div class="container-lg">
        <!-- Content Sections -->
        <div class="content-section">
        
            <br><h2>KUCING <img src="https://support.content.office.net/id-id/media/2e3bef5e-315f-4483-ae8d-5ca57f88b740.gif" alt  alt="Gambar 1"></h2></br>
            <br>Di kutip dari WIKIPEDIA,  Kucing disebut juga sebagai kucing domestik atau kucing rumah dengan nama ilmiah (Felis silvestris catus atau Felis catus), merupakan sejenis mamalia karnivora dari keluarga Felidae. Kata "kucing" biasanya merujuk kepada "kucing" yang telah dijinakkan, tetapi bisa juga merujuk kepada "kucing besar" seperti singa dan harimau yang juga termasuk jenis kucing.</br>

<br>
Sejarah kucing dimulai sejak 5.000 tahun sebelum masehi, dengan ditemukannya kerangka kucing di Pulau Siprus.
</br>

<br>
Kucing telah berbaur dengan kehidupan manusia sejak zaman 3.500 sebelum masehi. Orang Mesir Kuno telah menggunakan kucing untuk menjauhkan tikus atau hewan pengerat lain dari lumbung yang menyimpan hasil panen.</br>
            
            <br><h2>PAWRENTS <img src="https://support.content.office.net/id-id/media/b09fe53e-6a16-4423-b5d9-7d87e8468356.gif"></h2></br>
            <br>Apa itu "Pawrents"? pemilik kucing tentunya sudah tidak asing lagi dengan sebutan ini🤔 istilah ini muncul dari bahasa gaul dari para generasi z khususnya para pecinta hewan peliharaan. kali ini saya akan jelaskan apa itu istilah pawrents yang kian familiar. PAWRENTS merupakan sebutan untuk seseorang yang memiliki hewan peliharaan yang sudah dianggap seperti keluarga atau anak sendiri.</br>
        
<br>
Dikutip dari Yudi Anugrah Nugroho (2022) menyebutkan berdasarkan data Mitel yang bertajuk America’s Pet Owners’, 2013, 

<i>"sebanyak 91 persen responden pemilik hewan peliharaan di Amerika Serikat menganggap mereka sebagai bagian dari keluarga."</i></br>

<br>
Hewan berbulu dan menggemaskan ini memang banyak digemari karena tingkah lucunya.Tak heran, jika kita biasanya menemukan banyak komunitas pencinta kucing di berbagai daerah.
</br>
<br>
Namun, saat kita masuk ke dalam komunitas ini, masih banyak yang belum dipahami soal istilah dalam dunia kucing, mulai dari istilah anabul, pawrents, wf, dan masih banyak lagi yang membuat sebagian orang bingung.
</br>
          
           <br><h2>SISTEM PAKAR<img src="https://support.content.office.net/id-id/media/66677acd-38b3-417e-b483-79c0b15043b7.gif"></h2></br>
            <br>Sistem pakar merupakan suatu program komputer yang dirancang untuk meniru kemampuan pengambilan keputusan seorang pakar dalam bidang tertentu. Sistem ini menggunakan basis pengetahuan <i>(knowledge base)</i> dan aturan-aturan <i>(rules)</i> yang dikembangkan dari pengalaman atau keahlian pakar untuk memberikan solusi, saran, atau diagnosis yang akurat.</br>

<br>
Sistem pakar biasanya digunakan dalam bidang medis, teknik, keuangan, dan lainnya di mana keahlian khusus diperlukan untuk memecahkan masalah yang kompleks. Sistem ini mudah diakses karena sudah berbasis digital.</br>
        </div>
    </div>
</div>