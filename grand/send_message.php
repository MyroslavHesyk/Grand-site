<?php
// Telegram bot token
$botToken = "7407434357:AAFLBtIQkWLCxHO88bAr_e292vJ8qG9dt7c";

// Telegram chat ID (ID вашого чату, куди відправляти повідомлення)
$chatID = "496966744"; // Вкажіть правильний числовий ID

// Отримуємо дані з форми
$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$child_name_age = $_POST['child_name_age'];
$child_phone = $_POST['child_phone'];
$english_level = $_POST['english_level'];
$programming_experience = $_POST['programming_experience'];
$why_grant = $_POST['why_grant'];

// Формуємо повідомлення
$message = "Нова заявка на гранд:\n";
$message .= "ПІП: $fullname\n";
$message .= "Номер: $phone\n";
$message .= "Ім'я учня та вік (клас): $child_name_age\n";
$message .= "Номер учня: $child_phone\n";
$message .= "Англійська: $english_level\n";
$message .= "Чи вивчали раніше програмування: $programming_experience\n";
$message .= "Чому хочете вивчати програмування: $why_grant";

// Відправляємо повідомлення через API Telegram
$url = "https://api.telegram.org/bot$botToken/sendMessage";

$data = array(
    'chat_id' => $chatID,
    'text' => $message,
);

// Використання cURL для відправки повідомлення
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
curl_close($ch);

// Перевірка результату
if ($result === FALSE) {
    echo 'Помилка відправки повідомлення';
} else {
    // Перенаправляє користувача на сторінку з подякою
    header('Location: success.html');
    exit();
}
?>
