@extends('layouts.app')

@section('content')
<div class="container-xl">
    <div class="row justify-content-center">
        <div class="admin__container">
            <div class="card card--margin-bottom">
                <div class="card-header card-header--bold">Current orders</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-1 column-title">ID</div>
                        <div class="col-sm-1 column-title">Customer</div>
                        <div class="col-sm-1 column-title">Total Price</div>
                        <div class="col-sm-1 column-title">Created at</div>
                        <div class="col-sm-6 column-title">Products in the order</div>
                        <div class="col-sm-2 column-title">Actions</div>
                    </div>
                    @foreach($ordersToProcess as $order)
                        <div class="admin__orders">
                            <div class="row">
                                <div class="col-sm-1 ">#{{$order->id}}</div>
                                <div class="col-sm-1 ">{{$order->user->name}}</div>
                                <div class="col-sm-1 ">{{$order->total_price}}</div>
                                <div class="col-sm-1 ">{{$order->created_at}}</div>
                                <div class="col-sm-6 ">
                                    @foreach($order->products as $product)
                                        <div class="row admin__order-product">
                                            <div class="col-sm-1 "><img class="admin__image--small" src="/images/uploads/{{$product->image}}"></div>
                                            <div class="col-sm-1 ">#{{$product->id}}</div>
                                            <div class="col-sm ">{{$product->name}}</div>
                                            <div class="col-sm-4 ">{{$product->price}}</div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-sm-2">
                                    <a class="action-buttons" href="{{route('admin.processOrder', ['order' => $order->id])}}">Process</a>
                                    <a class="action-buttons" href="{{route('admin.cancelOrder', ['order' => $order->id])}}">Cancel</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card card--margin-bottom">
                <div class="card-header card-header--bold">Last processed orders</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-1 column-title">ID</div>
                        <div class="col-sm-1 column-title">Customer</div>
                        <div class="col-sm-1 column-title">Total Price</div>
                        <div class="col-sm-1 column-title">Created at</div>
                        <div class="col-sm-6 column-title">Products in the order</div>
                    </div>
                    @foreach($ordersDone as $order)
                        <div class="admin__orders">
                            <div class="row">
                                <div class="col-sm-1 ">#{{$order->id}}</div>
                                <div class="col-sm-1 ">{{$order->user->name}}</div>
                                <div class="col-sm-1 ">{{$order->total_price}}</div>
                                <div class="col-sm-1 ">{{$order->created_at}}</div>
                                <div class="col-sm-6 ">
                                    @foreach($order->products as $product)
                                        <div class="row admin__order-product">
                                            <div class="col-sm-1 "><img class="admin__image--small" src="/images/uploads/{{$product->image}}"></div>
                                            <div class="col-sm-1 ">#{{$product->id}}</div>
                                            <div class="col-sm ">{{$product->name}}</div>
                                            <div class="col-sm-4 ">{{$product->price}}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="card card--margin-bottom">
                <div class="card-header card-header--bold">Last canceled orders</div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-1 column-title">ID</div>
                        <div class="col-sm-1 column-title">Customer</div>
                        <div class="col-sm-1 column-title">Total Price</div>
                        <div class="col-sm-1 column-title">Created at</div>
                        <div class="col-sm-6 column-title">Products in the order</div>
                    </div>
                    @foreach($ordersCanceled as $order)
                        <div class="admin__orders">
                            <div class="row">
                                <div class="col-sm-1 ">#{{$order->id}}</div>
                                <div class="col-sm-1 ">{{$order->user->name}}</div>
                                <div class="col-sm-1 ">{{$order->total_price}}</div>
                                <div class="col-sm-1 ">{{$order->created_at}}</div>
                                <div class="col-sm-6 ">
                                    @foreach($order->products as $product)
                                        <div class="row admin__order-product">
                                            <div class="col-sm-1 "><img class="admin__image--small" src="/images/uploads/{{$product->image}}"></div>
                                            <div class="col-sm-1 ">#{{$product->id}}</div>
                                            <div class="col-sm ">{{$product->name}}</div>
                                            <div class="col-sm-4 ">{{$product->price}}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
