<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">

  <meta name="viewport" content="width=device-width, user-scalable=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  <nav>
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">Lista</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('person.create') }}">Cadastrar</a>
      </li>
    </ul>
  </nav>

  <main>
    <div class="title">
      <h1>@yield('title')</h1>
    </div>

    @yield('content')  
  </main>

  @yield('scripts')
</body>
</html>