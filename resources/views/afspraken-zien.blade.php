<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Uw Afspraken') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Ingeplande afspraken</h3>
                    @if($afspraken->isEmpty())
                        <p>U heeft nog geen afspraken ingepland.</p>
                    @else
                        <ul class="space-y-4">
                            @foreach ($afspraken as $afspraak)
                                <div>
                                    <p><strong>Naam:</strong> {{ $afspraak->naam }}</p>
                                    <p><strong>Kenteken:</strong> {{ $afspraak->kenteken }}</p>
                                    <p><strong>Datum:</strong> {{ $afspraak->datum }}</p>
                                    <p><strong>Status:</strong> {{ $afspraak->status }}</p>

                                    @if ($afspraak->opmerkingen)
                                        <p><strong>Opmerkingen:</strong> {{ $afspraak->opmerkingen }}</p>
                                    @endif

                                    @if ($afspraak->status === 'Afgerond')
                                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    <a href="{{ route('monteur.betalen', $afspraak->id) }}">
                                        factuur betalen
                                    
                                </button>    
                                    @endif
                                    @if ($afspraak->status === 'Betaald')
                                        <button class="">
                                    <a href="{{ route('monteur.bon', $afspraak->id) }}" target="_blank" class="inline-flex items-center justify-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm transition">
                                        bon bekijken
                                    </a>
                                </button>    
                                    @endif

                                    {{-- 'taken' en 'materialen' worden NIET getoond aan de gebruiker --}}
                                </div>
                            @endforeach
                        </ul>
                    @endif
                    <div class="mt-6">
                        <a href="{{ route('afspraak.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Nieuwe afspraak maken
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>