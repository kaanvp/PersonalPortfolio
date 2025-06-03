<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $user_message = trim($_POST['message'] ?? '');
    
    $errors = [];

    if (empty($name)) {
        $errors[] = "Ad soyad alanı boş bırakılamaz.";
    } elseif (strlen($name) < 2) {
        $errors[] = "Ad soyad en az 2 karakter olmalıdır.";
    } elseif (strlen($name) > 100) {
        $errors[] = "Ad soyad 100 karakterden uzun olamaz.";
    } elseif (!preg_match("/^[a-zA-ZğüşıöçĞÜŞİÖÇ\s]+$/u", $name)) {
        $errors[] = "Ad soyad sadece harfler içerebilir.";
    }
    if (empty($email)) {
        $errors[] = "E-posta alanı boş bırakılamaz.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Geçerli bir e-posta adresi giriniz.";
    } elseif (strlen($email) > 255) {
        $errors[] = "E-posta adresi çok uzun.";
    }
    
    if (empty($user_message)) {
        $errors[] = "Mesaj alanı boş bırakılamaz.";
    } elseif (strlen($user_message) < 10) {
        $errors[] = "Mesaj en az 10 karakter olmalıdır.";
    } elseif (strlen($user_message) > 1000) {
        $errors[] = "Mesaj 1000 karakterden uzun olamaz.";
    }
    
    if (!empty($subject) && strlen($subject) > 200) {
        $errors[] = "Konu 200 karakterden uzun olamaz.";
    }
    $dangerous_patterns = [
        '/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/mi',
        '/<iframe\b[^>]*>/mi',
        '/<object\b[^>]*>/mi',
        '/<embed\b[^>]*>/mi',
        '/javascript:/mi',
        '/vbscript:/mi',
        '/on\w+\s*=/mi'
    ];
    
    foreach ($dangerous_patterns as $pattern) {
        if (preg_match($pattern, $name . $email . $subject . $user_message)) {
            $errors[] = "Güvenlik nedeniyle mesajınız işlenemedi.";
            break;
        }
    }
    $spam_keywords = ['cialis', 'viagra', 'casino', 'poker', 'loan', 'credit'];
    $message_lower = strtolower($user_message);
    foreach ($spam_keywords as $keyword) {
        if (strpos($message_lower, $keyword) !== false) {
            $errors[] = "Mesajınız spam olarak algılandı.";
            break;
        }
    }
    if (empty($errors)) {
        $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
        $user_message = htmlspecialchars($user_message, ENT_QUOTES, 'UTF-8');
        $log_entry = date('Y-m-d H:i:s') . " - Ad: $name, E-posta: $email, Konu: $subject, Mesaj: $user_message\n";
        file_put_contents('contact_logs.txt', $log_entry, FILE_APPEND | LOCK_EX);
        
        $message = "Mesajınız başarıyla alındı! En kısa sürede size dönüş yapacağım.";
        $message_type = 'success';
        

        $_POST = [];
        
    } else {
        $message = "Lütfen aşağıdaki hataları düzeltin:<br>• " . implode("<br>• ", $errors);
        $message_type = 'error';
    }
}
?>
