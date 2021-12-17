@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">CATS WorkSpaces</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    Bonjour <B>{{ Auth::user()->name }}</B>, ravi de vous accueillir sur le site <B>CATS WorkSpaces</B> !<BR>
                    Vous avez une habilitation de niveau <B>{{ Auth::user()->level }}</B><BR>
                    <I>Le niveau 0 indique que vous êtes en cours d'inscription,<BR>
                    Le niveau 1 est celui des utilisateurs,<BR>
                    Le niveau 3 est réservé aux administrateurs.
                    </I>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <B>CATS WorkSpaces</B> vous permet d'accéder à des environnements complets de développement avec un simple navigateur.<BR>
                    Pour chaque filière de développement, vous disposerez d'une IDE Microsoft Visual Studio Code, connecté à votre repo GitLab, d'un environnement dédié comprenant tous les langages et outils nécessaires, d'un terminal Linux avec un client Docker complet.
                </div>
            </div>


        </div>
    </div>
@stop