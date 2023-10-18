@extends('layouts.app')

<link rel="stylesheet" href="{{ mix('resources/css/app.css') }}">
<div class="background">

    @section('content')
    <h1 class="titolo">Modifica Cliente</h1>
    
        <form method="POST" action="{{ route('clienti.update', $cliente->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="titolo-label" for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ $cliente->nome }}" class="form-control">
            </div>
    
            <div class="form-group">
                <label class="titolo-label" for="cognome">Cognome</label>
                <input type="text" name="cognome" id="cognome" value="{{ $cliente->cognome }}" class="form-control">
            </div>
    
            <div class="form-group">
                <label class="titolo-label" for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ $cliente->email }}" class="form-control">
            </div>
              <button type="submit" class="btn btn-primary">Salva Modifiche</button>
        </form>
    
    
    
</div>

