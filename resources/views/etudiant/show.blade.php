@extends('layouts.app')
@section('content')
<div class="container pt-3">
    <h1 class="my-5">{{ $user->name }}</h1>
    <!-- /////////////////////////////////////////////// -->
  <div class="card mb-3">
    <div class=" d-flex">
      <img class="card-img-top w-25 img-thumbnail" src="{{ asset('img/avatar.jpg') }}" alt="Avatar de l'etudiant">
      <div class="card-body">
        
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong>@lang('Nom'): </strong>{{ $user->name }}</li>
          <li class="list-group-item"><strong>@lang('Date of birth'): </strong>{{ $etudiant->date_de_naissance }}</li>
          <li class="list-group-item"><strong>@lang('Phone'): </strong>{{ $etudiant->telephone }}</li>
          <li class="list-group-item"><strong>@lang('Email'): </strong>{{ $user->email }}</li>
          <li class="list-group-item"><strong>@lang('City'): </strong>{{ $ville->nom }}</li>
          <li class="list-group-item"><strong>@lang('Address'): </strong>{{ $etudiant->adresse }}</li>
        </ul>
        
        <p class="card-text"><small class="text-muted">@lang('Last updated'): {{ $etudiant->updated_at }}</small></p>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-between">
        <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-sm btn-outline-success">@lang('Edit')</a>
        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
        @lang('Delete')
        </button>
    </div> 
</div>
<!-- //////////////////////////////////// -->
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-danger " id="deleteModalLabel">@lang('Delete')</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Vooulez-vous vraiment supprimer l'étudiant: {{ $etudiant->nom }}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">@lang('Cancel')</button>
        <form  method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-danger">@lang('Delete')</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection