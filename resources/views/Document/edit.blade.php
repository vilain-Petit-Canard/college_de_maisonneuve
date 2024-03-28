@extends('layouts.app')
@section('title', 'Edit Document')
@section('content')
<div class="container">
    <h1>@lang('Edit') Document</h1>
    <form action="{{ route('document.update', $document->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titre">@lang('Title'):</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ $document->titre }}" required>
        </div>
        <div class="form-group">
            <label for="fichier">@lang('File'):</label>
            <input type="file" name="fichier" id="fichier" class="form-control-fichier" accept="png, jpeg, jpg, pdf" value="{{$document->fichier}}" required>
        </div>
        <div class="mb-3">
        <label for="langue" class="form-label">@lang('Language'):</label>
            <select name="langue" id="langue" class="form-control">
                    <option value="fr" >@lang('French')</option>
                    <option value="en" >@lang('Engliash')</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">@lang('Update')</button>
    </form>
</div>
@endsection
