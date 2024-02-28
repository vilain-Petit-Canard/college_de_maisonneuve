<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maisonneuve - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="d-flex flex-column h-100">
<header class="">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">{{-- config('app.name') --}} College de Maisonneuve</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsExample03">
                    <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('etudiant.index')}}">Etudiants</a></li>
                                <li><a class="nav-link"  href="{{ route('etudiant.create') }}">Nouvel Etudiant</a></li>
                            <ul class="dropdown-menu">
                               <!-- <a class="dropdown-item" href="{{-- route('task.completed', 0) --}}">Unfinished</a></li> -->
                            </ul>
                    </ul>
                 
                </div>
            </div>
        </nav>
    </header>
    <div class="container my-5">
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
            &copy; {{ date('Y')}} {{-- config('app.name') --}} College de Maisonneuve. All Rights Reserved
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>