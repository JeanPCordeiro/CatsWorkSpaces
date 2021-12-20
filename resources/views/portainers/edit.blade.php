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
                    <h3 class="card-title">Paramètres Serveur</h3>
                    <div class="card-tools">
                        <a class="btn btn-success" href="{{ route('portainers.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">

                    <form action="{{ route('portainers.update',$portainer->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">

                                    @if (Auth::user()->level == 3)
                                    <input name="action" type="hidden" value="EDIT">
                                    <strong>Url:</strong>
                                    <input type="text" name="url" value="{{ $portainer->url }}" class="form-control"
                                        placeholder="url">
                                    <strong>Utilisateur:</strong>
                                    <input type="text" name="usr" value="{{ $portainer->usr }}" class="form-control"
                                        placeholder="utilisateur">
                                    <strong>Mot de Passe:</strong>
                                    <input type="password" name="pwd" value="{{ $portainer->pwd }}" class="form-control" placeholder="">
                                    <strong>EndPoint:</strong>
                                    <input type="text" name="end" value="{{ $portainer->end }}" class="form-control" placeholder="2">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>

                @endif

            </div>
            </form>
        </div>
    </div>
</div>



@endsection

@stop

@section('css')

@stop

@section('js')

@stop