<div class="header">
    <div class="logo">
        <img src="{{ asset('storage/images/arcon-logo.svg') }}" class="svg" alt="">
    </div>

    <div class="nav">
        <ul>
            <li>
                <a class="nav-link" href="{{ route('home') }}">ГЛАВНАЯ</a>
            </li>
            
            <li>
                <a href="{{ route('admin.create') }}" class="nav-link">ДОБАВИТЬ НОВУЮ ЯХТУ</a>
            </li>

            <li>
                <a class="nav-link" href="{{ route('admin') }}">ПАНЕЛЬ АДМИНИСТРАТОРА</a>
            </li>
            
        </ul>
    </div>

    <div class="user-info">
        @if(Auth::check())
            <h>{{ Auth::user()->name }}</h>
            @auth
            @if(Auth::check() || Auth::user()->is_admin == 1)
                <button type="button" class="btn cart-button" onclick="getCart('{{ route('cart.show') }}')">
                    Корзина <span class="badge badge-light mini-cart-qty">{{ session('cart_qty') ?? 0 }}</span>
                </button>
            @endif
            @endauth
            <a href="{{ route('logout') }}" class="btn btn-user">
                Выйти
            </a>
        @else
            <h>Гость</h>
            <div class="btn-group">
                <a href="{{ route('login') }}" class="btn btn-user">
                    Войти
                </a>
                <a href="{{ route('register.create') }}" class="btn btn-user">
                    Регистрация
                </a>
            </div>
        @endif

        <div class="burger">
            <span></span>
        </div>

    </div>
</div>

<style>
    .open {
        display: flex !important;
    }
    .header {
        display: flex;
        justify-content: space-between; /* Distribute space between logo, nav, and user-info */
        position: fixed;
        top: 0; /* Привязка к верхней части экрана */
        width: 100%; /* Ширина на всю страницу */
        background-color: #fff; /* Цвет фона меню */
        z-index: 1000; /* Убедитесь, что меню выше других элементов */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Тень для эффекта */
        align-items: center;
        height: 100px;
        border-bottom: 2px solid #ccc;
        padding: 0 100px;
    }

.logo {
    display: flex;
    align-items: center;
    width: 134px;
    height: 98px;
    margin: 0;
    position: relative; /* Allow positioning of the ::after pseudo-element */
}

.logo::after {
    content: '';
    display: block;
    height: 2px; /* Height of the underline */
    background: #000; /* Color of the underline */
    position: absolute;
    left: 0;
    right: 0;
    bottom: -2px; /* Positioning the line below the text */
    width: 0; /* Initially, zero width */
    transition: width 0.3s ease; /* Smooth transition for width */
}

.logo:hover::after {
    width: 100%; /* Underline expands to 100% on hover */
    color: ;
}


.nav {
    display: flex;
    align-items: center;
    font-family: 'Golos Text', sans-serif;
    font-size: 14px;
    color: #000;
    margin: 0;
    /* Removed justify-content: center; and text-align: center; */
}

.nav ul {
    width: 100%;
    list-style: none;
    display: flex;
    justify-content: center; /* Centers items within the nav */
    padding: 0;
    margin: 0;
}

.nav li {
    margin: 0 10px; /* Adjust spacing as needed */
}

.nav a {
    color: #000;
    text-decoration: none; /* Remove default underline */
    position: relative; /* Allow positioning of the ::after pseudo-element */
}
.nav a::after {
    content: '';
    display: block;
    height: 2px; /* Height of the underline */
    background: #000; /* Color of the underline */
    position: absolute;
    left: 0;
    right: 0;
    bottom: -32px; /* Positioning the line below the text */
    width: 0; /* Initially, zero width */
    transition: width 0.3s ease; /* Smooth transition for width */
}

.nav a:hover::after {
    width: 100%; /* Underline expands to 100% on hover */
    color: #ccc;
}

.user-info {
    display: flex;
    align-items: center;
    font-family: 'Tenor Sans', sans-serif;
    font-size: 20px;
    text-align: right; /* Align text within user-info to the right */
    margin: 0; /*Remove default margins*/
}
.user-info h {
    color: #005154;
}
.btn {
    font-size: 16px;
}

.burger {
    display: none;
    cursor: pointer;
    position: relative;
    z-index: 50;
    align-items: center;
    justify-content: flex-end;
    width: 30px;
    height: 30px;
}

.burger span {
    height: 2px;
    width: 80%;
    transform: scale(1);
    background-color: #000;
    transition: 0.5s ease;
}

.burger::before, .burger::after {
    content: '';
    position: absolute;
    height: 2px;
    width: 100%;
    background-color: #000;
    transform: all 0.3s ease 0.5s;
    transition: 0.5s ease;
}

.burger::before {
    top: 0;
}
.burger::after {
    bottom: 0;
}

.burger.active span { transform: scale(0); }
.burger.active::before {
    top: 50%;
    transform: rotate(-45deg) translate(0, -50%);
}
.burger.active::after {
    bottom: 50%;
    transform: rotate(45deg) translate(0, 50%);
}

@media (max-width: 1350px) {
    .nav {
        font-size: 10px;
    }

    .user-info {
        font-size: 16px;
    }
    .nav a::after {
        bottom: -35px; /* Positioning the line below the text */
    }
}

@media (max-width: 1200px) {
    .logo {
        display: none;
    }

}

@media (max-width: 1031px) {
    .header {
        display: flex;
        justify-content: center;
        flex-direction: column; /* Stack nav items vertically */
        padding-bottom: 10px;
        height: 110px;
    }
    .logo {
        display: flex;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .burger {
        display: flex;
    }

    .nav {
        display: none;
        flex-direction: column; /* Stack nav items vertically */
        position: fixed;
        height: 100%;
        width: fit-content;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 50;
        overflow: auto;
        padding: 50px 40px;
        background-color: #fff;
        animation: burgerAnimation 0.4s;
        font-size: 14px;
    }
    .nav a::after {
        bottom: -15px; /* Positioning the line below the text */
    }

        .user-info {
        display: flex;
        align-items: center;
        font-family: 'Tenor Sans', sans-serif;
        font-size: 20px;
        text-align: right; /* Align text within user-info to the right */
        margin: 0; /*Remove default margins*/
    }

    /* .badge {
        display: none;
    } */
    .nav ul {
        flex-direction: column;
        row-gap: 30px;
    }
    /* .nav li {
        margin-bottom: 10px;
    }
    .user-info {
        text-align: left;
        margin-top: 10px;
    } */

    @keyframes burgerAnimation {
        from {opacity: 0;}
        to {opacity: 1;}
    }
}
</style>

<script>
    document.querySelector('.burger').addEventListener('click', function(){
        this.classList.toggle('active');
        document.querySelector('.nav').classList.toggle('open');
    })
</script>