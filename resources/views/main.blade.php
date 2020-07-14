<!DOCTYPE html>
<html lang="ru">
<head>
    <title>{{$title}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/css/libs.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/media.css">
</head>
<body>
<div class="main-wrapper">
    <header class="main-header">
        <div class="logotype-container"><a href="/" class="logotype-link"><img src="/img/logo.png" alt="Логотип"></a></div>
        <nav class="main-navigation">
            <ul class="nav-list">
                <li class="nav-list__item"><a href="/" class="nav-list__item__link">Главная</a></li>
                <li class="nav-list__item"><a href="/orders" class="nav-list__item__link">Мои заказы</a></li>
                <li class="nav-list__item"><a href="/news" class="nav-list__item__link">Новости</a></li>
                <li class="nav-list__item"><a href="/about" class="nav-list__item__link">О компании</a></li>
            </ul>
        </nav>
        <div class="header-contact">
            <div class="header-contact__phone"><a href="#" class="header-contact__phone-link">Телефон: 33-333-33</a></div>
        </div>
        <div class="header-container">
            <div class="payment-container">
                <div class="payment-basket__status">
                    @auth
                    <div class="payment-basket__status__icon-block"><a href="/cart" class="payment-basket__status__icon-block__link"><i class="fa fa-shopping-basket"></i></a></div>
                    <div class="payment-basket__status__basket"><span class="payment-basket__status__basket-value">{{Auth::user()->currentProductsCount()}}</span><span class="payment-basket__status__basket-value-descr">товаров</span></div>
                    @endauth
                </div>
            </div>
            @guest
                <div class="authorization-block"><a href="/register" class="authorization-block__link">Регистрация</a><a href="/login" class="authorization-block__link">Войти</a></div>
            @endguest
            @auth
                <div class="authorization-block"><span class="authorization-block__link font-weight--bold">{{ Auth::user()->name }}</span> <a href="{{ route('logout') }}" class="authorization-block__logout"
                                                                                                                                              onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Выйти
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            @endauth
        </div>
    </header>
    <div class="middle">
        <div class="sidebar">
            <div class="sidebar-item">
                <div class="sidebar-item__title">Категории</div>
                <div class="sidebar-item__content">
                    <ul class="sidebar-category">
                        @foreach($categories as $category)
                        <li class="sidebar-category__item"><a href="/category/{{$category->id}}" class="sidebar-category__item__link">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="sidebar-item">
                <div class="sidebar-item__title">Последние новости</div>
                <div class="sidebar-item__content">
                    <div class="sidebar-news">
                        @foreach($newsMain as $news)
                        <div class="sidebar-news__item">
                            <div class="sidebar-news__item__preview-news"><img src="/images/news/{{$news->image}}" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                            <div class="sidebar-news__item__title-news"><a href="/newsview/{{$news->id}}" class="sidebar-news__item__title-news__link">{{$news->title}}</a></div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="content-top">
                <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
                <div class="slider"><img src="/img/slider.png" alt="Image" class="image-main"></div>
            </div>

            @yield('content')

            <div class="content-bottom"></div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer__footer-content">
            <div class="random-product-container">
                <div class="random-product-container__head">Случайный товар</div>
                <div class="random-product-container__content">
                    <div class="item-product">
                        <div class="item-product__title-product"><a href="#" class="item-product__title-product__link">{{$randomProduct->name}}</a></div>
                        <div class="item-product__thumbnail"><a href="/product/{{$randomProduct->id}}" class="item-product__thumbnail__link"><img src="/images/uploads/{{$randomProduct->image}}" alt="Preview-image" class="item-product__thumbnail__link__img"></a></div>
                        <div class="item-product__description">
                            <div class="item-product__description__products-price"><span class="products-price">{{$randomProduct->price}} руб</span></div>
                            <div class="item-product__description__btn-block"><a href="/buy/{{$randomProduct->id}}" class="btn btn-blue">Купить</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__footer-content__main-content">
                <p>
                    Интернет-магазин компьютерных игр ГЕЙМСМАРКЕТ - это
                    онлайн-магазин игр для геймеров, существующий на рынке уже 5 лет.
                    У нас широкий спектр лицензионных игр на компьютер, ключей для игр - для активации
                    и авторизации, а также карты оплаты (game-card, time-card, игровые валюты и т.д.),
                    коды продления и многое друго. Также здесь всегда можно узнать последние новости
                    из области онлайн-игр для PC. На сайте предоставлены самые востребованные и
                    актуальные товары MMORPG, приобретение которых здесь максимально удобно и,
                    что немаловажно, выгодно!
                </p>
            </div>
        </div>
        <div class="footer__social-block">
            <ul class="social-block__list bcg-social">
                <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-facebook"></i></a></li>
                <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-twitter"></i></a></li>
                <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
    </footer>
</div>
<script src="/js/main.js"></script>
</body>
</html>
