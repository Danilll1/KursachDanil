@extends('layouts.auth')

@section('content')
    <div class="card-product">
        <p class="title-product">О компании «ArconYachts»</p>
        <div class="product-details" style="gap: 20px">
            <div class="product-image-container">
                <img src="{{ asset('storage/images/flot.jpg')}}" alt="Наш флот" class="product-image">
            </div>

            <ul class="product-list font_2">
                <li><strong>Наша миссия:</strong> Делать мечты о море реальностью</li>
                <li><i class="fas fa-anchor status-item"></i> Работаем на рынке с 2012 года</li>

                <li>
                    <div class="data-yahts font_2">
                        <p>100+ проданных яхт | </p>
                        <p>30+ брендов в каталоге | </p>
                        <p>15 стран доставки |</p>
                    </div>
                </li>
                <li>
                    <div class="product-desc font_2" style="padding: 10px 0;">
                        <p>Мы объединяем лучшие яхты мировых брендов и предлагаем клиентам полный цикл услуг — от выбора
                            модели до организации первого круиза. Наши специалисты с капитанами помогут подобрать идеальное
                            судно под ваши задачи.</p>
                        <p>Наш флот включает эксклюзивные модели от ведущих производителей: Ferretti, Azimut, Sunseeker и
                            Princess. Мы лично тестируем каждую яхту перед тем, как включить ее в наш каталог.</p>
                        <p>Все яхты проходят 3-этапную проверку: техническое состояние, безопасность и комфорт. Мы
                            гарантируем полную юридическую чистоту всех документов и прозрачность сделки.</p>
                </li>
            </ul>
        </div>
    </div>
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
                    <ul class="social-links"
                        style="list-style-type: none; padding: 0; text-align: right; font-family: 'Tenor Sans', sans-serif;">
                        <li>
                            <h5 style="font-size: 26px; font-family: 'Tenor Sans', sans-serif;">Социальные сети</h5>
                        </li>
                        <li style=""><a href="https://www.instagram.com/arconyachtsmonaco/"><i class="fab fa-instagram"></i>
                                Instagram</a></li>
                        <li style=""><a href="https://www.facebook.com/arconyachts/"><i class="fab fa-facebook-f"></i>
                                Facebook</a></li>
                        <li style=""><a href="https://www.linkedin.com/company/arcon-yachts/"><i class="fab fa-twitter"></i>
                                Twitter</a></li>
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
            margin-top: 20px;
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

<style>
    .card-product {
        margin: 120px auto 0 auto;
        /* Автоматические отступы по бокам для центрирования */
        max-width: 1400px;
        width: 90%;
        /* Добавьте это для адаптивности */
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .title-product {
        font-size: 49px !important;
        /* Размер заголовка */
        color: #005154;
        /* Цвет заголовка */
        margin-bottom: 15px;
        /* Отступ снизу */
        text-align: left;
        /* Выравнивание заголовка по центру */
        font-family: 'Tenor Sans', sans-serif;
    }

    .product-image-container {
        text-align: left;
        /* Центрирование изображения */
        margin-bottom: 15px;
        /* Отступ снизу для изображения */
    }

    .product-image {
        max-width: 600px;
        /* Ширина изображения максимум 100% */
        min-width: 600px;
        height: auto;
        /* Автоматическая высота для сохранения пропорций */
        border-radius: 4px;
        /* Скругление углов изображения */
        width: 80%;
        /* Увеличиваем размер изображения до 80% */
        padding-right: 10px;
    }

    .product-details {
        display: flex;
        /* Flexbox для размещения деталей */
        /* flex-direction: column; */
    }

    /* .status-item {
    color: #00b2a1 !important;
} */

    .product-list {
        list-style: none;
        /* Убираем маркеры списка */
        padding: 0;
        /* Убираем отступы */
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
        margin-bottom: 10px;
        /* Отступ между пунктами списка */
        font-size: 18px;
    }

    .card-price {
        font-weight: bold;
        /* Жирный шрифт для цены */
        color: #28a745;
        /* Цвет для цены */
    }

    .add-to-cart {
        display: flex;
        /* Flexbox для управления расположением компонентов */
        align-items: center;
        /* Выравнивание по центру */
        margin-top: 15px;
        /* Отступ сверху */
    }

    .quantity-input {
        width: 60px;
        /* Ширина поля ввода */
        margin-right: 10px;
        /* Отступ справа от поля ввода */
        padding: 5px;
        /* Отступ внутри поля ввода */
        border: 1px solid #ccc;
        /* Стиль границы поля ввода */
        border-radius: 4px;
        /* Скругление углов поля ввода */
    }

    .add-to-cart-button {
        color: white;
        /* Цвет текста кнопки */
        border: none;
        /* Убираем рамку */
        padding: 10px 20px;
        /* Отступы внутри кнопки */
        cursor: pointer;
        /* Курсор как указатель */
        transition: background-color 0.3s;
        /* Плавный переход цвета */
        font-size: 18px;
    }

    .product-desc {
        margin-top: -35px;
        padding: 0;
        font-size: 14px !important;
        /* Размер шрифта для описания */
        color: #666;
        /* Цвет описания */
        white-space: pre-line;
    }

    /* Адаптивность для мобильных устройств */
    @media (max-width: 768px) {
        .product-title {
            font-size: 20px;
            /* Уменьшаем размер заголовка для мобильных */
        }

        .product-list li {
            font-size: 14px;
            /* Уменьшаем размер шрифта списка */
        }

        .product-image {
            width: 100%;
            /* Увеличиваем изображение на мобильных до 100% */
        }

        .quantity-input {
            width: 45px;
            /* Уменьшаем ширину поля ввода */
        }
    }

    @media (max-width: 480px) {
        .product-card {
            padding: 10px;
            /* Уменьшаем отступы в карточке */
        }

        .product-title {
            font-size: 18px;
            /* Уменьшаем размер заголовка для маленьких экранов */
        }

        .card-price {
            font-size: 16px;
            /* Уменьшаем размер шрифта цены */
        }

        .add-to-cart-button {
            padding: 8px 15px;
            /* Уменьшаем размеры кнопок */
        }
    }
</style>