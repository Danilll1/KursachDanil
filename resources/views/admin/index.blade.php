<link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400;700&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@extends('admin.layout')

@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

<div class="card">
    <div class="card-body font_2 row">
        @foreach ($products as $product)
        <div class="box col-12 col-sm-6 col-md-4 mb-4">
            <div class="card">
                <form action="{{ route('admin.update', $product) }}" class="aproduct-card" method="POST" enctype="multipart/form-data">
                    <h2 class="text-center mb-4 font_1" style="font-size: 32px; color: #005154;">Редактирование продукта</h2>
                    @csrf
                    <ul class="list-unstyled">

                    <li class="mb-3">
                        <label for="title" class="form-label">Название яхты</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $product->title }}" href="{{ route('products.show', ['slug' => $product->slug]) }}">
                    </li>

                    <li class="mb-3">
                        <label for="data_id" class="form-label">Параметры яхты</label>
                        <input type="text" class="form-control" id="data_id" name="data_id" value="{{ $product->data_id }}" required>
                    </li>

                    <li class="mb-3">
                        <label for="category_id" class="form-label">Категория</label>
                        <select class="form-select" name="category_id" id="category_id">
                            <option value="" disabled selected>Выберите категорию</option>
                            <option value="1" {{ $product->category_id == 1 ? 'selected' : '' }}>Большие яхты</option>
                            <option value="2" {{ $product->category_id == 2 ? 'selected' : '' }}>Малые яхты</option>
                        </select>
                    </li>

                    <li class="mb-3">
                        <label for="status_id" class="form-label">Статус</label>
                        <select class="form-select" name="status_id" id="status_id">
                            <option value="" disabled selected>Выберите статус</option>
                            <option value="1" {{ $product->status->id == 1 ? 'selected' : '' }}>В наличии</option>
                            <option value="2" {{ $product->status->id == 2 ? 'selected' : '' }}>Ожидается</option>
                        </select>
                    </li>

                    <li class="mb-3">
                        <label for="hit" class="form-label">Выгода</label>
                        <select class="form-select" name="hit" id="hit">
                            <option value="" disabled selected>Выберите выгоду</option>
                            <option value="1" {{ $product->hit == 1 ? 'selected' : '' }}>ВЫГОДА</option>
                            <option value="0" {{ $product->hit == 0 ? 'selected' : '' }}>НЕ ВЫГОДА</option>
                        </select>
                    </li>

                    <li class="mb-3">
                        <label for="sale" class="form-label">Скидка</label>
                        <select class="form-select" name="sale" id="sale">
                            <option value="" disabled selected>Выберите скидку</option>
                            <option value="1" {{ $product->sale == 1 ? 'selected' : '' }}>СКИДКА</option>
                            <option value="0" {{ $product->sale == 0 ? 'selected' : '' }}>НЕТ СКИДКИ</option>
                        </select>
                    </li>

                    <li class="mb-3">    
                        <label for="img" class="form-label">Изображение</label>
                        <input type="file" class="form-control" id="img" name="img">
                    </li>

                    <li class="mb-3">
                        <label for="price" class="form-label">Цена</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                    </li>

                    <li class="mb-3">
                        <label for="content" class="form-label">Описание</label>
                        <textarea class="form-control" id="content" name="content" rows="5">{{ $product->content }}</textarea>
                    </li>
                </ul>
                    <div class="box-btn">
                        <form action="{{ route('admin.update', $product->id) }}" method="POST"">
                            @csrf
                            <button type="submit" id="" class="btn btn-success">Сохранить изменения</button>
                        </form>
                        <form action="{{ route('admin.destroy', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger trash">Удалить продукт</button>
                        </form>
                    </div>
                </form>
            </div>
        </div>  
        <div class="img-card">
                    @if ($product->img)
                        <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->title }}" class="img-fluid rounded" style="max-height: 400px; object-fit: cover;">
                    @endif
                </div>
        @endforeach
    </div>
    </div>
</div>

<!-- Пагинация -->
<div class="d-flex justify-content-center mt-4">
    {{ $products->links() }}
</div>

<a href="{{ route('admin.users.index') }}">Перейти к списку пользователей</a>

<style>
    .card {
        border: none !important;
    }
    .card-body {
        margin-top: 100px;
        display: flex;
        justify-content: center;
        font-size: 16px !important;
    }

    .img-card {
        display: flex;
        justify-content: center;
        padding-left: 100px;
    }

    .img-card img {
        object-fit: cover;
    }

    .list-unstyled select {
        font-family: 'Tenor Sans', sans-serif; font-size: 16px;
    }
    

    .box-btn {
        display: flex;
        justify-content: space-between;
        height: 38px;
    }

    .alert {
        margin-top: 100px;
    }

    .img-card {
        display: flex;
        justify-content: center;
        padding: 0;
    }

    .img-card img {
        max-height: 250px; /* Уменьшите высоту для мобильных устройств */
        object-fit: cover;
        width: 100%; /* Адаптивность */
    }

    .card {
        border: 1px solid #ddd; /* Добавьте рамку для лучшей видимости */
        border-radius: 8px;
        transition: transform 0.2s; /* Эффект при наведении */
    }

    @media (max-width: 576px) {
        .img-card img {
            max-height: 200px; /* Еще меньше для очень маленьких экранов */
        }
        
        .card-title {
            font-size: 1.25rem; /* Уменьшите размер заголовка на мобильных */
        }
        
        .card-text {
            font-size: 0.9rem; /* Уменьшите размер текста */
        }
    }
</style>
