@extends('layouts.app')
@section('content')
<div class="container">
      <h1 class="my-5">{{ $article->titre }}</h1>
      <!-- /////////////////////////////////////////////// -->
    <div class="card mb-3">        
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>@lang('Content'): </strong>{{ $article->contenu }}</li>
            <li class="list-group-item"><strong>@lang('Language'): </strong>{{ $article->langue }}</li>
            <li class="list-group-item"><strong>@lang('Posted by'): </strong>{{ $user->name }}</li>
          </ul>
          
          <p class="card-text"><small class="text-muted">Last updated: {{ $article->updated_at }}</small></p>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-around px-4">
          <a href="{{ route('article.edit', $article->id) }}" class="btn btn-sm btn-outline-success">@lang('Edit')</a>
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
        @lang('Confirm suppression'): {{ $article->titre }}?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">@lang('Cancel')</button>
          <form  action="{{ route('article.delete', $article->id) }}" method="post">
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