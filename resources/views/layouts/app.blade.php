<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maisonneuve - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body class="d-flex flex-column h-100">
@php $locale = session()->get('locale') @endphp

<header class="">
        <nav class="navbar navbar-expand-sm navbar-light bg-light shadow fixed-top" aria-label="Third navbar example">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">{{-- config('app.name') --}} College de Maisonneuve</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsExample03">
                    <ul class="navbar-nav me-auto mb-2 mb-sm-0 ">
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false">@lang('Users')</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('user.create')}}">@lang('New User')</a></li>
                                <li><a class="dropdown-item" href="{{route('user.index')}}">@lang('Users')</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('etudiant.index')}}">@lang('lang.home.student')s</a></li>
                            <li><a class="nav-link"  href="{{ route('article.create') }}">@lang('lang.layout.create_article')</a></li>
                            <li><a class="nav-link"  href="{{ route('article.index') }}">Forum</a></li>
                            <li><a class="nav-link"  href="{{ route('document.index') }}">Documents</a></li>
                            <li><a class="nav-link"  href="{{ route('document.create') }}">@lang('lang.layout.create_document')</a></li>
                            <ul class="dropdown-menu">
                                <!-- <a class="dropdown-item" href="{{-- route('task.completed', 0) --}}">Unfinished</a> -->
                            </ul>
                        </li>
                        @endauth
                    </ul>
                    
                    
                    <ul class="navbar-nav  mb-2 mb-sm-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false">@lang('Language') {{ $locale == '' ? '(en)' : "($locale)" }}</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('lang', 'en')}}">@lang('English')</a></li>
                                <li><a class="dropdown-item" href="{{ route('lang', 'fr')}}">@lang('French')</a></li>
                            </ul>
                        </li>
                        <li class="nav-item d-flex">
                            @guest
                                <a class="nav-link" href="{{route('user.create')}}">@lang('lang.home.suscription')</a>
                                <a class="nav-link" href="{{route('login')}}">@lang('lang.layout.login')</a>
                            @else
                                <a class="nav-link" href="{{route('logout')}}">@lang('lang.layout.logout')</a>
                            @endguest
                        </li>
                    </ul>
                 
                </div>
            </div>
        </nav>
    </header>
    <div class=" py-5">
     <!-- annonce de bienvenue a l'utilisateur etait ici -->

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
             {{ session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @yield('content')
    </div>
    <footer class="footer mt-auto py-3 bg-dark text-white ">
        <div class="container text-center">
            &copy; {{ date('Y')}} {{-- config('app.name') --}} College de Maisonneuve. @lang('lang.layout.rights')
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>