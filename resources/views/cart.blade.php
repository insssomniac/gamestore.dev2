@extends('main')

@section('content')

    <div class="content-middle">
    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Корзина</div>
        </div>
        <div class="content-head__search-block">
            <div class="search-container">
                <form class="search-container__form">
                    <input type="text" class="search-container__form__input">
                    <button class="search-container__form__btn">search</button>
                </form>
            </div>
        </div>
    </div>
    <div class="cart-product-list">
        @if($order)
            @foreach($products as $product)
            <div class="cart-product-list__item">
                <div class="cart-product__item__product-photo"><img src="/images/uploads/{{$product->image}}" class="cart-product__item__product-photo__image"></div>
                <div class="cart-product__item__product-name">
                    <div class="cart-product__item__product-name__content"><a href="/product/{{$product->id}}">{{$product->name}}</a></div>
                </div>
                <div class="cart-product__item__cart-date">
                    <div class="cart-product__item__cart-date__content">{{$order->created_at}}</div>
                </div>
                <div class="cart-product__item__product-price"><span class="product-price__value">{{$product->price}}</span></div>
            </div>
            @endforeach
        @else
                Здесь пока ничего нет, почему бы не заказать что-нибудь ;)
        @endif
        @if($order)
            <div class="cart-product-list__result-item">
                <div class="cart-product-list__result-item__text">Итого</div>
                <div class="cart-product-list__result-item__value">{{$order->total_price}} рублей</div>
            </div>
        @endif
    </div>
    <div class="content-footer__container">
        @if($order)
            <div class="btn-buy-wrap"><a href="{{route('cart.submit')}}" class="btn-buy-wrap__btn-link">Подтвердить заказ</a></div>
        @endif
    </div>
</div>

@endsection
