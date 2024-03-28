@extends('layouts.app')
@section('title', 'Televerser un Document')
@section('content')
<div class="container m-4 p-4">
    <h1>@lang('Create a') document</h1>
    <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group p-3">
            <label for="titre">@lang('Ttile'):</label>
            <input type="text" name="titre" id="titre" class="form-control" required>
        </div>
        <div class="form-group p-3">
            <label for="fichier">@lang('File'):</label>
            <input type="file" name="fichier" id="fichier" class="form-control-fichier" required>
        </div>
        <div class="mb-3 p-3">
            <label for="langue" class="form-label">@lang('Language'):</label>
            <select name="langue" id="langue" class="form-control">
                    <option value="fr" >@lang('French')</option>
                    <option value="en" >@lang('Engliash')</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
    </form>
</div>
@endsection
