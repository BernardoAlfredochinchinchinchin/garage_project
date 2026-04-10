<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Afspraak;
use App\Models\MonteurTaak;

class MonteurController extends Controller
{


    function CheckAdmin(){
        
    }    

    public function index(): View
    {

        
        // Monteur ziet alleen taken die al goedgekeurd of afgerond zijn.
        $afspraken = Afspraak::whereIn('status', ['Goedgekeurd'])->get();
        return view('admin.monteur', compact('afspraken'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'afspraak_id' => 'required|exists:afspraken,id',
            'uren' => 'required|numeric|min:0.25',
            'materialen' => 'required|string',
            'kosten' => 'required|numeric|min:0.25',

        ]);

        // Monteur taak opslaan
        MonteurTaak::create($validated);

        // Status van afspraak updaten naar "Afgerond"
        $afspraak = Afspraak::find($validated['afspraak_id']);
        $afspraak->update(['status' => 'Afgerond']);

        return back()->with('success', 'Taak succesvol afgerond.');

    }



    public function bon(Afspraak $afspraak)
    {
        // Laad de gekoppelde taak om bongegevens te tonen.
        $afspraak->load('monteurTaken');
        $taak = $afspraak->monteurTaken->first();

        if (!$taak) {
            return redirect()->route('monteur')->with('error', 'Nog geen taakgegevens om te printen.');
        }

        return view('bon', compact('afspraak', 'taak'));
    }

    public function betalen(Afspraak $afspraak)
    {
        // Na betaling status vastzetten op Betaald.
        $afspraak->update(['status' => 'Betaald']);

    return redirect()->route('afspraak.index')->with('success', 'Betaling succesvol verwerkt.');
    }

    
}