<link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400;700&display=swap" rel="stylesheet">
@extends('layouts.layout')

<div class="card shadow d-flex justify-content-center align-items-center vh-100">
    <div class="alert alert-info" role="alert">
        <p>Благодарим за регистрацию! Ссылка на подтверждение была отправлена на указанный адрес электронной почты.</p>
    </div>
    <div>
        <div class="container">
            <p>Ссылка не пришла?</p>
            <form action="{{route('verification.send')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-link Button__StyledButton">Отправить повторно</button>
            </form>
        </div>
        
    </div>
</div>

<style>
    .login {
        flex-direction: column;
    }

    .Button__StyledButton {
    background-color: #005154 !important;
    border: none !important;
    color: #fff !important;
    font-size: 18px !important;
}

.container p {
    text-align: center;
    font-size: 18px;
}

.Button__StyledButton:hover {
    background-color: #00b2a1 !important; /* Цвет фона при наведении */
    color: #fff !important; /* Цвет текста */
    border: none !important;
    text-decoration: none !important;
}
</style>


