@php
if (auth()->user()->role !== 'admin') {
    abort(403, 'Je mag hier niet komen hé !');
}
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-700">
            Monteur Dashboard
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
                <!-- Linkerkant: Materialen & Prijzen -->
                <div class="lg:col-span-1">
                    <div class="border p-4 bg-gray-50">
                        <h3 class="text-base font-semibold mb-3">Materialen Prijzengids</h3>
                        <div class="space-y-2 text-sm">
                            <div class="border-b pb-2">
                                <p>Olie 5W30</p>
                                <p>€ 45,00</p>
                            </div>
                            <div class="border-b pb-2">
                                <p>Oliefilter</p>
                                <p>€ 12,50</p>
                            </div>
                            <div class="border-b pb-2">
                                <p>Luchtfilter</p>
                                <p>€ 18,00</p>
                            </div>
                            <div class="border-b pb-2">
                                <p>Remblokken (set)</p>
                                <p>€ 89,00</p>
                            </div>
                            <div class="border-b pb-2">
                                <p>Ruitenwisser</p>
                                <p>€ 15,00</p>
                            </div>
                            <div class="border-b pb-2">
                                <p>Koelvloeistof</p>
                                <p>€ 22,50</p>
                            </div>
                            <div class="border-b pb-2">
                                <p>Accu 60Ah</p>
                                <p>€ 125,00</p>
                            </div>
                            <div>
                                <p>Transmissievloeistof</p>
                                <p>€ 35,00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rechterkant: Takenoverzicht -->
                <div class="lg:col-span-3">
                    <div class="border p-4 bg-white">
                        <div class="mb-4">
                            <div>
                                <h3 class="text-lg font-semibold">Werkplaats overzicht</h3>
                            </div>
                            <a href="{{ url('/dashboard') }}" class="inline-block mt-2 border px-3 py-1 text-sm">
                                Terug naar dashboard
                            </a>
                        </div>

                        <div class="space-y-3">
                    @foreach($afspraken as $afspraak)
                        <div class="border p-3">
                            <div class="mb-2">
                                <div>
                                    <h4 class="font-semibold">{{ \Carbon\Carbon::parse($afspraak->datum)->format('d-m-Y') }} - {{ $afspraak->naam }}</h4>
                                    <p class="text-sm">Kenteken: {{ strtoupper($afspraak->kenteken) }}</p>
                                    @if($afspraak->opmerkingen)
                                        <p class="text-sm mt-1">
                                            <strong>Opmerkingen:</strong> {{ $afspraak->opmerkingen }}
                                        </p>
                                    @endif
                                </div>
                                <p class="text-sm mt-1"><strong>Status:</strong> {{ ucfirst($afspraak->status) }}</p>
                            </div>

                            <form class="grid gap-2 md:grid-cols-3 md:items-end" data-afspraak-id="{{ $afspraak->id }}">
                                @csrf
                                <div>
                                    <label class="block text-sm mb-1">Uren</label>
                                    <input
                                        type="number"
                                        step="0.25"
                                        min="0.25"
                                        name="uren"
                                        class="w-full border p-2 text-sm {{ $afspraak->status === 'Afgerond' ? 'bg-gray-100 text-gray-500 cursor-not-allowed' : '' }}"
                                        placeholder="Bijv. 1.5"
                                        value="{{$afspraak->monteurTaken->first()?->uren ?? ''   }}"
                                        required
                                        {{ $afspraak->status === 'Afgerond' ? 'disabled' : '' }}
                                    >
                                </div>

                                <div>
                                    <label class="block text-sm mb-1">Materialen</label>
                                    <input
                                        type="text"
                                        name="materialen"
                                        class="w-full border p-2 text-sm {{ $afspraak->status === 'Afgerond' ? 'bg-gray-100 text-gray-500 cursor-not-allowed' : '' }}"
                                        placeholder="Bijv. Olie 5W30, oliefilter"
                                        value="{{$afspraak->monteurTaken->first()?->materialen ?? ''   }}"

                                        required
                                        {{ $afspraak->status === 'Afgerond' ? 'disabled' : '' }}
                                    >
                                </div>

                                <div>
                                <label class="block text-sm mb-1">Kosten (€)</label>
                                <input
                                    type="number"
                                    step="0.01"
                                    min="0"
                                    name="kosten"
                                    class="w-full border p-2 text-sm {{ $afspraak->status === 'Afgerond' ? 'bg-gray-100 text-gray-500 cursor-not-allowed' : '' }}"
                                    placeholder="Bijv. 157,50"
                                    value="{{$afspraak->monteurTaken->first()?->kosten ?? ''   }}"
                                    required
                                    {{ $afspraak->status === 'Afgerond' ? 'disabled' : '' }}
                                >
                            </div>

                                <button type="submit" class="border px-3 py-2 text-sm {{ $afspraak->status === 'Afgerond' ? 'bg-gray-300 text-gray-600 cursor-not-allowed' : 'bg-gray-200' }}" {{ $afspraak->status === 'Afgerond' ? 'disabled' : '' }}>
                                    {{ $afspraak->status === 'Afgerond' ? 'Voltooid' : 'Afronden' }}
                                </button>

                                @if($afspraak->status === 'Afgerond')
                                    <a href="{{ route('monteur.bon', $afspraak->id) }}" target="_blank" class="border px-3 py-2 text-sm bg-gray-100">
                                        Bon bekijken
                                    </a>
                                @else
                                    <span class="border px-3 py-2 text-sm bg-gray-100 text-gray-500 cursor-not-allowed">
                                        Bon bekijken
                                    </span>
                                @endif
                            </form>
                        </div>
                    @endforeach

                    @if($afspraken->isEmpty())
                        <div class="border p-4">
                            <p class="text-sm text-gray-600">Er zijn momenteel geen afspraken in het systeem.</p>
                        </div>
                    @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>