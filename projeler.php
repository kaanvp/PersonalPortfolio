<?php 
$page_title = "Projeler - Kaan Vural Polat Portfolio";

$projeler = [
    [
        "isim" => "Envanter ve POS Yönetim Sistemi", 
        "aciklama" => "C# ve WinForms kullanarak geliştirdiğim kapsamlı envanter takibi ve satış noktası yönetim sistemi. Ürün yönetimi, stok takibi ve satış raporlama özellikleri içerir.",
        "foto" => "assets/masaüstü.jpg",
        "teknolojiler" => ["C#", "WinForms", "SQL Server", ".NET Framework"],
        "github" => "https://github.com/kaanvp/InventoryPosSystem"
    ],
    [
        "isim" => "Personel Yönetim Sistemi", 
        "aciklama" => "İnsan kaynakları süreçlerini dijitalleştiren personel yönetim uygulaması. Çalışan bilgileri, izin takibi ve performans değerlendirme modülleri.",
        "foto" => "assets/website.jpg",
        "teknolojiler" => ["C#", "Windows Forms", "MySQL", "Entity Framework"],
        "github" => "https://github.com/kaanvp/PersonelYonetimSistemi"
    ],
    [
        "isim" => "Flutter Restaurant Management System",
        "aciklama" => "Restoran işletmeleri için geliştirilmiş Cross-platform mobil uygulama projesi. Masa rezervasyonu, sipariş yönetimi, menü düzenleme ve raporlama özellikleri.",
        "foto" => "assets/restaurant_management.jpg",
        "teknolojiler" => ["Flutter", "Dart", "Firebase", "REST API"],
        "github" => "https://github.com/kaanvp/restaurant_management_system"
    ],
    [
        "isim" => "Plant Classification Projesi", 
        "aciklama" => "Python ve makine öğrenmesi algoritmaları kullanarak bitki türlerini sınıflandıran yapay zeka projesi. Görüntü işleme ve derin öğrenme teknikleri.",
        "foto" => "assets/ai-model.png",
        "teknolojiler" => ["Python", "TensorFlow", "OpenCV", "Keras"],
        "github" => "https://github.com/kaanvp/plant_classification"
    ]
];

include 'includes/header.php'; 
?>

<script>
    const projectsData = <?php echo json_encode($projeler); ?>;
</script>

<main class="main">
    <section class="page-header">
        <div class="container">
            <h1>Projelerim</h1>
            <p>Geliştirdiğim web uygulamaları ve projeler</p>
        </div>
    </section>

    <section class="projects-section">
        <div class="container">
            <div class="projects-grid">
                <?php foreach ($projeler as $index => $proje): ?>
                <div class="project-card" data-project="<?php echo $index; ?>">
                    <div class="project-image">
                        <img src="<?php echo htmlspecialchars($proje['foto']); ?>" alt="<?php echo htmlspecialchars($proje['isim']); ?>">
                        <div class="project-overlay">
                            <button class="btn btn-primary view-project" data-project="<?php echo $index; ?>">
                                <i class="fas fa-eye"></i> Detayları Gör
                            </button>
                        </div>
                    </div>
                    <div class="project-content">
                        <h3><?php echo htmlspecialchars($proje['isim']); ?></h3>
                        <p><?php echo htmlspecialchars($proje['aciklama']); ?></p>
                        <div class="project-technologies">
                            <?php foreach ($proje['teknolojiler'] as $teknoloji): ?>
                                <span class="tech-tag"><?php echo htmlspecialchars($teknoloji); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <div id="projectModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-body">
                <div class="modal-image">
                    <img id="modalImage" src="" alt="">
                </div>
                <div class="modal-info">
                    <h2 id="modalTitle"></h2>
                    <p id="modalDescription"></p>
                    <div class="modal-technologies">
                        <h4>Kullanılan Teknolojiler:</h4>
                        <div id="modalTechnologies"></div>
                    </div>
                    <div class="modal-actions">
                        <a href="#" class="btn btn-primary" target="_blank" id="modalDemo">
                            <i class="fas fa-external-link-alt"></i> Projeyi Görüntüle
                        </a>
                        <a href="#" class="btn btn-secondary" target="_blank" id="modalGithub">
                            <i class="fab fa-github"></i> GitHub
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
