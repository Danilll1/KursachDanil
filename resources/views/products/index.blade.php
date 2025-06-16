<link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400;700&display=swap" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

@extends('layouts.layout')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert"
        style="position: fixed; top: 0px; right: 20px; z-index: 1050;">
        {{ session('success') }}
    </div>

    <script>
        // Скрыть уведомление через 5 секунд
        setTimeout(function () {
            var alert = document.getElementById('successAlert');
            if (alert) {
                var bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 1000);
    </script>
@endif

@section('carousel') 
<style>
    .slider {
        margin: 0 auto;
        display: flex;
        width: 100%;
        height: 80vh;
        position: relative;
        overflow: hidden;
        flex-direction: column;
    }

    .slider-img {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    .slider img {
        object-fit: cover;
        max-width: 100%;
    }

    .slider-img.active {
        opacity: 1;
    }

    .slider .prev,
    .slider .next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        transition: opacity 0.3s ease;
        ;
        z-index: 10;
    }

    .slider .prev {
        left: 10px;
    }

    .slider .next {
        right: 10px;
    }

    .slider .prev:hover,
    .slider .next:hover {
        opacity: 0.7;
    }

    .caption {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        color: white;
        font-size: 20px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        text-align: center;
    }

    / Адаптивные стили / @media (max-width: 768px) {

        .slider {
            height: 60vh;
            /* Уменьшаем высоту слайдера на мобильных */
        }

        .caption {
            font-size: 16px;
        }

        .slider .prev,
        .slider .next {
            height: 30px;
            width: 30px;
        }

        .slider .prev img,
        .slider .next img {
            height: 100%;
            width: auto;
        }

        .slider-img img {
            width: 50%;
            height: 50%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 0.5s ease;
        }
    }

    @media (max-width: 480px) {
        .slider {
            height: 50vh;
            /* Еще меньше на очень маленьких экранах */
        }

        .caption {
            font-size: 14px;
            /* Еще меньше на очень маленьких экранах */
            bottom: 5px;
            /* Поднимаем текст немного выше */
        }

        .slider .prev,
        .slider .next {
            height: 25px;
            /* Уменьшаем высоту кнопок для iPhone SE */
            width: 25px;
            /* Уменьшаем ширину кнопок для iPhone SE */
            left: 5px;
            /* Сдвигаем кнопки ближе к краю */
            right: 5px;
            /* Сдвигаем кнопки ближе к краю */
        }

        /* Обновляем позиционирование кнопок для предотвращения наложения */
        .slider .prev {
            left: 5px;
        }

        .slider .next {
            right: 5px;
        }

        .slider .prev,
        .slider .next {
            top: 50%;
            transform: translateY(-50%) scale(0.7);
            /* Уменьшаем масштаб кнопок */
        }
    }
</style>

<div class="slider">
    <img class='slider-img active' src="{{ asset('storage/images/с2.webp')}}" />
    <img class='slider-img' src="{{ asset('storage/images/с3.webp')}}" />
    <img class='slider-img' src="{{ asset('storage/images/с4.webp')}}" />

    <div class="caption">Название 1</div>
    <img style='height: 40px;' class="prev controlls" src="{{ asset('storage/images/left.png') }}" alt="">
    <img style='height: 40px;' class="next controlls" src="{{ asset('storage/images/right.png') }}" alt="">
</div>

<script>
    const images = document.querySelectorAll('.slider-img');
    const controlls = document.querySelectorAll('.controlls');
    const caption = document.querySelector('.caption');
    const captions = ["IRINA", "SPARTAK", "SERENA", "Название 4", "Название 5"];
    let imageIndex = 0;

    function show(index) {
        images[imageIndex].classList.remove('active');
        images[index].classList.add('active');
        caption.textContent = captions[index];
        imageIndex = index;
    }
    controlls.forEach((e) => {
        e.addEventListener('click', (event) => {
            let index;

            if (event.target.classList.contains('prev')) {
                index = imageIndex - 1;
                if (index < 0) {
                    index = images.length - 1;
                }
            } else if (event.target.classList.contains('next')) {
                index = imageIndex + 1;
                if (index >= images.length) {
                    index = 0;
                }
            }

            show(index);
        });
    });

    show(imageIndex);
</script>
@endsection


@section('search')
<h1 style="font-family: 'Tenor Sans', sans-serif; font-size: 60px; color: #005154; padding-left: 100px; padding-top: 80px"
    class="h1">КУПИТЬ ЯХТУ</h1>
<form class="search-form" action="{{ route('products.search') }}" method="GET">
    <div class="search__input">
        <input type="text" aria-label="Search" name="query" class="Input__StyledInput" required placeholder=" ">
        <label>Поиск</label>
    </div>

    <div class="feedback-button">
        <button class="btn btn-search" type="submit">Найти на сайте</button>
        </button>
    </div>

    <style>
        .search-form {
            padding: 0 100px 0 100px;
            width: 100%;
            display: flex;
            flex-direction: column;
            /* Элементы будут друг под другом */
            position: relative;
        }

        .search__input {
            position: relative;
            width: 100%;
            /* Поле ввода будет занимать всю ширину контейнера */
            margin: 20px 0;
            /* Отступы сверху и снизу */
        }

        .search__input input {
            width: 100%;
            /* Поле ввода занимает всю ширину контейнера */
            padding: 10px;
            border: none;
            border-bottom: 1px solid #ccc;
            font-size: 16px;
            transition: border-color 0.3s;
            outline: none;
            background: transparent;
        }

        .search__input label {
            position: absolute;
            cursor: text;
            z-index: 2;
            top: 13px;
            /* Положение метки по вертикали */
            left: 10px;
            /* Положение метки по горизонтали */
            font-size: 14px;
            font-weight: bold;
            background: #fff;
            /* Фон метки */
            padding: 0 5px;
            /* Отступы вокруг текста метки */
            color: #999;
            /* Цвет метки */
            transition: all .3s ease;
            /* Плавный переход для анимации */
        }

        .search__input input:focus+label,
        .search__input input:not(:placeholder-shown)+label {
            font-size: 11px;
            /* Размер шрифта при фокусировке или наличии текста */
            top: -5px;
            /* Сдвиг метки вверх */
        }

        .search__input input:focus+label {
            color: #666;
            /* Цвет метки при фокусировке */
        }

        .search__input input:valid+label {
            color: #666;
            /* Цвет метки при валидном вводе */
        }

        /* Кнопка */
        .feedback-button {
            text-align: center;
        }

        .btn-search {
            width: 100%;
            padding: 10px 0 10px 0;
            /* Отступы внутри кнопки */
            margin: 10px 0 10px 0;
            background-color: #00b2a1;
            /* Цвет фона кнопки */
            color: white;
            /* Цвет текста */
            border: none;
            /* Убираем рамку */
            font-size: 18px;
            /* Размер шрифта */
            cursor: pointer;
            /* Указываем, что это кнопка */
            transition: background-color 0.5s, transform 0.5s;
            /* Плавные переходы */
            font-family: 'Tenor Sans', sans-serif;
        }

        .btn-search:hover {
            background-color: transparent;
            /* Цвет фона при наведении */
            color: #ccc;
            /* Цвет текста */
            border: 1px solid #ccc;
            margin: 9px 0 9px 0;
        }

        .btn-search:active {
            transform: scale(0.95);
            /* Эффект нажатия */
        }

        .h1 {}

        @media (max-width: 768px) {

            .search-form {
                padding: 0;
            }

            .h1 {
                font-size: 40px !important;
                padding: 0 !important;
                padding-top: 20px !important;
            }
        }

        @media (max-width: 480px) {
            .h1 {
                font-size: 32px !important;
                padding: 0;
            }
        }
    </style>

</form>
@endsection

@section('content')
<div class="product-cards">
    @foreach ($products as $product)
        <div class="product-card">

            <div class="offer font_1">
                @if ($product->hit)
                    <div class="offer-hit">ВЫГОДА</div>
                @endif
                @if ($product->sale)
                    <div class="offer-sale">СКИДКА</div>
                @endif
            </div>

            <div class="card-thumb">
                <a href="{{ route('products.show', ['slug' => $product->slug]) }}">
                    <img src="{{ $product->getImage() }}" alt="">
                </a>
            </div>
            <div class="card-content font_1">
                <div class="card-name">
                    <a href="{{ route('products.show', ['slug' => $product->slug]) }}">{{ $product->title }}</a>
                </div>

                <div class="data-yahts font_2">
                    <p>{{ $product->data->year }} | </p>
                    <p>{{ $product->data->length }} м | </p>
                    <p>{{ $product->data->guests }} гостей | </p>
                    <p>{{ $product->data->rooms }} кают</p>
                </div>
                @auth
                    @if(Auth::check())
                        <form action="{{ route('cart.add') }}" method="post" class="addtocart">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="qty" value="1" style=" display: none;">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">


                                <div class="input-group-append">
                                    <button class="btn btn-info btn-block cart-addtocart" type="submit"><i
                                            class="fas fa-thin fa-star"></i>Добавить</button>
                                </div>
                            </div>
                        </form>
                    @endif
                @endauth

                <div class="card-price font_2">
                    @if ($product->old_price)
                        <del><small>{{ number_format($product->old_price, 0, '', ' ') }} руб</small></del>
                    @endif
                    {{ number_format($product->price, 0, '', ' ') }} $
                </div>
            </div>
            <div class="item-status">
                <i class="{{ $product->status->icon }}"></i> {{ $product->status->title }}
            </div>
        </div>
    @endforeach
</div>
@endsection

@section('feedback')
<section class="feedback">
    <form id="contact-form" action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div class="feedback-text">Не нашли ничего подходящего?</div>
        <div class="feedback-text2">Оставьте заявку, и мы сделаем для вас индивидуальную подборку яхт. Нам всегда есть,
            что предложить.</div>
        <div class="feedback-inputs">

            <div class="input-container">
                <input name="name" aria-label="Имя" value="{{ old('name') }}" required>
                <label>Имя</label>
                @error('name')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-container">
                <input type="tel" name="phone" aria-label="Телефон" value="{{ old('phone') }}" required>
                <label>Телефон</label>
                @error('phone')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-container">
                <input name="email" aria-label="Почта" value="{{ old('email') }}" required>
                <label>Почта</label>
                @error('email')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="feedback-button">
            <button class="Button__StyledButton" aria-label="Подобрать яхту" type="submit">
                Подобрать яхту
                <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L6 5.5L1 10" stroke="currentColor" stroke-width="2" />
                </svg>
            </button>
        </div>

        <div class="FeedbackFormstyled">Нажимая кнопку «Подобрать яхту» Вы соглашаетесь на
            <a href="#">обработку персональных данных</a>.
        </div>
    </form>

    <!-- Для feedback -->
    <style>
        .feedback {
            margin-top: 50px;
            width: 100%;
            padding: 0 100px;
            /* Убираем высоту, чтобы она адаптировалась к содержимому */
            background-size: cover;
            /* Чтобы изображение занимало всю ширину и высоту */
            background-position: center;
            z-index: 0;
            /* Помещает фон под текстом */
        }

        .feedback-text {
            font-size: 36px;
            margin: 0 auto 40px;
            display: flex;
            justify-content: center;
        }

        .feedback-text2 {
            font-size: 16px;
            padding: 0 20px 58px 0;
            display: flex;
            justify-content: center;
        }

        /* Инпуты */
        *,
        *:focus {
            outline: none;
        }

        .feedback-inputs {
            display: flex;
            justify-content: space-between;
            /* Равномерное распределение пространства между элементами */
            gap: 10px;
            /* Отступы между инпутами */
            flex-wrap: wrap;
            /* Позволяет элементам переходить на новую строку */
            width: 100%;
            /* Занимаем всю ширину родительского элемента */
        }

        .input-container {
            position: relative;
            margin: 20px 0;
            flex: 1;
            /* Делает все input-container одинаковой ширины */
            min-width: 250px;
            /* Минимальная ширина контейнера для инпута */
        }

        .input-container input {
            width: 100%;
            padding: 10px;
            border: none;
            border-bottom: 1px solid #ccc !important;
            font-size: 16px;
            transition: border-color 0.3s;
            outline: 0;
            display: block;
            background: transparent;
            transition: all .3s ease;
        }

        .input-container label {
            position: absolute;
            cursor: text;
            z-index: 2;
            top: 13px;
            left: 10px;
            font-size: 14px;
            font-weight: bold;
            background: #fff;
            padding: 0 10px;
            color: #999;
            transition: all .3s ease;
        }

        .input-container input:focus+label,
        .input-container input:valid+label {
            font-size: 11px;
            top: -5px;
        }

        .input-container input:focus+label {
            color: #ccc;
        }

        /* Кнопка */
        .feedback-button {
            text-align: center;
        }

        .Button__StyledButton {
            padding: 20px 57px;
            /* Отступы внутри кнопки */
            margin: 60px 0 80px 0;
            background-color: #00b2a1;
            /* Цвет фона кнопки */
            color: white;
            /* Цвет текста */
            border: none;
            /* Убираем рамку */
            font-size: 16px;
            /* Размер шрифта */
            cursor: pointer;
            /* Указываем, что это кнопка */
            transition: background-color 0.5s, transform 0.5s;
            /* Плавные переходы */
        }

        .Button__StyledButton:hover {
            background-color: transparent;
            /* Цвет фона при наведении */
            color: #000;
            /* Цвет текста */
            border: 1px solid;
            padding: 19.5px 57px;
            /* Учитываем изменение размера */
        }

        .Button__StyledButton:active {
            transform: scale(0.95);
            /* Эффект нажатия */
        }

        .Button__StyledButton svg {
            margin-left: 8px;
            /* Отступ между текстом и иконкой */
        }

        /* Нижний текст */
        .FeedbackFormstyled {
            display: flex;
            /* Включаем Flexbox */
            justify-content: center;
            /* Центрируем по вертикали */
            align-items: center;
            /* Центрируем по горизонтали */
            text-align: center;
            /* Центрируем текст внутри блока */
            font-size: 12px;
        }

        .FeedbackFormstyled a {
            padding: 0 0 0 5px;
        }

        /* Медиа-запросы */
        @media (max-width: 768px) {
            .feedback {
                padding: 20px;
                /* Уменьшаем отступы на мобильных устройствах */
                height: auto;
                /* Разрешаем высоте адаптироваться к содержимому */
            }

            .feedback-text {
                font-size: 28px;
                /* Уменьшаем размер заголовка */
                text-align: center !important;
            }

            .feedback-text2 {
                font-size: 14px;
                /* Уменьшаем размер подзаголовка */
            }

            .feedback-inputs {
                flex-direction: column;
                /* Смена направления на столбик */
                gap: 15px;
                /* Увеличиваем отступы между инпутами */
            }

            .input-container {
                width: 100%;
                /* Делает контейнеры инпутов более адаптивными */
                margin: 0;
                /* Убираем отступы по вертикали */
            }

            .input-container input {
                max-width: none;
                /* Ограничиваем ширину для мобильных */
                font-size: 14px;
                /* Уменьшаем размер шрифта в полях ввода */
            }

            .Button__StyledButton {
                font-size: 14px;
                /* Уменьшаем размер шрифта на кнопке */
                padding: 15px 40px;
                /* Уменьшаем отступы на кнопке */
            }

            .FeedbackFormstyled {
                display: flex;
                flex-direction: column;
            }
        }

        @media (max-width: 500px) {
            .feedback-text {
                font-size: 22px;
                /* Уменьшаем размер заголовка для маленьких экранов */
                margin-bottom: 20px;
            }

            .feedback-text2 {
                font-size: 12px;
                /* Уменьшаем размер подзаголовка для маленьких экранов */
                text-align: center !important;
                padding: 0;
                margin-bottom: 10px;
            }

            .Button__StyledButton {
                padding: 15px 30px;
                /* Уменьшаем отступы на кнопке для маленьких экранов */
            }

            .FeedbackFormstyled {
                font-size: 10px;
                /* Дополнительное уменьшение размера текста в соглашении */
            }
        }
    </style>

</section>
@endsection

@section('info-buy')
<!-- Секция с инфой о покупке -->
<section class="info-buy">
    <h2 style="margin-bottom: 66px;">Купить яхту с Danil Yachts</h2>
    <div class="info-buy-info">
        <p>Продаем яхты от 15 до 120 метров всех известных брендов и верфей - Benetti, Heesen, Sanlorenzo, Amels,
            Lurssen, Sunseeker, Cantiere delle Marche, Feadship, Mangusta и многих других. С нами можно купить любую
            яхту на рынке или построить свою собственную по вашим предпочтениям.</p>
        <p style="margin: 48px 0 0;">Наши брокеры используют крупнейшую базу данных по рынку яхт. После его детального
            анализа, мы предложим вам лучшие варианты для покупки яхты. Представим ваши интересы и сопроводим вас через
            все этапы сделки - подготовка контракта, оценка состояния яхты и ходовые испытания, вопросы с регистрацией и
            передачей права собственности.</p>
        <p style="font-weight: bold; margin: 48px 0 0; color: #000000CC;">Свяжитесь с нами, чтобы обсудить покупку яхты:
            <br>
            <span><a href="tel:+37797983210">T: +377 97 98 32 10</a></span><br>
            <span><a href="mailto:info@arconyachts.com">E: info@arconyachts.com</a></span>
        </p>
    </div>
</section>

<!-- для info-buy -->
<style>
    .info-buy {
        padding: 0 100px;
        /* Отступы по бокам */
        margin-bottom: 50px;
        width: 100%;
        height: auto;
        /* Позволяем высоте адаптироваться к содержимому */
        box-sizing: border-box;
        /* Учитываем отступы в ширине */
    }

    .info-buy h2 {
        text-align: left;
        font-size: 40px;
        margin: 0 0 66px;
        color: #005154;
        font-family: 'Tenor Sans', sans-serif;
    }

    .info-buy-info {
        font-size: 16px;
        font-family: 'Golos Text', sans-serif;
    }

    .info-buy-info a {
        color: #000;
        /* Цвет ссылки */
        text-decoration: none;
        /* Убираем подчеркивание */
        font-size: 16px;
        /* Размер шрифта */
        transition: color 0.3s;
        /* Плавный переход цвета при наведении */
    }

    .info-buy-info a:hover {
        text-decoration: none;
        color: #000000CC;
        /* Цвет ссылки при наведении */
    }

    @media (max-width: 768px) {
        .info-buy {
            padding: 0 20px;
            /* Уменьшаем отступы на мобильных устройствах */
        }

        .info-buy h2 {
            font-size: 28px;
            /* Уменьшаем размер заголовка на мобильных устройствах */
            margin-bottom: 40px;
            /* Уменьшаем отступ снизу заголовка */
        }

        .info-buy-info {
            font-size: 14px;
            /* Уменьшаем размер текста на мобильных устройствах */
        }
    }

    @media (max-width: 480px) {
        .info-buy h2 {
            font-size: 24px;
            /* Дополнительное уменьшение размера заголовка для маленьких экранов */
            margin-bottom: 30px;
            /* Уменьшаем отступ снизу заголовка еще больше */
        }

        .info-buy-info {
            font-size: 12px;
            /* Дополнительное уменьшение размера текста для маленьких экранов */
        }
    }
</style>
@endsection


<!-- секция с location -->
@section('location')
<section class="location">
    <div class="background-image"></div>
    <div class="info">
        <h2 style="font-family: 'Golos Text', sans-serif; font-size: 18px;">Главный офис</h2>
        <p style="font-family: 'Tenor Sans', sans-serif; font-size: 40px;">МОНАКО</p>
        <p style="font-family: 'Tenor Sans', sans-serif; font-size: 28px;">info@arconyachts.com</p>
        <p style="font-family: 'Golos Text', sans-serif; font-size: 18px;">27-29, Avenue des Papalins, MC 98000</p>
        <p style="font-family: 'Golos Text', sans-serif; font-size: 18px;">+377.97.98.3210</p>
    </div>
</section>

<!-- для location -->
<style>
    .location {
        position: relative;
        height: 468px;
        overflow: hidden;
        /* Скрыть все, что выходит за пределы секции */
    }

    .background-image {
        background-image: url('{{ asset('storage/images/monaco-map.svg') }}');
        background-size: cover;
        /* Чтобы изображение занимало всю ширину и высоту */
        background-position: center;
        /* Центрировать изображение */
        height: 100%;
        /* Занять всю высоту родительского элемента */
        width: 100%;
        /* Занять всю ширину родительского элемента */
        position: absolute;
        /* Позволяет наложить изображение на другие элементы */
        top: 0;
        /* Устанавливаем верхнюю границу */
        left: 0;
        /* Устанавливаем левую границу */
    }

    .info {
        position: absolute;
        /* Позволяет позиционировать текст относительно родителя */
        top: 50%;
        /* Центрируем по вертикали */
        right: 20px;
        /* Отступ от правого края */
        transform: translateY(-50%);
        /* Центрируем по вертикали */
        color: white;
        /* Цвет текста, чтобы выделялся на фоне */
        text-align: right;
        /* Выравнивание текста по правому краю */
        padding-right: 100px;
    }

    .info h2 {
        font-size: 24px;
        /* Размер шрифта для заголовка */
        margin: 0;
        /* Убираем отступы */
    }

    .info p {
        margin: 5px 0;
        /* Отступы между параграфами */
    }

    @media (max-width: 768px) {
        .location {
            height: auto;
            /* Позволяем высоте адаптироваться к содержимому на мобильных устройствах */
        }

        .info {
            top: auto;
            /* Убираем вертикальное центрирование */
            bottom: 20px;
            /* Устанавливаем отступ снизу */
            right: 10px;
            /* Уменьшаем отступ справа */
            padding-right: 20px;
            /* Уменьшаем отступ внутри блока информации */
            text-align: left;
            /* Выравнивание текста по левому краю для мобильных */
            transform: none;
            /* Убираем трансформацию для мобильных устройств */
        }

        .info h2 {
            font-size: 20px;
            /* Уменьшаем размер заголовка на мобильных устройствах */
        }

        .info p {
            font-size: 16px;
            /* Уменьшаем размер текста на мобильных устройствах */
        }
    }

    @media (max-width: 480px) {
        .info {
            bottom: 10px;
            /* Уменьшаем отступ снизу на очень маленьких экранах */
            right: 5px;
            /* Уменьшаем отступ справа на очень маленьких экранах */
            padding-right: 10px;
            /* Уменьшаем отступ внутри блока информации еще больше */
        }

        .info h2 {
            font-size: 18px;
            /* Дополнительное уменьшение размера заголовка для маленьких экранов */
        }

        .info p {
            font-size: 14px;
            /* Дополнительное уменьшение размера текста для маленьких экранов */
        }
    }
</style>
@endsection

@section('footer')
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p style="font-family: 'Tenor Sans', sans-serif;">Компания Arcon Yachts предоставляет своим клиентам
                    широкий спектр услуг в сфере яхтенной индустрии.</p>
            </div>
            <div class="col-md-4" style="text-align: center;">
                <h5 style="font-size: 26px; font-family: 'Tenor Sans', sans-serif;">Контакты</h5>
                <ul style="font-family: 'Tenor Sans', sans-serif;">
                    <li>Email: info@example.com</li>
                    <li>Телефон: +1 (234) 567-890</li>
                    <li>Адрес: Улица, Город, Страна</li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="social-links" style="list-style-type: none; padding: 0; text-align: right; font-family: 'Tenor Sans', sans-serif;">
                    <li>
                        <h5 style="font-size: 26px; font-family: 'Tenor Sans', sans-serif;">Социальные сети</h5>
                    </li>
                    <li style=""><a href="https://www.instagram.com/arconyachtsmonaco/"><i
                                class="fab fa-instagram"></i> Instagram</a></li>
                    <li style=""><a href="https://www.facebook.com/arconyachts/"><i
                                class="fab fa-facebook-f"></i> Facebook</a></li>
                    <li style=""><a href="https://www.linkedin.com/company/arcon-yachts/"><i
                                class="fab fa-twitter"></i> Twitter</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center">
            <p>&copy; {{ date('Y') }} Ваша Компания. Все права защищены.</p>
        </div>
    </div>
</footer>

<!-- для footer -->
<style>
    footer {
        background-color: #005154;
        /* Темный фон */
        color: white;
        /* Белый текст */
        padding: 40px 0 20px 0;
        /* Отступы сверху и снизу */
    }

    footer h5 {
        font-size: 18px;
        /* Размер заголовка */
        margin-bottom: 20px;
        /* Отступ снизу */
    }

    footer p {
        margin-bottom: 10px;
        /* Отступ между параграфами */
    }

    footer ul {
        list-style-type: none;
        /* Убираем маркеры списка */
        padding: 0;
        /* Убираем отступы */
    }

    footer a {
        color: #3498DB;
        /* Цвет ссылок */
        text-decoration: none;
        /* Убираем подчеркивание */
    }

    footer a:hover {
        text-decoration: underline;
        /* Подчеркивание при наведении */
    }

    .social-links {
        display: flex;
        /* Используем флекс для горизонтального расположения */
        gap: 15px;
        /* Отступ между иконками */
        flex-direction: column;
        align-items: flex-end;
    }

    .social-links a {
        color: #fff;
        /* Цвет ссылок */
        display: flex;
        /* Используем флекс для выравнивания иконки и текста */
        align-items: center;
        /* Центрируем по вертикали */
        transition: 0.4s;
    }

    .social-links a:hover {
        color: #6a6f75;
        text-decoration: none !important;
    }

    .social-links i {
        margin-right: 8px;
        /* Отступ справа от иконки */
    }

    .text-center {
        margin-top: 20px;
        /* Отступ сверху для текста в центре */
    }

    @media (max-width: 768px) {
        footer .row {
            flex-direction: column;
            /* Вертикальное выравнивание на мобильных устройствах */
            align-items: center;
            /* Центрируем содержимое */
            text-align: center;
            /* Центрируем текст */
        }

        footer h5 {
            font-size: 22px;
            /* Уменьшаем размер заголовка на мобильных */
        }

        footer p,
        footer ul li {
            font-size: 16px;
            /* Уменьшаем размер текста на мобильных */
        }

        .social-links {
            align-items: center;
            /* Центрируем социальные ссылки */
            margin-top: 15px;
            /* Отступ сверху для социальных ссылок */
        }
    }

    @media (max-width: 480px) {
        footer h5 {
            font-size: 20px;
            /* Дополнительное уменьшение для очень маленьких экранов */
        }

        footer p,
        footer ul li {
            font-size: 14px;
            /* Еще меньше размер текста на маленьких экранах */
        }

        .social-links {
            gap: 10px;
            /* Уменьшаем отступ между иконками на маленьких экранах */
        }
    }
</style>
@endsection


<!-- для location -->
<style>
    .location svg {
        width: 100%;
    }
</style>


<style>
    /* Стили для формы с отправкой */
    .forma {
        padding-top: 50px;
        width: 100%;
        height: 500px;
    }

    .forma-text {
        /* display: flex; */
        justify-content: center;
    }

    /* Общие стили для страницы продуктов */

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        /* Более выраженная тень при наведении */
    }

    .card-thumb {
        position: relative;
    }

    .card-thumb img {
        width: 100%;
        height: auto;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .offer {
        position: absolute;
        top: 10px;
        left: 10px;
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 12px;
    }

    .offer-hit,
    .offer-sale {
        color: white;
        padding: 10px;
        /* Увеличиваем отступы для создания круга */
        border-radius: 50%;
        /* Делаем круг */
        width: 40px;
        /* Ширина круга */
        height: 40px;
        /* Высота круга */
        display: flex;
        /* Используем Flexbox для центрирования текста */
        justify-content: center;
        /* Горизонтальное центрирование текста */
        align-items: center;
        /* Вертикальное центрирование текста */
        font-size: 0.9em;
    }

    .offer-hit {
        background-color: #003e42;
    }

    .offer-sale {
        background-color: #003e42;
    }

    .card-caption {
        padding: 15px;
    }

    .card-title {
        font-size: 1.5rem;
        margin: 15px 0 10px;
    }

    .card-price {
        font-size: 1.25rem;
        color: #333;
    }

    .card-price del {
        color: #888;
        /* Серый цвет для старой цены */
    }

    .input-group {
        display: flex;
    }

    .input-group .form-control {
        border-radius: 0;
        /* Убираем закругление */
    }

    .input-group-append .btn {
        border-radius: 0;
        /* Убираем закругление */
    }

    .item-status {
        margin-top: 10px;
        font-size: 0.9em;
    }

    .alert {
        margin-top: 20px;
    }

    /* Стили для пагинации */
    .pagination {
        justify-content: center;
        /* Центрируем пагинацию */
    }

    .btn-primary {
        background-color: #007bff;
        /* Цвет кнопки */
        border-color: #007bff;
        padding: 10px 15px;
        /* Увеличенные отступы */
        font-size: 1rem;
        /* Размер шрифта для кнопки */
        color: white;
        /* Цвет текста кнопки */
        border-radius: 5px;
        /* Скругление кнопки */
        cursor: pointer;
        /* Курсор при наведении */
    }

    .btn-primary:hover {
        background-color: #0056b3;
        /* Цвет кнопки при наведении */
    }
</style>