<link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400;700&display=swap" rel="stylesheet">
@extends('layouts.layout')

<div class="login d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow" style="width: 400px;">
        <div class="card-header text-center">
            <h3 class="card-title" style="font-family: 'Tenor Sans', sans-serif; font-size: 40px; color: #005154">Сброс пароля</h3>
        </div>

        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <div class="card-body">
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="mb-3 input-container">
                    <!-- <label for="email" class="form-label">Email</label> -->
                    <input type="email" name="email" class="from-control @error('email') is-invalid @enderror"
                        id="email" placeholder="Почта" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 input-container">
                    <!-- <label for="password" class="form-label">Пароль</label> -->
                    <input type="password" name="password" class="from-control @error('password') is-invalid @enderror"
                        id="password" placeholder="Пароль" value="{{ old('password') }}">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 input-container">
                    <!-- <label for="password_confirmation" class="form-label">Подтвердите пароль</label> -->
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Повторите пароль">
                </div>
                <button type="submit" class="btn btn-primary Button__StyledButton">Изменить пароль</button>
            </div>     
        </form>
    </div>
</div>

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
    width: 100%;
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
    width: 100%;
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


    
