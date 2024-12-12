<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новая заявка на подбор яхт</title>
</head>
<body>
    <h1>Новая заявка от {{ $name }}</h1>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Телефон:</strong> {{ $phone }}</p>
</body>
</html>


<!-- <script>
    document.getElementById('contact-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Предотвращаем стандартное поведение формы

        const formData = new FormData(this);

        fetch('/send-email', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (response.ok) {
                alert('Ваше сообщение отправлено!');
                document.getElementById('contact-form').reset(); // Очистка формы
            } else {
                alert('Произошла ошибка при отправке сообщения.');
            }
        })
        .catch(error => {
            console.error('Ошибка:', error);
            alert('Произошла ошибка при отправке сообщения.');
        });
    });
</script> -->
