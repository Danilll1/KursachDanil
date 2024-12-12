<link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400;700&display=swap" rel="stylesheet">
@extends('layouts.layout')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert" style="position: fixed; top: 0px; right: 20px; z-index: 1050;">
        {{ session('success') }}
    </div>
<script>
    // Скрыть уведомление об успехе через 5 секунд
    setTimeout(function() {
        var successAlert = document.getElementById('successAlert');
        if (successAlert) {
            var bsAlert = new bootstrap.Alert(successAlert);
            bsAlert.close();
        }
    }, 5000);

    // Скрыть уведомление об ошибке через 5 секунд
    setTimeout(function() {
        var errorAlert = document.getElementById('errorAlert');
        if (errorAlert) {
            var bsAlert = new bootstrap.Alert(errorAlert);
            bsAlert.close();
        }
    }, 5000);
</script>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="login d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow" style="width: 100%; max-width: 600px;">
        <div class="card-header text-center">
            <h3 class="card-title" style="font-family: 'Tenor Sans', sans-serif; font-size: 40px; color: #005154">Восстановление пароля</h3>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1050; width: 300px;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorAlert" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1050; width: 300px;">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <p class="d-flex justify-content-center align-items-center" style="font-family: 'Golos Text', sans-serif; font-size: 16px; padding-top: 10px;">Введите адрес электронной почты для сброса текущего пароля</p>

        <form id="resetPasswordForm" action="{{ route('password.email') }}" method="post">
            @csrf
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <div class="mb-3 input-container">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary Button__StyledButton">Отправить</button>
            </div>
        </form>
    </div>
</div>

<style>
    .card-body {
        flex-direction: column;
        padding: 0 !important;
    }

    .input-container {
        position: relative;
        width: 100%;
        max-width: 595px;
        height: auto;
    }

    .input-container input {
        width: calc(100% - 20px); /* Учитываем отступы */
        margin: 0 10px; /* Отступы слева и справа */
        padding: 10px;
        border: none;
        border-bottom: 1px solid #ccc !important;
        font-size: 16px;
        transition: border-color 0.3s;
        outline: 0;
        display: block;
        background: transparent;
    }

    .Button__StyledButton {
        background-color: #005154 !important;
        border: none !important;
        width: calc(100% - 20px); /* Учитываем отступы */
        margin: 10px; /* Отступы слева и справа */
    }

    .Button__StyledButton:hover {
        background-color: #00b2a1 !important; /* Цвет фона при наведении */
        color: #000; /* Цвет текста */
        border: none !important;
    }

    .text-muted {
        text-decoration: none !important;
    }

    /* Адаптивные стили для мобильных устройств */
    @media (max-width: 768px) {
        .card-title {
            font-size: 30px; /* Уменьшение размера заголовка на мобильных устройствах */
        }

        .card-header, .card-body p {
            font-size: 14px; /* Уменьшение размера текста на мобильных устройствах */
        }
    }
</style>

<script>
    document.getElementById('resetPasswordForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Отменяем стандартное поведение формы

        const email = this.email.value.trim();

        // Проверка на пустое значение
        if (!email) {
            alert('Пожалуйста, введите адрес электронной почты.');
            return; // Прерываем выполнение, если поле пустое
        }

        fetch(this.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Добавьте CSRF-токен
            },
            body: JSON.stringify({
                email: email
            })
        })
        .then(response => {
            if (response.ok) {
                // Показываем модальное окно об успешной отправке
                $('#successModal').modal('show');
                this.reset(); // Сбрасываем форму после успешной отправки
            } else if (response.status === 404) {
                alert('Пользователь с таким email не найден.');
            } else {
                alert('Ошибка при отправке сообщения. Пожалуйста, попробуйте еще раз.');
            }
        })
        .catch(error => {
            console.error('Ошибка:', error);
            alert('Ошибка при отправке сообщения. Пожалуйста, попробуйте еще раз.');
        });
    });
</script>

<!-- Подключите Bootstrap JS и jQuery, если они еще не подключены -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
