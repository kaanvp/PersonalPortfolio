<?php 
$page_title = "İletişim - Kaan Vural Polat Portfolio";

$message = '';
$message_type = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'process_contact.php';
}

include 'includes/header.php'; 
?>

<main class="main">
    <section class="page-header">
        <div class="container">
            <h1>İletişim</h1>
            <p>Benimle iletişime geçin, projeleriniz hakkında konuşalım</p>
        </div>
    </section>

    <section class="contact-section">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <h2>İletişim Bilgileri</h2>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h3>E-posta</h3>
                            <p>vural042010@gmail.com</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Telefon</h3>
                            <p>+90 545 260 22 39</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Konum</h3>
                            <p>Türkiye</p>
                        </div>
                    </div>


                    <div class="social-links-contact">
                        <h3>Sosyal Medya</h3>
                        <div class="social-buttons">
                            <a href="https://linkedin.com/in/kaan-vural-polat-197125227/" class="social-btn linkedin" target="_blank">
                                <i class="fab fa-linkedin"></i> LinkedIn
                            </a>
                            <a href="https://github.com/kaanvp" class="social-btn github" target="_blank">
                                <i class="fab fa-github"></i> GitHub
                            </a>

                        </div>
                    </div>
                </div>

                <div class="contact-form-section">
                    <h2>Mesaj Gönder</h2>
                    
                    <?php if (!empty($message)): ?>
                        <div class="alert alert-<?php echo $message_type; ?>">
                            <i class="fas <?php echo $message_type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle'; ?>"></i>
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>

                    <form id="contactForm" method="POST" action="" class="contact-form">
                        <div class="form-group">
                            <label for="name">Ad Soyad <span class="required">*</span></label>
                            <input type="text" id="name" name="name" required 
                                   value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                            <div class="error-message" id="nameError"></div>
                        </div>

                        <div class="form-group">
                            <label for="email">E-posta <span class="required">*</span></label>
                            <input type="email" id="email" name="email" required
                                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                            <div class="error-message" id="emailError"></div>
                        </div>

                        <div class="form-group">
                            <label for="subject">Konu</label>
                            <input type="text" id="subject" name="subject"
                                   value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="message">Mesaj <span class="required">*</span></label>
                            <textarea id="message" name="message" rows="6" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                            <div class="error-message" id="messageError"></div>
                        </div>

                        <button type="submit" class="btn btn-primary submit-btn">
                            <i class="fas fa-paper-plane"></i> Mesajı Gönder
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
