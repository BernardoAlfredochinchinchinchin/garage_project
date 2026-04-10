@php
if (auth()->user()->role !== 'admin') {
    abort(403, 'Je mag hier niet komen hé !');
}
@endphp

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

                    @if(session('success'))
                        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-2">Datum</th>
                                <th class="border p-2">Klant Naam</th>
                                <th class="border p-2">Kenteken</th>
                                <th class="border p-2">Status</th>
                                <th class="border p-2">Actie</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($afspraken as $afspraak)
                                <tr class="hover:bg-gray-50">
                                    <td class="border p-2">
                                        {{ \Carbon\Carbon::parse($afspraak->datum)->format('d-m-Y') }}
                                    </td>
                                    <td class="border p-2">{{ $afspraak->naam }}</td>
                                    <td class="border p-2">{{ strtoupper($afspraak->kenteken) }}</td>

                                    {{-- Huidige status met kleur --}}
                                    <td class="border p-2">
                                        @if($afspraak->status === 'goedgekeurd')
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-sm">
                                                Goedgekeurd
                                            </span>
                                        @elseif($afspraak->status === 'afgekeurd')
                                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded text-sm">
                                                Afgekeurd
                                            </span>

                                         @elseif($afspraak->status === 'Afgerond')
                                             <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-sm">
                                                 Afgerond
                                             </span>
                                           

                                        @elseif($afspraak->status === 'Betaald')
                                            <span class="px-2 py-1 bg-blue-100 text-green-800 rounded text-sm">
                                                Betaald
                                            </span>
                                            
                                        @else
                                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded text-sm">
                                                In Afwachting
                                            </span>
                                        @endif

                                        
                                    </td>


                                    <td class="border p-2">
                                        <form action="{{ route('receptionist.afspraak.updateStatus', $afspraak->id) }}" 
                                              method="POST" 
                                              class="flex items-center gap-2">
                                            @csrf
                                            @method('PATCH')
                                    @if($afspraak->status !== 'Betaald' && $afspraak->status !== 'Afgerond')

                                            <select name="status" class="border rounded p-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300" {{ $afspraak->status === 'Betaald' ? '' : '' }}>
                                                <option value="in afwachting" {{ $afspraak->status === 'in afwachting' ? 'selected' : '' }}>
                                                    In Afwachting
                                                </option>
                                                <option value="goedgekeurd" {{ $afspraak->status === 'goedgekeurd' ? 'selected' : '' }}>
                                                    Goedgekeurd
                                                </option>
                                                <option value="afgekeurd" {{ $afspraak->status === 'afgekeurd' ? 'selected' : '' }}>
                                                    Afgekeurd
                                                </option>
                                            </select>
                                                            @endif

                                            
                                    @if($afspraak->status !== 'Betaald' && $afspraak->status !== 'Afgerond')
                                            <button type="submit" 
                                                    class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-3 py-1 rounded ">
                                                Opslaan
                                            </button>
                                        @endif
                                        </form>
                                    </td>
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