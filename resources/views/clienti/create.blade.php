@extends('layouts.app')
@section('content')
@endsection
<link rel="stylesheet" href="{{ mix('resources/css/app.css') }}">
<div class="background">

    <h1 class="titolo">Crea un nuovo cliente</h1>
    <form action="{{ route('clienti.store') }}" method="POST">
        @csrf
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="cognome" placeholder="Cognome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="gruppo_cliente_id" placeholder="Gruppo Cliente" required>
        <button type="submit" class="btn btn-primary">Salva Cliente</button>
    </form>

</div>


