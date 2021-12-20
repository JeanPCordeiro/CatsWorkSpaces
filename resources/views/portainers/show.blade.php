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
                    <h3 class="card-title">Serveur Portainer</h3>
                    <div class="card-tools">
                        <a class="btn btn-success" href="{{ route('portainers.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">

                <B>Version : </B>{{ $status['Version'] }}
                <P>
                {{ $stacks }}
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