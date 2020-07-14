@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="admin__container">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm">
                                Categories
                            </div>
                            <div class="col-sm-1">
                                <a href="{{route('admin.categories.create')}}">Create new</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>
                                        <a href="{{route('admin.categories.edit', ['id' => $category->id])}}">Edit</a>
                                        <a href="{{route('admin.categories.delete', ['id' => $category->id])}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
