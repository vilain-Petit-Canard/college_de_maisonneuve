@extends('layouts.app')
@section('title', 'Etudiants de Maisonneuve')
@section('content')
<style>
    @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

body {
    /* background-color: #D32F2F; */
    font-family: 'Calibri', sans-serif !important
} 

.mt-100{ 
   margin-top:100px;
}
.mb-100{
   margin-bottom:100px;
}
.card {
   position: relative;
   display: -webkit-box;
   display: -ms-flexbox;
   display: flex;
   -webkit-box-orient: vertical;
   -webkit-box-direction: normal;
   -ms-flex-direction: column;
   flex-direction: column;
   min-width: 0;
   word-wrap: break-word;
   background-color: #fff;
   background-clip: border-box;
   border: 0px solid transparent;
   border-radius: 0px;
}

.card-body {
   -webkit-box-flex: 1;
   -ms-flex: 1 1 auto;
   flex: 1 1 auto;
   padding: 1.25rem;
}

.card .card-title {
   position: relative;
   font-weight: 600;
   margin-bottom: 10px;
}

ul.list-style-none li {
   list-style: none;
}

ul.list-style-none li a {
   color: #673AB7;
   padding: 8px 0px;
   display: block;
   text-decoration: none;
}

.m-t-5 {
   margin-top: 5px;
}

.w-30px {
   width: 30px;
}
</style>

<div class="row d-flex justify-content-center mt-100 mb-100">
                        
                                  
                     <div class="col-lg-6">
                        
                        <div class="card">
                            <div class="card-body text-center">
                                <h2 class="card-title m-b-0">@lang('Articles list')</h2>
                            </div>
                            <ul class="list-style-none">
                            @forelse($articles as $article)
                                <li class="d-flex no-block gap-5 justify-content-between g-4 card-body">
                                    <!-- <i class="fa fa-check-circle w-30px m-t-5"></i> -->
                                    <div class="text-truncate ">
                                        <a href="{{route('article.show', $article->id)}}" class="m-b-0 font-medium p-0" data-abc="true"> <h5>{{ $article->titre }}</h5></a>
                                        <span class="text-muted text-truncate"> {{ $article->contenu }} </span>
                                        <ul class="list-group list-group-flush p-3 pb-0">
                                            <li class=""><strong>@lang('Posted by'): </strong>{{ $article->user->name }}</li>
                                        </ul>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="text-right">
                                            <h5 class=" text-muted m-b-0">{{ $article->created_at->format('M d ') }}</h5>
                                            <a href="{{route('article.show', $article->id)}}" class="btn btn-sm btn-outline-primary p-2 ">@lang('View')</a>

                                        </div>
                                    </div>
                                </li>
                                <hr>
                               
                                @empty
                                     <div class="alert alert-danger">@lang('No articles to view')</div>
                            @endforelse 
                            </ul>
                        </div>

                    </div>
                    </div>
                    
@endsection