<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TASK MANAGER</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <link rel="shortcut icon" sizes="192x192" href="{{ asset('favicon.ico') }}">    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body style="background-color:yellow;">
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color:black !important;">
  <div class="container-fluid">
    <a class="navbar-brand" href="https://github.com/IGprojects" target="_blank" style="color:yellow !important;">IGProjects</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="{{route('todos')}}" style="color:yellow !important;">Tareas</a>
        <a class="nav-link" aria-current="page" href="{{route('categories.index')}}" style="color:yellow !important;">Categorias</a>
      </div>
    </div>
  </div>
</nav>
    <!--AMB AQUESTA LINEA ES POT REFERENCIAR  PARTIR DUN ALTRE HTML ES EL SEU CONTINGUT FENT REFERENCIA A CONTENT-->
    @yield('content')

</body>
</html>