@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="admin__container">
                <div class="card card--margin-bottom">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm">
                                Admin Emails
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Added at</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($emails as $email)
                                <tr>
                                    <td>{{$email->id}}</td>
                                    <td>{{$email->email}}</td>
                                    <td>{{$email->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.emails.delete', ['email' => $email->email])}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Add new</div>
                    <div class="card-body">
                        <form action="{{route('admin.emails.add')}}" method="post">
                            @csrf
                            <table class="table table-bordered">
                                <tr>
                                    <td>Email</td>
                                    <td>
                                        <input type="text" name="email">
                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger">{{$errors->first('email')}}</div>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            <input type="submit" value="Add">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
