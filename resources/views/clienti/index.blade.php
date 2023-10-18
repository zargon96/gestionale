
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="">
    <link rel="stylesheet" href="{{ mix('resources/css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>    
    <title>Lista Clienti</title>
</head>
<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="titolo">Benvenuto nel gestionale</h1>
<div class="flex">
    <div class="box-clienti">
        <a class="bottone-clienti" href="{{ route('clienti.create') }}">
            Aggiungi Cliente
        </a>
    </div>
</div>
  

    @foreach ($clienti as $cliente)

    <div class="flex">
        
    
        <div class="box-clienti">
            <a class="bottone-clienti" href="{{ route('clienti.edit', $cliente->id) }}">
                Modifica Cliente
            </a>
        </div>
    
        <div class="box-clienti">
            <a class="bottone-clienti" href="{{ route('clienti.show', $cliente->id) }}">
                Mostra Cliente
            </a>
        </div>
    
        <div class="box-clienti">
            <form method="POST" action="{{ route('clienti.destroy', $cliente->id) }}">
                @csrf
                @method('DELETE')
                <button class="elimina" type="submit">
                    Elimina Cliente
                </button>
            </form>
        </div>
    </div>
    
@endforeach

</body>
</html>


