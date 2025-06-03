<?php 
$page_title = "Anasayfa - Kaan Vural Polat Portfolio";
include 'includes/header.php'; 
?>

<main class="main">
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Merhaba, Ben <span class="highlight">Kaan Vural Polat</span></h1>
                    <p class="hero-subtitle">Bilgisayar Mühendisliği Öğrencisi & Full Stack Developer</p>
                    <p class="bio">
                        Bilgisayar Mühendisliği 2. sınıf öğrencisiyim. Mobil, masaüstü ve web tabanlı uygulama geliştirme konularında
                        bir geliştiriciyim. Flutter ile mobil uygulamalar, C# ile masaüstü yazılımlar
                        geliştirebiliyor; ASP.NET veya PHP ile güçlü ve güvenilir web tabanlı backend
                        sistemleri kurabiliyorum. Python ile yapay zeka ve veri bilimi projelerinde
                        çalıştım.
                    </p>
                    <div class="hero-buttons">
                        <a href="projeler.php" class="btn btn-primary">Projelerimi İncele</a>
                        <a href="iletisim.php" class="btn btn-secondary">İletişime Geç</a>
                    </div>
                </div>
                <div class="hero-image">
                    <div class="profile-photo">
                        <img src="assets/face-swap4.png" alt="Profil Fotoğrafı" width="300" height="300" style="border-radius: 50%;">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="info-section">
        <div class="container">
            <div class="info-grid">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>İlgi Alanları</h3>
                    <ul>
                        <li>Web Geliştirme (HTML, CSS, JavaScript, PHP)</li>
                        <li>Mobil Uygulama Geliştirme (Flutter)</li>
                        <li>Masaüstü Yazılım Geliştirme (C#)</li>
                        <li>Backend Geliştirme (ASP.NET)</li>
                        <li>Yapay Zeka ve Veri Bilimi (Python)</li>
                    </ul>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-gamepad"></i>
                    </div>
                    <h3>Hobiler</h3>
                    <ul>
                        <li>Yazılım Geliştirme</li>
                        <li>Teknoloji Takibi</li>
                        <li>Bilgisayar Oyunları</li>
                        <li>Film/Dizi İzlemek</li>
                    </ul>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-contact-card"></i>
                    </div>
                    <h3>İletişim</h3>
                    <div class="contact-info">
                        <p><i class="fas fa-envelope"></i> vural042010@gmail.com</p>
                        <p><i class="fas fa-phone"></i> +90 545 260 22 39</p>
                        <p><i class="fas fa-map-marker-alt"></i> Türkiye</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
