<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Afspraak;

class ReceptionistController extends Controller
{
    public function index()
    {
        $afspraken = Afspraak::orderBy('datum', 'asc')->get();

        return view('admin.receptionist', compact('afspraken')); 
    }
    

    public function update(Request $request, Afspraak $afspraak)
    {
        $request->validate([
            'naam'     => 'required|string|max:255',
            'kenteken' => 'required|string|max:10',
            'datum'    => 'required|date',
            'status'   => 'required|in:in afwachting,goedgekeurd,afgekeurd',
        ]);

        $afspraak->update([
            'naam'     => $request->naam,
            'kenteken' => $request->kenteken,
            'datum'    => $request->datum,
            'status'   => $request->status,
        ]);

        return redirect()->route('receptionist')->with('success', 'De afspraak van ' . $afspraak->naam . ' is succesvol gewijzigd.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:in afwachting,goedgekeurd,afgekeurd',
        ]);

        $afspraak = Afspraak::findOrFail($id);
        $afspraak->status = $request->status;
        $afspraak->save();

        return redirect()->back()->with('success', 'Status van ' . $afspraak->naam . ' succesvol bijgewerkt!');
    }

    public function destroy(Afspraak $afspraak)
    {
        $afspraak->delete();

        return back()->with('success', 'Afspraak succesvol verwijderd.');
    }
}
