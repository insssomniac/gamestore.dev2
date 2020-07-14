@extends('main')

@section('content')

    <div class="content-middle">
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">Новости</div>
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
            <div class="news-list__container">
                @foreach($news as $story)
                <div class="news-list__item">
                    <div class="news-list__item__thumbnail"><img src="/images/news/{{$story->image}}"></div>
                    <div class="news-list__item__content">
                        <div class="news-list__item__content__news-title">{{$story->title}}</div>
                        <div class="news-list__item__content__news-date">{{$story->created_at}}</div>
                        <div class="news-list__item__content__news-content">
                            {{\Illuminate\Support\Str::limit($story->text, 140)}}
                        </div>
                    </div>
                    <div class="news-list__item__content__news-btn-wrap"><a href="/newsview/{{$story->id}}" class="btn btn-brown">Подробнее</a></div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="content-footer__container">

            {{$news->links()}}

        </div>
    </div>

@endsection
