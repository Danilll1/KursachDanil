<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    @vite('resources/css/main.css')

</head>

<body>

    @include('layouts.navbar')

    <style>
        .wrapper {
            padding-top: 60px;
        }
    </style>

    <div class="wrapper">
        @yield('carousel')
        @yield('search')

        <div class="product-container" @yield('content') </div>
        </div>
        @yield('feedback')
        @yield('info-buy')
        @yield('location')
        @yield('footer')

        <!-- Modal -->
        <div class="modal fade cart-modal" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title" id="exampleModalLabel">КОРЗИНА</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>

        <!--Alert-->

        <div class="notification d-none" id="customNotification">
            Товар добавлен в корзину!
        </div>
        <style>
            .notification {
                position: fixed;
                top: 20%;
                left: 82%;
                transform: translate(-50%, -50%);
                background-color: rgba(255, 255, 255, 0.9);
                border: 1px solid #007bff;
                border-radius: 5px;
                padding: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                z-index: 9999;

            }
        </style>

        <!-- Preloader -->
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>

        <style>
            body {
                overflow: hidden;
            }


            /* Preloader */

            #preloader {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #fff;
                /* change if the mask should have another color then white */
                z-index: 99;
                /* makes sure it stays on top */
            }

            #status {
                width: 200px;
                height: 200px;
                position: absolute;
                left: 50%;
                /* centers the loading animation horizontally one the screen */
                top: 50%;
                /* centers the loading animation vertically one the screen */
                background-image: url(https://raw.githubusercontent.com/niklausgerber/PreLoadMe/master/img/status.gif);
                /* path to your loading animation */
                background-repeat: no-repeat;
                background-position: center;
                margin: -100px 0 0 -100px;
                /* is width and height divided by two */
            }

            .modal-title {
                font-family: 'Golos Text', sans-serif;
                font-size: 24px;
            }

            .modal-footer {
                display: flex;
                justify-content: space-between;
            }

            .Button__StyledButtonn {
                background-color: #005154 !important;
                border: none !important;
            }

            .Button__StyledButtonn:hover {
                background-color: #00b2a1 !important;
                /* Цвет фона при наведении */
                color: #000;
                /* Цвет текста */
                border: none !important;
            }

            .close:active {
                border: none !important;
            }
        </style>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        @vite('resources/js/main.js')
        <!-- <script src="{{asset('assets\front\js\main.js')}}"></script> -->
</body>

</html>