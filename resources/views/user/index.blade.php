@extends('layouts.app')
@section('title', 'Utilisateurs de Maisonneuve')
@section('content')
<div class="container">
<h1 class="mt-5 mb-4 text-center">@lang('Users list')</h1>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title">@lang('User')s</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>#</th>
                            <th>@lang('Name')</th>
                            <th>Email</th>
                            <th>Type</th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th>{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->type }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
    </div>  
@endsection
