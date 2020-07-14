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
                                <a href="{{route('admin.products.create')}}">Create new</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                                <div class="col-sm-3 column-title">Image</div>
                                <div class="col-sm-1 column-title">ID</div>
                                <div class="col-sm-1 column-title">Name</div>
                                <div class="col-sm-4 column-title">Description</div>
                                <div class="col-sm-1 column-title">Price</div>
                                <div class="col-sm-1 column-title">Category</div>
                                <div class="col-sm-1 column-title">Actions</div>

                            @foreach($products as $product)
                                <div class="row admin__product-card">
                                    <div class="col-sm-3"><img class="admin__image" src="/images/uploads/{{$product->image}}" alt="{{$product->name}}"></div>
                                    <div class="col-sm-1">{{$product->id}}</div>
                                    <div class="col-sm-1">{{$product->name}}</div>
                                    <div class="col-sm-4">{{$product->description}}</div>
                                    <div class="col-sm-1">{{$product->price}}</div>
                                    <div class="col-sm-1">{{$product->category->name}}</div>
                                    <div class="col-sm-1">
                                        <a class="action-buttons" href="{{route('admin.products.edit', ['id' => $product->id])}}">Edit</a>
                                        <a class="action-buttons" href="{{route('admin.products.delete', ['id' => $product->id])}}">Delete</a>
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
