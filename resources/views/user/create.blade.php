@extends('layouts.app')
@section('title')
    @lang('lang.registration.title')
@endsection
@section('content')

@if(!$errors->isEmpty())
<div class="container">

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <h1 class="mt-5 mb-4 text-center">@lang('Add student')</h1>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">@lang('Add student')</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">@lang('Name')</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">@lang('Email')</label>
                            <input type="email" class="form-control" id="email" name="email" value="">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">@lang('Password')</label>
                            <input type="password" class="form-control" id="password" name="password" value="">
                        </div>
                        <div class="mb-3">
                            <label for="ville" class="form-label">Status</label>
                            <select name="type" id="type" class="form-control">
                                <option value="administrateur" >@lang('administrator')</option>
                                <option value="professeur" >@lang('Teacher')</option>
                                <option value="etudiant" selected >@lang('Student')</option>
                            </select>
                        </div>
                        <!-- sdsdsds -->
                        <!-- <form action="{{-- route('etudiant.store') --}}" method="POST"> -->
                            <div class="mb-3">
                            <label for="adresse" class="form-label">@lang('Address')</label>
                            <textarea class="form-control" id="adresse" name="adresse" rows="2">{{old('adresse')}}</textarea>
                            @if($errors->has('adresse'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('adresse')}}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">@lang('Phone')</label>
                            <input type="text" class="form-control" id="telephone" name="telephone" value="{{old('telephone')}}">
                            @if($errors->has('telephone'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('telephone')}}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="date_de_naissance" class="form-label">@lang('Date of birth')</label>
                            <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" value="{{old('date_de_naissance')}}">
                            @if($errors->has('date_de_naissance'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('date_de_naissance')}}
                            </div>
                            @endif
                            @lang('lang.home.teacher')
                        </div>
                        <div class="mb-3">
                            <label for="ville" class="form-label">@lang('City'):</label>
                            <select name="ville" id="ville" class="form-control">
                                @foreach($villes as $ville)
                                    <option value="{{ $ville->id }}" >{{ $ville->nom }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                        <!-- sdsdd -->
                        <!-- <button type="submit" class="btn btn-primary">Continuer</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

