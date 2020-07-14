@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="admin__container">
                <div class="card">
                    <div class="card-header">Edit Category</div>
                    <div class="card-body">

                        <form action="{{route('admin.categories.update', ['id' => $category->id])}}" method="post">
                            @csrf
                            <table class="table table-bordered">
                                <tr>
                                    <td>Name</td>
                                    <td>
                                        <input type="text" name="name" value="{{$category->name}}">
                                        @if ($errors->has('name'))
                                            <div class="alert alert-danger">{{$errors->first('name')}}</div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>
                                        <input type="text" name="description" value="{{$category->description}}">
                                        @if ($errors->has('description'))
                                            <div class="alert alert-danger">{{$errors->first('description')}}</div>
                                        @endif
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
