<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Afspraak;
use App\Models\MonteurTaak;

class MonteurController extends Controller
{
    public function index(): View
    {
        $afspraken = Afspraak::orderBy('datum', 'asc')->get();
        return view('monteur', compact('afspraken'));
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'afspraak_id' => 'required|exists:afspraken,id',
            'uren' => 'required|numeric|min:0.25',
            'materialen' => 'required|string'
        ]);

        // Monteur taak opslaan
        MonteurTaak::create($validated);

        // Status van afspraak updaten naar "Afgerond"
        $afspraak = Afspraak::find($validated['afspraak_id']);
        $afspraak->update(['status' => 'Afgerond']);

        return response()->json(['success' => true, 'message' => 'Taak opgeslagen']);
    }
}