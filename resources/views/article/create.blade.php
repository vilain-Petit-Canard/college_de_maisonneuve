@extends('layouts.app')
@section('title', 'Ajouter un Article')
@section('content')
<div class="container">
    <h1 class="mt-5 mb-4 text-center">@lang('Créer un') Article</h1>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Article</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('article.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="titre" class="form-label">@lang('Title')</label>
                            <input type="text" class="form-control" id="titre" name="titre" value="{{old('titre')}}">
                        </div>
                        <div class="mb-3">
                            <label for="contenu" class="form-label">@lang('Content')</label>
                            <textarea class="form-control" id="contenu" name="contenu" rows="4" cols="50">{{old('contenu')}}</textarea>
                            @if($errors->has('article'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('article')}}
                            </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection