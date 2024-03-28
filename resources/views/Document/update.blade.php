@extends('layouts.app')
@section('title', 'Update Document')
@section('content')
<div class="container">
    <h1>@lang('Update') Document</h1>
    <form action="{{ route('documents.update', $document->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titre">@lang('Title'):</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ $document->titre }}" required>
        </div>
        <button type="submit" class="btn btn-primary">@lang('Update')</button>
    </form>
</div>
@endsection
