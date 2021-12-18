@extends('adminlte::page')

@section('content_header')
<h1 class="m-0 text-dark">CATS WorkSpaces</h1>

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit User</h3>
                    <div class="card-tools">
                        <a class="btn btn-success" href="{{ route('users.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">

                    <form action="{{ route('users.update',$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">

                                <input name="action" type="hidden" value="PWD">
                                    <strong>Name:</strong>{{ $user->name }}<BR>
                                    <input name="name" type="hidden" value="{{ $user->name }}">
                                    <strong>Email:</strong>{{ $user->email }}<BR>
                                    <input name="email" type="hidden" value="{{ $user->email }}">
                                    <strong>Password:</strong>
                                    <input type="password" name="password" value="" class="form-control"
                                        placeholder="type a new password">

                                    <strong>Level:</strong><BR>{{ $user->level }}<BR>
                                    <input name="level" type="hidden" value="{{ $user->level }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Save New Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@stop

@section('css')

@stop

@section('js')

@stop