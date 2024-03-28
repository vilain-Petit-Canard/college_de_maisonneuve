@extends('layouts.app')

@section('title', $document->titre)

@section('content')
<div class="container">
    <h1>{{ $document->titre }}</h1>
    <p><strong>@lang('Posted by'):</strong> {{ $document->user->name }}</p>
    <p><strong>@lang('On'):</strong> {{ $document->created_at->format('M d, Y') }}</p>
    <button>@lang('Download')</button>
</div>
@endsection
