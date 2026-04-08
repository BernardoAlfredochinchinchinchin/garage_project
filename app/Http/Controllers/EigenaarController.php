<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonteurTaak;
use Illuminate\View\View;

class Eigenaarcontroller extends Controller
{
    public function financieelOverzicht(): View
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Je mag hier niet komen hé !');
        }

        // Betaalde afspraken tellen mee als omzet.
        $betaaldQuery = MonteurTaak::query()
            ->join('afspraken', 'afspraken.id', '=', 'monteur_taken.afspraak_id')
            ->where('afspraken.status', 'Betaald');

        $totaleOmzet = (clone $betaaldQuery)->sum('monteur_taken.kosten');
        $aantalBetaaldeFacturen = (clone $betaaldQuery)->count();
        $gemiddeldeFactuur = $aantalBetaaldeFacturen > 0
            ? $totaleOmzet / $aantalBetaaldeFacturen
            : 0;

        // Afgerond maar nog niet betaald = openstaand bedrag.
        $openstaandBedrag = MonteurTaak::query()
            ->join('afspraken', 'afspraken.id', '=', 'monteur_taken.afspraak_id')
            ->where('afspraken.status', 'Afgerond')
            ->sum('monteur_taken.kosten');

        // Overzicht van betaalde omzet per maand.
        $omzetPerMaand = MonteurTaak::query()
            ->join('afspraken', 'afspraken.id', '=', 'monteur_taken.afspraak_id')
            ->where('afspraken.status', 'Betaald')
            ->selectRaw("DATE_FORMAT(afspraken.datum, '%Y-%m') as maand, SUM(monteur_taken.kosten) as omzet")
            ->groupBy('maand')
            ->orderBy('maand', 'asc')
            ->get();

        return view('admin.eigenaar', compact(
            'totaleOmzet',
            'aantalBetaaldeFacturen',
            'gemiddeldeFactuur',
            'openstaandBedrag',
            'omzetPerMaand'
        ));
    }
}
