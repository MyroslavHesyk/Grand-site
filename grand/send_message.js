$(document).ready(function() {
    // Обробник події відправки форми
    $('#grantForm').on('submit', function(event) {
        event.preventDefault(); // Запобігає перезавантаженню сторінки

        // Отримуємо дані з форми
        var formData = $(this).serialize();

        // Відправка форми через AJAX
        $.ajax({
            url: 'send_message.php', // Шлях до PHP-файлу для обробки форми
            type: 'POST',
            data: formData,
            success: function(response) {
                // Якщо успішно — показуємо модальне вікно
                $('#popup_9').modal('show');
            },
            error: function(xhr, status, error) {
                // У випадку помилки — можна показати повідомлення про помилку
                alert('Сталася помилка при відправці форми. Спробуйте ще раз!.');
            }
        });
    });
});
