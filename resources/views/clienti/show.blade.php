
@extends('layouts.app')
<link rel="stylesheet" href="{{ mix('resources/css/app.css') }}">


@section('content')
<div class="background">
    <h1 class="titolo">Dettagli Cliente</h1>

    <table class="table">
        <tbody>
            <tr>
                <th>Nome:</th>
                <td>{{ $cliente->nome }}</td>
            </tr>
            <tr>
                <th>Cognome:</th>
                <td>{{ $cliente->cognome }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $cliente->email }}</td>
            </tr>
        </tbody>
    </table>
    <form method="POST" action="{{ route('clienti.destroy', $cliente->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Elimina Cliente</button>
        <a href="{{ route('clienti.index') }}" class="btn btn-primary">Torna all'elenco dei clienti</a>
    </form>



</div>
@endsection
