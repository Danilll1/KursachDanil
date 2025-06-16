<link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400;700&display=swap" rel="stylesheet">
<!-- Подключение CSS Bootstrap -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Подключение jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Подключение JS Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

@extends('admin.layout')

@section('content')


@if (session('success'))
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Успех</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
@endif
<script>
    $(document).ready(function() {
        @if (session('success'))
            // Показываем модальное окно
            $('#successModal').modal('show');

            // Закрываем модальное окно через 5 секунд
            setTimeout(function() {
                $('#successModal').modal('hide');
            }, 5000);
        @endif
    });
</script>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="container" style="padding-top: 120px; padding-bottom: 20px;">
    <p style="font-family: 'Tenor Sans', sans-serif; font-size: 48px; color: #005154;" class="p">Карточка новой яхты</p>

    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="mb-3">
            <label for="data_id" class="form-label">Параметры яхты</label>
            <input type="number" class="form-control" id="data_id" name="data_id" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Описание товара</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="sale" class="form-label">Распродажа</label>
            <select style="" class="custom-select" name="sale" id="sale">
                <option value="0">Нет</option>
                <option value="1">Да</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="hit" class="form-label">Хит продаж</label>
            <select class="custom-select" id="hit" name="hit">
                <option value="0">Нет</option>
                <option value="1">Да</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Категория</label>
            <select class="custom-select" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status_id" class="form-label">Статус</label>
            <select class="custom-select" id="status_id" name="status_id" required>
                <option value="">Выберите статус</option>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="img" class="form-label">Изображение</label>
            <input type="file" class="form-control" id="img" name="img">
        </div>

        <button type="submit" class="btn btn-primary Button__StyledButton">Создать карточку</button>
    </form>
</div>
@endsection

<style>
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

label {
    font-family: 'Golos Text', sans-serif;
}

@media (max-width: 768px) {
    .p {
        font-size: 38px !important; /* Размер для планшетов и мобильных устройств */
    }
}

@media (max-width: 480px) {
    .p {
        font-size: 24px !important; /* Размер для мобильных устройств */
    }
}
</style>
