@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="admin__container">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm">
                                Products
                            </div>
                            <div class="col-sm-1">
                                <a href="{{route('admin.news.create')}}">Create new</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-3 column-title">Image</div>
                            <div class="col-sm-1 column-title">ID</div>
                            <div class="col-sm-2 column-title">Title</div>
                            <div class="col-sm-5 column-title">Text</div>
                            <div class="col-sm-1 column-title">Actions</div>

                            @foreach($news as $story)
                                <div class="row admin__news-card">
                                    <div class="col-sm-3"><img class="admin__image" src="/images/news/{{$story->image}}" alt="{{$story->title}}"></div>
                                    <div class="col-sm-1">{{$story->id}}</div>
                                    <div class="col-sm-2">{{$story->title}}</div>
                                    <div class="col-sm-5">{{$story->text}}</div>
                                    <div class="col-sm-1">
                                        <a class="action-buttons" href="{{route('admin.news.edit', ['id' => $story->id])}}">Edit</a>
                                        <a class="action-buttons" href="{{route('admin.news.delete', ['id' => $story->id])}}">Delete</a>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
