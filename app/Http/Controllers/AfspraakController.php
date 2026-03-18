<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Afspraak; 
use Illuminate\Support\Facades\Auth;

class AfspraakController extends Controller
{
    public function index()
    {
        $afspraken = Afspraak::all(); 
        
        return view('afspraken-zien', compact('afspraken'));
    }

    public function create()
    {
        return view('afspraak'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam'     => 'required|string|max:255',
            'kenteken' => 'required|string|max:10', 
            'datum'    => 'required|date',
        ]);

        Afspraak::create([
            'naam'     => $request->naam,
            'kenteken' => $request->kenteken,
            'datum'    => $request->datum,
            'status'   => 'in afwachting', 
        ]);

        return back()->with('success', 'Bedankt ' . $request->naam . '! Uw afspraak voor ' . $request->datum . ' is aangevraagd.');
    }
}