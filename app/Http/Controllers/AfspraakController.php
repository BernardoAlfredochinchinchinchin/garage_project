<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Afspraak; // Belangrijk: dit linkt naar jouw Afspraak model!

class AfspraakController extends Controller
{
    public function create()
    {
        return view('afspraak'); 
    }
    public function store(Request $request)
    {
  
        $request->validate([
        'naam'     => 'required|string|max:255',
        'kenteken' => 'required|string|alpha_num|max:6',
        'datum'    => 'required|date',
        ]);


        Afspraak::create([
            'naam'     => $request->naam,
            'kenteken' => $request->kenteken,
            'datum'    => $request->datum,
        ]);
        return back()->with('success', 'Bedankt ' . $request->naam . '! Uw afspraak voor ' . $request->datum . ' is aangevraagd.');
    }
}