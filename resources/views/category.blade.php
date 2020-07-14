@extends('main')

@section('content')

    <div class="content-middle">
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">Игры в разделе {{$categoryName}}</div>
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
        <div class="content-main__container">
            <div class="products-category__list">
                @foreach($categoryProducts as $product)
                <div class="products-category__list__item">
                    <div class="products-category__list__item__title-product"><a href="#">{{$product->name}}</a></div>
                    <div class="products-category__list__item__thumbnail"><a href="/product/{{$product->id}}" class="products-category__list__item__thumbnail__link"><img src="/images/uploads/{{$product->image}}" alt="{{$product->name}}-Preview-image"></a></div>
                    <div class="products-category__list__item__description"><span class="products-price">{{$product->price}} руб.</span><a href="/buy/{{$product->id}}" class="btn btn-blue">Купить</a></div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="content-footer__container">
            {{$categoryProducts->links()}}
        </div>
    </div>

@endsection
