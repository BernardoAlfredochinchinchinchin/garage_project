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
                            @foreach($afspraken as $afspraak)
                                <li class="p-4 border rounded-lg shadow-sm">
                                    <p><strong>Naam:</strong> {{ $afspraak->naam }}</p>
                                    <p><strong>Kenteken:</strong> {{ $afspraak->kenteken }}</p>
                                    <p><strong>Status:</strong> {{ $afspraak->status }}</p>
                                    <p><strong>Datum:</strong> {{ \Carbon\Carbon::parse($afspraak->datum)->format('d-m-Y') }}</p>
                                </li>
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