<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        // Recupera l'elenco dei clienti dal database e passalo alla vista
        $clienti = Cliente::all();
        return view('clienti.index', ['clienti' => $clienti]);
    }

    public function create()
    {
        return view('clienti.create');
    }

    public function store(Request $request)
    {
        // Valida i dati del form
        $request->validate([
            'nome' => 'required',
            'cognome' => 'required',
            'email' => 'required|email',
        ]);

        // Salva il nuovo cliente nel database
        Cliente::create([
            'nome' => $request->input('nome'),
            'cognome' => $request->input('cognome'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('clienti.index')->with('success', 'Cliente creato con successo');
    }

    public function show($id)

    {
        // Recupera il dettaglio del cliente dal database
        $cliente = Cliente::find($id);
    
        if (!$cliente) {
            return redirect()->route('clienti.index')->with('error', 'Cliente non trovato');
        }
    
        return view('clienti.show', ['cliente' => $cliente]);
    }
    

    public function edit($id)
    {
        $cliente = Cliente::find($id);
    
        if ($cliente) {
            // Il cliente esiste, puoi procedere con la modifica
            return view('clienti.edit', ['cliente' => $cliente]);
        } else {
            // Il cliente non esiste, puoi gestire il caso in cui il cliente non sia trovato
            return redirect()->route('clienti.index')->with('error', 'Cliente non trovato');
        }
    }
    
    
    

    public function update(Request $request, $id)
    {
        // Valida i dati del modulo di modifica
        $request->validate([
            'nome' => 'required',
            'cognome' => 'required',
            'email' => 'required|email',
        ]);

        // Aggiorna il cliente nel database
        $cliente = Cliente::find($id);
        $cliente->update([
            'nome' => $request->input('nome'),
            'cognome' => $request->input('cognome'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('clienti.index')->with('success', 'Cliente aggiornato con successo');
    }

    public function destroy($id)
    {
    // Recupera il cliente dal database
    $cliente = Cliente::find($id);

    // Verifica se il cliente esiste
    if (!$cliente) {
        return redirect()->route('clienti.index')->with('error', 'Cliente non trovato');
    }

    // Elimina il cliente dal database
    $cliente->delete();

    return redirect()->route('clienti.index')->with('success', 'Cliente eliminato con successo');
    }
}

