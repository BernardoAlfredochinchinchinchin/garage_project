<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Monteur Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between mb-8">
                    <div>
                        <h3 class="text-2xl font-bold">Werkplaats overzicht</h3>
                        <p class="text-gray-600 mt-1">Takenoverzicht met uren en materialen</p>
                    </div>
                    <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        Terug naar dashboard
                    </a>
                </div>

                <div class="grid gap-4">
                    @foreach($afspraken as $afspraak)
                        <div class="border rounded-lg p-5">
                            <div class="flex flex-col gap-3 md:flex-row md:items-start md:justify-between mb-3">
                                <div>
                                    <h4 class="font-semibold text-lg">{{ \Carbon\Carbon::parse($afspraak->datum)->format('d-m-Y') }} - {{ $afspraak->naam }}</h4>
                                    <p class="text-sm text-gray-500">Kenteken: {{ strtoupper($afspraak->kenteken) }}</p>
                                </div>
                                <span class="inline-flex items-center rounded-full text-sm font-medium px-3 py-1 
                                    @if($afspraak->status === 'Ingepland') bg-amber-100 text-amber-800
                                    @elseif($afspraak->status === 'Afgerond') bg-green-100 text-green-800
                                    @elseif($afspraak->status === 'Afgekeurd') bg-red-100 text-red-800
                                    @else bg-gray-100 text-gray-800
                                    @endif
                                ">
                                    {{ ucfirst($afspraak->status) }}
                                </span>
                            </div>

                            <form class="grid gap-3 md:grid-cols-3 md:items-end" data-afspraak-id="{{ $afspraak->id }}" {{ $afspraak->status === 'Afgerond' ? 'style=pointer-events:none;opacity:0.6' : '' }}>
                                @csrf
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Uren</label>
                                    <input
                                        type="number"
                                        step="0.25"
                                        min="0.25"
                                        name="uren"
                                        class="w-full border border-gray-300 rounded-lg p-2 text-sm"
                                        placeholder="Bijv. 1.5"
                                        required
                                        {{ $afspraak->status === 'Afgerond' ? 'disabled' : '' }}
                                    >
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Materialen</label>
                                    <input
                                        type="text"
                                        name="materialen"
                                        class="w-full border border-gray-300 rounded-lg p-2 text-sm"
                                        placeholder="Bijv. Olie 5W30, oliefilter"
                                        required
                                        {{ $afspraak->status === 'Afgerond' ? 'disabled' : '' }}
                                    >
                                </div>

                                <button type="submit" class="inline-flex items-center justify-center px-4 py-2 {{ $afspraak->status === 'Afgerond' ? 'bg-gray-400 cursor-not-allowed' : 'bg-blue-600 hover:bg-blue-700' }} text-white rounded-lg text-sm transition" {{ $afspraak->status === 'Afgerond' ? 'disabled' : '' }}>
                                    {{ $afspraak->status === 'Afgerond' ? 'Voltooid' : 'Opslaan' }}
                                </button>
                            </form>
                        </div>
                    @endforeach

                    @if($afspraken->isEmpty())
                        <div class="border rounded-lg p-8 text-center">
                            <p class="text-gray-500">Er zijn momenteel geen afspraken in het systeem.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>