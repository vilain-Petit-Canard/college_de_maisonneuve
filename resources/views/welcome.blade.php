@extends('layouts.app')
@section('title', 'Bienvenue')
@section('content')
<div class="row justify-content-center my-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h1 class="display-6 text-center">Bienvenue au college de Maisonneuve</h1>
            </div>
            <div class="card-body">
                <p>Ceci est une plateforme de gestion de tous les étudiants du collège</p>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('etudiant.index')}}" class="btn btn-primary">Voir la liste des étudiants</a>
            </div>
        </div>
    </div>
</div>
@endsection
