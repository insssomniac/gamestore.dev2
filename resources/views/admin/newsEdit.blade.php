@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="admin__container">
                <div class="card">
                    <div class="card-header">Edit news</div>
                    <div class="card-body">

                        <form enctype="multipart/form-data" action="{{route('admin.news.update', ['id' => $news->id])}}" method="post">
                            @csrf
                            <table class="table table-bordered admin__table">
                                <tr>
                                    <td>Title</td>
                                    <td>
                                        <input type="text" class="admin__text" name="title" value="{{$news->title}}">
                                        @if ($errors->has('title'))
                                            <div class="alert alert-danger">{{$errors->first('title')}}</div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Text</td>
                                    <td>
                                        <textarea class="admin__textarea" name="text">{{$news->text}}</textarea>
                                        @if ($errors->has('text'))
                                            <div class="alert alert-danger">{{$errors->first('text')}}</div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td>
                                        <input type="file" name="image">
                                    </td>
                                </tr>
                            </table>
                            <input type="submit" value="Save">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
