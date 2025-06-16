<link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400;700&display=swap" rel="stylesheet">
@extends('layouts.auth')

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
    <div class="card shadow" style="width: 400px;">
        <div class="card-header text-center">
            <h3 class="card-title" style="font-family: 'Tenor Sans', sans-serif; font-size: 40px; color: #005154">Авторизация</h3>
        </div>
        <form action="{{ route('login') }}" method='post'>
            @csrf
            <div class="card-body">

                <div class="input-group mb-2 input-container">
                    <input type="email" class="form-control" placeholder="Почта" name="email" value="{{ old('email') }}" required>
                    <!-- <label>Почта</label> -->
                </div>

                <div class="input-group mb-3 input-container">
                    <input type="password" class="form-control" placeholder="Пароль" name="password" required>
                    <!-- <label>Пароль</label> -->
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Запомнить меня</label>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block Button__StyledButton">Авторизоваться</button>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('password.request') }}" class="text-muted">Забыли пароль?</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Добавьте стили для улучшения внешнего вида -->
<style>
    .login {
        background-color: #f8f9fa;
        font-family: 'Golos Text', sans-serif; font-size: 18px;
    }
    .card {
        border-radius: 10px;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    .text-muted {
        font-size: 16px;
    }
    .form-check-label {
        font-size: 16px;
    }

    .input-container {
    position: relative;
    margin: 20px 0;
    width: 830px;
    height: 35px;
}

.input-container input{
    width: 100%;
    padding: 10px;
    border: none;
    border-bottom: 1px solid #ccc !important;
    font-size: 16px;
    transition: border-color 0.3s;
    outline: 0;
    outline-offset: 0;
    display: block;
    background: transparent;
    transition: all .3s ease;
}

.input-container label {
    position: absolute;
    cursor: text;
    z-index: 2;
    top: 13px;
    left: -5px;
    font-size: 14px;
    font-weight: bold;
    background: #fff;
    padding: 0 10px;
    color: #999;
    transition: all .3s ease
}

.input-container input:focus {
    outline: none; /* Убирает стандартное выделение */
    box-shadow: none; /* Убирает тень, если она есть */
}

.input-container input:focus + label,
.input-container input:valid + label {
    font-size: 0px;
    top: 5px
}

.input-container input:focus + label{
    color: #ccc;
}


.Button__StyledButton {
    background-color: #005154 !important;
    border: none !important;
}

.Button__StyledButton:hover {
    background-color: #00b2a1 !important; /* Цвет фона при наведении */
    color: #000; /* Цвет текста */
    border: none !important;
}



.text-muted {
    text-decoration: none !important;
}

</style>
