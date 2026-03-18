<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Receptionist Dashboard - Alle Afspraken') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-2">Datum</th>
                                <th class="border p-2">Klant Naam</th>
                                <th class="border p-2">Kenteken</th>
                                <th class="border p-2">status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($afspraken as $afspraak)
                                <tr>
                                    <td class="border p-2">{{ \Carbon\Carbon::parse($afspraak->datum)->format('d-m-Y') }}</td>
                                    <td class="border p-2">{{ $afspraak->naam }}</td>
                                    <td class="border p-2">{{ strtoupper($afspraak->kenteken) }}</td>
                                     <td class="border p-2">{{ strtoupper($afspraak->status) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if($afspraken->isEmpty())
                        <p class="mt-4 text-gray-500">Er zijn momenteel geen afspraken in het systeem.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>