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
                        <p>15 стран доставки</p>
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
    /* Исходные стили (полностью сохранены) */
    .card-product {
        margin: 120px auto 0 auto;
        max-width: 1400px;
        width: 90%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }
    
    .title-product {
        font-size: 49px !important;
        color: #005154 !important;
        margin-bottom: 15px !important;
        text-align: left !important;
        font-family: 'Tenor Sans', sans-serif !important;
        line-height: normal !important;
        font-weight: normal !important;
        text-transform: none !important;
        letter-spacing: normal !important;
    }
    
    .product-image {
        max-width: 600px;
        min-width: 600px;
        height: auto;
        border-radius: 4px;
        width: 80%;
        padding-right: 10px;
    }
    
    .product-details {
        display: flex;
    }
    
    .product-list {
        list-style: none;
        padding: 0;
    }
    
    .product-list li {
        margin-bottom: 10px;
        font-size: 18px;
    }
    
    .data-yahts {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin: 15px 0;
    }
    
    .product-desc {
        margin-top: -35px;
        padding: 0;
        font-size: 14px !important;
        color: #666;
        white-space: pre-line;
    }

    /* Только изменение расположения блоков */
    @media (max-width: 1350px) {
        .product-details {
            flex-direction: column; /* Картинка сверху, текст снизу */
        }
        
        .product-image {
            min-width: 100% !important; /* Растягиваем на всю ширину */
            max-width: 100% !important;
            width: 100% !important;
            padding-right: 0 !important;
            margin-bottom: 20px; /* Отступ от текста */
        }
        
        .product-desc {
            margin-top: 0; /* Сбрасываем отрицательный отступ */
        }
    }
</style>

