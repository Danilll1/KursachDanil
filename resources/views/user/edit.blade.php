<link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400;700&display=swap" rel="stylesheet">
@extends('layouts.layout')

<div class="login d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow" style="width: 400px;">
        <div class="card-header text-center">
            <h3 class="card-title" style="font-family: 'Tenor Sans', sans-serif; font-size: 40px; color: #005154">Личный кабинет</h3>
        </div>
        <form action="{{ route('user.update', $user->id) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
                <div class="card-body">
                        <div class="mb-3">
                        <label for="login" class="form-label">Логин:</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        <div class="invalid-feedback">
                            Пожалуйста, введите логин.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        <div class="invalid-feedback">
                            Пожалуйста, введите корректный email.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Пароль:</label>
                        <input type="password" name="password" class="form-control" placeholder="Оставьте пустым, если не хотите менять">
                    </div>

                    <button type="submit" class="btn btn-primary Button__StyledButton">Сохранить</button>
                </div>
        </form>
    </div>
    
</div>

<script>
    // Пример проверки формы на стороне клиента (Если нужно)
    (function () {
        'use strict';
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>

<style>
    .Button__StyledButton {
    background-color: #005154 !important;
    border: none !important;
    width: 100%;
}

.Button__StyledButton:hover {
    background-color: #00b2a1 !important; /* Цвет фона при наведении */
    color: #000; /* Цвет текста */
    border: none !important;
}
</style>