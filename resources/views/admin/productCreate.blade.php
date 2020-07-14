@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="admin__container">
                <div class="card">
                    <div class="card-header">Create new product</div>
                    <div class="card-body">

                        <form enctype="multipart/form-data" action="{{route('admin.products.add')}}" method="post">
                            @csrf
                            <table class="table table-bordered admin__table">
                                <tr>
                                    <td>Name</td>
                                    <td>
                                        <input type="text" class="admin__text" name="name">
                                        @if ($errors->has('name'))
                                            <div class="alert alert-danger">{{$errors->first('name')}}</div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>
                                        <textarea class="admin__textarea" name="description"></textarea>
                                        @if ($errors->has('description'))
                                            <div class="alert alert-danger">{{$errors->first('description')}}</div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>
                                        <input type="text" class="admin__text" name="price">
                                        @if ($errors->has('price'))
                                            <div class="alert alert-danger">{{$errors->first('price')}}</div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>
                                        <select name="category_id">
                                            <option disabled>Choose category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
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
