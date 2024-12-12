<link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400;700&display=swap" rel="stylesheet">
@extends('layouts.layout')

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
    <div class="card shadow" style="width: 380px;">
        <div class="card-header text-center">
            <h3 class="card-title" style="font-family: 'Tenor Sans', sans-serif; font-size: 40px; color: #005154">Регистрация</h3>
        </div>
        <form action="{{ route('register.store') }}" method='post'>
            @csrf
            <div class="card-body">

                <div class="input-group mb-3 input-container">
                    <!-- <label for="username" id="usernameLabel">Имя</label> -->
                    <input type="text" id="username" oninput="toggleLabel()" class="form-controller" placeholder="Имя" name="name" value="{{ old('name') }}">
                </div>

                <div class="input-group mb-3 input-container">
                    <!-- <label>Почта</label> -->
                    <input type="email" class="form-control" placeholder="Почта" name="email" value="{{ old('email') }}">
                </div>

                <div class="input-group mb-3 input-container">
                    <!-- <label>Пароль</label> -->
                    <input type="password" class="form-control" placeholder="Пароль" name="password">
                </div>

                <div class="input-group mb-3 input-container">
                    <!-- <label>Повторите пороль</label> -->
                    <input type="password" class="form-control" placeholder="Повторите пароль" name="password_confirmation">
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-bloсk Button__StyledButton">Зарегистрироваться</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


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
    display: block;
    background: transparent;
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

    pointer-events: none;
    transform: translateY(0);
}

input:focus + .label,
input:not(:placeholder-shown) + .label {
    transform: translateY(-20px);
    font-size: 12px;
    color: #777;
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
    /* margin-top: 20px; */
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
