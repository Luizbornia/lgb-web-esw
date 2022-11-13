<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </head>
  <body class="p-5">
    <h1>Editar Usuario</h1>
    @if ($errors->any())
      <ul class="alert alert-danger">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </ul>
    @endif
    <form action="/usuarios/gravar/{{ $usuario->id }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $usuario->nome }}">
        </div>
        <div class="mb-3">
            <label for="idade" class="form-label">idade</label>
            <input type="number" class="form-control" id="idade" name="idade" value="{{ $usuario->idade }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}">
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $usuario->telefone }}">
        </div>
        <p><input type="submit" value="Salvar" class="btn btn-success"></p>
    </form>
  </body>
</html>