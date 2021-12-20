@extends('adminlte::page')

@section('content_header')
<h1 class="m-0 text-dark">CATS WorkSpaces</h1>
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Serveur Portainer</h3>
                    <div class="card-tools">
                    </div>
                </div>

                <div class="card-body">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Url</th>
                                <th>Utilisateur</th>
                                <th>Mot de Passe</th>
                                <th>EndPoint</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($portainers as $portainer)
                            <tr>
                                <td>{{ $portainer->url }}</td>
                                <td>{{ $portainer->usr }}</td>
                                <td>{{ $portainer->pwd }}</td>
                                <td>{{ $portainer->end }}</td>
                                <td align="center">
                                    @if (Auth::user()->level == 3)
                                        <a class="btn btn-primary btn-xs"
                                            href="{{ route('portainers.edit',$portainer->id) }}">Modifier</a>
                                            <a class="btn btn-info btn-xs"
                                            href="{{ route('portainers.show',$portainer->id) }}">Statut</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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

<script>
$(function() {
    $("#mytable").DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
$(".confirmdelete").on("submit", function(){
        return !confirm("Please, select cancel to delete this item");
    });
</script>


@stop