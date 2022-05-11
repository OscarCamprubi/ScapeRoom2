<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="@yield('cssLink')" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>
    <script defer src="{{ mix('js/app.js') }}"></script>
    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><i class="bi bi-house-fill"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/list-joc">Jocs</a>
                </li>
                @if(isset($user))
                    @if($user->role === 1)
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/list-sala">Sala</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/list-participant">Participant</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/list-voucher">Voucher</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/list-user">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/list-valoracio">Valoracions</a>
                        </li>
                    @endif
                @endif
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/list-reserva">Reserves</a>
                </li>

            </ul>
        </div>
        @if(isset($user))
            <div>
                <a class="m-3 text-decoration-none text-black" href="/logout">LogOut</a>
            </div>
        @else
            <div>
                <a class="m-3 text-decoration-none text-black" href="/login">Login</a>
                <a class="m-3 text-decoration-none text-black" href="/register">Register</a>
            </div>
        @endif
    </div>
</nav>
<div class="container">
    @yield('contingut')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
