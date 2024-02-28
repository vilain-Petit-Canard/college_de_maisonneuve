@extends('layouts.app')
@section('title', 'Etudiants de Maisonneuve')
@section('content')
    <h1 class="my-5 text-center"> La Liste de nos etudiants</h1>
    <div class="row">
    @forelse($etudiants as $etudiant)
    <div class="col-md-6 col-lg-3">
        <div class="card mb-4" >
            <div class="d-flex justify-content-center pt-3">
                <img class="card-img-top w-50"  src="{{ asset('img/avatar.jpg') }}" alt="Avatar de l'etudiant">
            </div>    
            <div class="card-body">
                <h5 class="card-title text-center">{{ $etudiant->nom }}</h5>
                <!-- <p class="text-center"><strong>Adresse: </strong></p> -->
                <p class="card-text text-center">{{ $etudiant->adresse }}</p>
                {{-- ($etudiant) --}}
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item text-center"><strong>Email: </strong>{{ $etudiant->email }}</li>
                <li class="list-group-item text-center"><strong>Telephone: </strong>{{ $etudiant->telephone }}</li>
            </ul>
            <div class="card-footer d-flex justify-content-center">
                <a href="{{route('etudiant.show', $etudiant->id)}}" class="btn btn-sm btn-outline-primary  ">Consulter</a>
            </div>
        </div>
    </div>

    @empty
        <div class="alert alert-danger">Pas d'etudiants a afficher</div>
    @endforelse  
    </div>
@endsection