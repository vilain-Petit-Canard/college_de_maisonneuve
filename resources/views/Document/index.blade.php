@extends('layouts.app')
@section('title', 'Document Index')
@section('content')
<div class="container my-5 pt-5">
    <div class="row">
        <div class="col-md-10">
            <h1>Document Index</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('document.create') }}" class="btn btn-primary">@lang('New') document</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            @if ($document->isEmpty())
                <p>@lang('No documents to view').</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('Title')</th>
                            <th>@lang('Student')</th>
                            <th>Date</th>
                            <th>@lang('Actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($document as $documents)
                        <tr>
                            <td>{{ $documents->titre }}</td>
                            <td>{{ $documents->user->name }}</td>
                            <td>{{ $documents->created_at->format('M d, Y') }}</td>
                            <td>
                            @if(auth()->check() && $documents->user_id == auth()->user()->id)
                                <a href="{{ route('document.edit', $documents->id) }}" class="btn btn-primary">@lang('Edit')</a>
                                <form action="{{ route('document.delete', $documents->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this document?')">Delete</button>
                                </form>
                            @endif
                                <a href="{{ asset('img/'.$documents->fichier) }}" class="btn btn-secondary">@lang('View')</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
