@extends('layouts.app')
@section('title', 'Ajouter un Etudiant')
@section('content')
<div class="container">

    <h1 class="mt-5 mb-4 text-center">@lang('Edit') @lang('Student')</h1>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title ">@lang('Edit') {{$etudiant->nom}}</h5>
                </div>
                <div class="card-body">
                {{ old('nom')}}
                    <form action="{{ route('etudiant.update', $etudiant->id) }}" method="POST">
                        @csrf
                        <!-- doit rajouter 'put' car absente dans le html -->
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">@lang('Name')</label>
                            {{old('nom')}}
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name )}}">
                            @if($errors->has('nom'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('nom')}}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="adresse" class="form-label">@lang('Address')</label>
                            <textarea class="form-control" id="adresse" name="adresse" rows="2">{{old('adresse', $etudiant->adresse) }}</textarea>
                            @if($errors->has('adresse'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('adresse')}}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">@lang('Phone')</label>
                            <input type="text" class="form-control" id="telephone" name="telephone" value="{{old('telephone',  $etudiant->telephone) }}">
                            @if($errors->has('telephone'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('telephone')}}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">@lang('Email')</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email',  $user->email)}}">

                            @if($errors->has('email'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('email')}}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="date_de_naissance" class="form-label">@lang('Date of birth')</label>
                            <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" value="{{old('date_de_naissance',  $etudiant->date_de_naissance)}}">
                            @if($errors->has('date_de_naissance'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('date_de_naissance')}}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="ville" class="form-label">@lang('City')</label>
                            <!-- <select name="ville" id="ville"  class="form-control">
                                @foreach($villes as $ville)
                                    <option value="{{ $ville->id }}" >{{ $ville->nom }}</option>
                                    @endforeach
                                    <option selected >{{ $ville_etudiant->nom }}</option>
                            </select> -->
                        <select name="ville" id="ville" class="form-control">
                            @foreach($villes as $ville)
                            <option value="{{ $ville->id }}" @if ($etudiant->ville_id == $ville->id ) selected @endif > {{ $ville->nom }} </option>
                            @endforeach
                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection