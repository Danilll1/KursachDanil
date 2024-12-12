<link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400;700&display=swap" rel="stylesheet">
@extends('layouts.layout')

<div class="card-product">
    <p class="title-product">{{ $product->title }}</p>
    <div class="product-details">
    <div class="product-image-container">
        <img src="{{ $product->getImage() }}" alt="{{ $product->title }}" class="product-image">
    </div>
        <ul class="product-list font_2">
            <li>НАИМЕНОВАНИЕ: <a href="{{ route('categories.show', ['slug' => $product->category->slug]) }}">{{ $product->category->title }}</a></li>
            <li><i class="{{ $product->status->item }} status-item"></i> {{ $product->status->title }}</li>
            <li> 
                <span class="card-price">
                    @if($product->old_price)
                        <del>
                            <small>@price_format($product->old_price) руб.</small>
                        </del>
                    @endif
                    @price_format($product->price) $
                </span>
            </li>
            <li>
                <div class="data-yahts font_2">
                    <p>{{ $product->data->year }} | </p>
                    <p>{{ $product->data->length }} м | </p>
                    <p>{{ $product->data->guests }} гостей | </p>
                    <p>{{ $product->data->rooms }} кают</p>
                </div>
            </li>

            @auth
                @if(Auth::check() || Auth::user()->is_admin == 1)
                    <form action="{{ route('cart.add') }}" method="POST" class="addtocart">
                        @csrf
                        <div class="add-to-cart">
                            <input type="text" class="quantity-input" name="qty" value="1" min="1" style="display: none;">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button class="add-to-cart-button btn-info" type="submit">
                                <i class="fas fa-thin fa-star"></i> Добавить
                            </button>
                        </div>
                    </form>
                @endif
            @endauth
            
            <!-- <hr> -->
            <div class="product-desc font_2">
                {{ $product->content }}
            </div>
        </ul>
    </div>
</div>

<style>
    .card-product {
    margin: 120px 100px 0 100px; 
    /* margin-left: 57px; */
    padding: 10px;
    border: 1px solid #ddd; 
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

.title-product {
    font-size: 49px !important; /* Размер заголовка */
    color: #005154; /* Цвет заголовка */
    margin-bottom: 15px; /* Отступ снизу */
    text-align: left; /* Выравнивание заголовка по центру */
    font-family: 'Tenor Sans', sans-serif;
}

.product-image-container {
    text-align: left; /* Центрирование изображения */
    margin-bottom: 15px; /* Отступ снизу для изображения */
}

.product-image {
    max-width: 600px; /* Ширина изображения максимум 100% */
    min-width: 600px;
    height: auto; /* Автоматическая высота для сохранения пропорций */
    border-radius: 4px; /* Скругление углов изображения */
    width: 80%; /* Увеличиваем размер изображения до 80% */
    padding-right: 10px;
}

.product-details {
    display: flex; /* Flexbox для размещения деталей */
    /* flex-direction: column; */
}

/* .status-item {
    color: #00b2a1 !important;
} */

.product-list {
    list-style: none; /* Убираем маркеры списка */
    padding: 0; /* Убираем отступы */
}

.product-list a {
    text-decoration: none;
    font-family: 'Tenor Sans', sans-serif;
    color: #005154;
    text-decoration: none;
    transition: 0.5s;
}

.product-list a:hover {
    text-decoration: none;
    color: #00b2a1;
}

.product-list li {
    margin-bottom: 10px; /* Отступ между пунктами списка */
    font-size: 18px;
}

.card-price {
    font-weight: bold; /* Жирный шрифт для цены */
    color: #28a745; /* Цвет для цены */
}

.add-to-cart {
    display: flex; /* Flexbox для управления расположением компонентов */
    align-items: center; /* Выравнивание по центру */
    margin-top: 15px; /* Отступ сверху */
}

.quantity-input {
    width: 60px; /* Ширина поля ввода */
    margin-right: 10px; /* Отступ справа от поля ввода */
    padding: 5px; /* Отступ внутри поля ввода */
    border: 1px solid #ccc; /* Стиль границы поля ввода */
    border-radius: 4px; /* Скругление углов поля ввода */
}

.add-to-cart-button {
    color: white; /* Цвет текста кнопки */
    border: none; /* Убираем рамку */
    padding: 10px 20px; /* Отступы внутри кнопки */
    cursor: pointer; /* Курсор как указатель */
    transition: background-color 0.3s; /* Плавный переход цвета */
    font-size: 18px;
}

.product-desc {
    margin-top: -35px;
    padding: 0;
    font-size: 14px !important; /* Размер шрифта для описания */
    color: #666; /* Цвет описания */
    white-space: pre-line;
}

/* Адаптивность для мобильных устройств */
@media (max-width: 768px) {
    .product-title {
        font-size: 20px; /* Уменьшаем размер заголовка для мобильных */
    }

    .product-list li {
        font-size: 14px; /* Уменьшаем размер шрифта списка */
    }

    .product-image {
        width: 100%; /* Увеличиваем изображение на мобильных до 100% */
    }

    .quantity-input {
        width: 45px; /* Уменьшаем ширину поля ввода */
    }
}

@media (max-width: 480px) {
    .product-card {
        padding: 10px; /* Уменьшаем отступы в карточке */
    }

    .product-title {
        font-size: 18px; /* Уменьшаем размер заголовка для маленьких экранов */
    }

    .card-price {
        font-size: 16px; /* Уменьшаем размер шрифта цены */
    }

    .add-to-cart-button {
        padding: 8px 15px; /* Уменьшаем размеры кнопок */
    }
}
</style>