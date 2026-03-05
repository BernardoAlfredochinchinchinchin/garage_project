<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-4">Welkom bij BM Performance</h1>
                    <p class="text-lg mb-2">Uw specialist in auto onderhoud en reparatie.</p>
                    <p>U bent succesvol ingelogd. Gebruik het menu om verder te gaan.</p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>