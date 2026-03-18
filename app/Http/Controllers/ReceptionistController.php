<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Afspraak;

class ReceptionistController extends Controller
{
   public function index()
    {
        $afspraken = Afspraak::orderBy('datum', 'asc')->get();

        return view('receptionist', compact('afspraken')); 
    }
       
    public function edit(Afspraak $afspraak)
    {
        return view('receptionist.edit', compact('afspraak'));
    }

    public function update(Request $request, Afspraak $afspraak)
    {
        $request->validate([
            'naam'     => 'required|string|max:255',
            'kenteken' => 'required|string|alpha_num|max:6',
            'datum'    => 'required|date',
            'status'   => 'required|In behandeling...|Afgerond|Afgekeurd',
        ]);

        $afspraak->update([
            'naam'     => $request->naam,
            'kenteken' => $request->kenteken,
            'datum'    => $request->datum,
            'status'    => $request->status,

        ]);

        return redirect()->route('receptionist')->with('success', 'De afspraak van ' . $afspraak->naam . ' is succesvol gewijzigd.');
    }

    public function destroy(Afspraak $afspraak)
    {
        $afspraak->delete();

        return back()->with('success', 'Afspraak id afgekeurd.');
    }
}