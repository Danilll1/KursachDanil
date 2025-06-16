<link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400;700&display=swap" rel="stylesheet">
@extends('layouts.layout')

@section('title')
@parent :: Оформление заказа
@endsection

<div class="col-md-12 d-flex justify-content-center" style="margin-top: 100px;">
    <!-- <h1>Оформление заказа</h1> -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>

@if(!empty(session('cart')))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12 cart-table">
                <div class="table-responsive">
                    <table class="table table-hover" id="table1">
                        <tbody>
                            @if(session('cart') && count(session('cart')) > 0)
                                @foreach(session('cart') as $item)

                                    <div class="product-info">
                                        <a href="{{ route('products.show', ['slug' => $item['slug']]) }}"
                                            style=" text-decoration: none;">{{ $item['title'] }}</a>
                                    </div>

                                    <a href="{{ route('products.show', ['slug' => $item['slug']]) }}">
                                        <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" class="product-image">
                                    </a>

                                    <div class="product-info mt-3">
                                        <div class="data">ЦЕНА:
                                            <p class="price">@price_format($item['price']) $</p>
                                        </div>

                                        <div class="data">КОЛИЧЕСТВО:
                                            <p class="price">{{ $item['qty'] }}</p>
                                        </div>
                                    </div>

                                @endforeach
                                <div class="product-info">
                                    <div class="data">ИТОГО:
                                        <p class="price">{{ session('cart_qty') }}</p>
                                    </div>

                                    <div class="data">НА ОБЩУЮ СУММУ:
                                        <p class="price">@price_format(session('cart_total')) $</p>
                                    </div>
                                </div>

                            @else
                                <div class="product-info">
                                    <p colspan="5" align="center">
                                    <h4>Корзина пуста</h4>
                                    </p>
                                </div>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="col-md-4 col-12" style="margin-top: 68px;">
                @if(session('cart') && count(session('cart')) > 0)
                    <form method="post" action="{{ route('cart.checkout') }}">
                        @csrf
                        <div class="form-group">
                            <!-- <label for="name">Имя</label> -->
                            <input type="text" class="form-control" id="name" name="name" placeholder="Имя" required>
                        </div>

                        <div class="form-group">
                            <!-- <label for="email">Почта</label> -->
                            <input type="email" class="form-control" id="email" name="email" placeholder="Почта" required>
                        </div>

                        <div class="form-group">
                            <!-- <label for="phone">Телефон</label> -->
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Телефон" required>
                        </div>

                        <div class="form-group">
                            <!-- <label for="address">Адрес</label> -->
                            <input type="text" class="form-control" id="address" name="address" placeholder="Адрес" required>
                        </div>

                        <div class="form-group">
                            <!-- <label for="note">Пожелание</label> -->
                            <textarea class="form-control" id="note" name="note" rows="8">Пожелание</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary Button__StyledButton" id="orderButton">Заказать</button>

                        <script>
                            document.getElementById('orderButton').addEventListener('click', function () {
                                // Здесь вы можете выполнять любые действия, например, отправку формы

                                // Задержка 5 секунд (5000 миллисекунд)
                                setTimeout(function () {
                                    // Перенаправление на нужный маршрут
                                    window.location.href = "{{ route('home') }}";
                                }, 5000);
                            });
                        </script>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <style>
        .cart-table {
            margin-bottom: 20px;
        }

        .product-image {
            max-width: 100%;
            /* Увеличьте размер изображения */
            height: auto;
        }

        .product-info {
            text-align: left;
            /* Выравнивание текста под изображением */
            display: flex;
            flex-direction: column;
        }

        .product-info a {
            font-family: 'Tenor Sans', sans-serif;
            font-size: 49px;
            color: #005154 !important;
        }

        .data {
            display: flex;
            justify-items: center;
            font-family: 'Golos Text', sans-serif;
            font-size: 18px;
        }

        .data p {
            font-family: 'Golos Text', sans-serif;
            color: #005154;
        }

        .price {
            margin-left: 10px;
        }

        @media (max-width: 768px) {
            .cart-table {
                margin-bottom: 15px;
            }

            .col-md-4 {
                margin-top: 10px !important;
            }
        }

        .form-group input {
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


        .form-group input:focus {
            outline: none;
            /* Убирает стандартное выделение */
            box-shadow: none;
            /* Убирает тень, если она есть */
        }

        .form-group textarea:focus {
            outline: none;
            /* Убирает стандартное выделение */
            box-shadow: none;
            /* Убирает тень, если она есть */
            border: 1px solid #ccc;
        }

        .Button__StyledButton {
            margin-top: 16px;
            background-color: #005154 !important;
            border: none !important;
            width: 100%;
        }

        .Button__StyledButton:hover {
            background-color: #00b2a1 !important;
            /* Цвет фона при наведении */
            color: #000;
            /* Цвет текста */
            border: none !important;
        }
    </style>

@endif
</div>