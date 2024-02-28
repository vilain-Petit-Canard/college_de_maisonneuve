@extends('layouts.app')
@section('content')
    <h1 class="my-5">{{ $etudiant->nom }}</h1>
    <!-- /////////////////////////////////////////////// -->
  <div class="card mb-3">
    <div class=" d-flex">
      <img class="card-img-top w-25 img-thumbnail" src="{{ asset('img/avatar.jpg') }}" alt="Avatar de l'etudiant">
      <div class="card-body">
        <strong class="card-title">Adresse</strong>
        <p class="card-text">{{ $etudiant->adresse }}</p>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong>Date de naissance: </strong>{{ $etudiant->date_de_naissance }}</li>
          <li class="list-group-item"><strong>Telephone: </strong>{{ $etudiant->telephone }}</li>
          <li class="list-group-item"><strong>Email: </strong>{{ $etudiant->email }}</li>
          <li class="list-group-item"><strong>Ville: </strong>{{ $ville->nom }}</li>
        </ul>
        <p class="card-text"><small class="text-muted">Last updated: {{ $etudiant->updated_at }}</small></p>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-between">
        <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
            Delete
        </button>
    </div> 
</div>
<!-- //////////////////////////////////// -->
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-danger " id="deleteModalLabel">DELETE</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure to delete the task: {{-- $task->title --}}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form  method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection