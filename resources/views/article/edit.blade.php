@extends('layouts.app')
@section('title', 'Modifier un article')
@section('content')
    <h1 class="mt-5 mb-4">@lang('Edit') article</h1>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Modifier l'article {{$article->titre}}</h5>
                </div>
                <div class="card-body">
                {{ old('titre')}}
                    <form action="{{ route('article.update', $user->id) }}" method="POST">
                        @csrf
                        <!-- doit rajouter 'put' car absente dans le html -->
                        @method('put')
                        <div class="mb-3">
                            <label for="titre" class="form-label">@lang('Title')</label>
                            {{old('titre')}}
                            <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre', $article->titre )}}">
                            @if($errors->has('titre'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('titre')}}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="contenu" class="form-label">@lang('Content')</label>
                            <textarea class="form-control" id="contenu" name="contenu" rows="2">{{old('contenu', $article->contenu) }}</textarea>
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
@endsection