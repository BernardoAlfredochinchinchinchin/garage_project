<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg text-gray-700">
            Financieel Overzicht Eigenaar
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-5xl mx-auto px-4">

            <div class="md:grid-cols-2 gap-2 mb-4">
                <div class="border p-3 bg-gray-50">
                    <p class="text-sm">Totale Omzet (Betaald)</p>
                    <p>€ {{ number_format($totaleOmzet, 2, ',', '.') }}</p>
                </div>

                <div class="border p-3 bg-gray-50">
                    <p class="text-sm">Openstaand (Afgerond)</p>
                    <p>€ {{ number_format($openstaandBedrag, 2, ',', '.') }}</p>
                </div>

                <div class="border p-3 bg-gray-50">
                    <p class="text-sm">Betaalde Facturen</p>
                    <p>{{ $aantalBetaaldeFacturen }}</p>
                </div>

                
            </div>

            <div class="border p-3 bg-white">
                <h3 class="text-base mb-2">Omzet per maand</h3>

                <table class="w-full text-left text-sm border">
                    <thead>
                        <tr>
                            <th class="border p-2">Maand</th>
                            <th class="border p-2">Omzet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($omzetPerMaand as $row)
                            <tr>
                                <td class="border p-2">{{ \Carbon\Carbon::createFromFormat('Y-m', $row->maand)->format('m-Y') }}</td>
                                <td class="border p-2">€ {{ number_format($row->omzet, 2, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="border p-2 text-gray-600">Nog geen betaalde omzetdata.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>