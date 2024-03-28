@extends('layouts.app')
@section('title', 'Ajouter un Etudiant')
@section('content')
<div class="container">
    <h1 class="mt-5 mb-4">Créer votre Profil etudiant</h1>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">@lang('Student')</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('etudiant.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <textarea class="form-control" id="adresse" name="adresse" rows="2">{{old('adresse')}}</textarea>
                            @if($errors->has('adresse'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('adresse')}}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Telephone</label>
                            <input type="text" class="form-control" id="telephone" name="telephone" value="{{old('telephone')}}">
                            @if($errors->has('telephone'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('telephone')}}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="date_de_naissance" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" value="{{old('date_de_naissance')}}">
                            @if($errors->has('date_de_naissance'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('date_de_naissance')}}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="ville" class="form-label">Sélectionnez votre ville de résidence :</label>
                            <select name="ville" id="ville" class="form-control">
                                @foreach($villes as $ville)
                                    <option value="{{ $ville->id }}" >{{ $ville->nom }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection