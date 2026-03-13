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
                    <div class="border rounded-lg p-5">
                        <div class="flex flex-col gap-3 md:flex-row md:items-start md:justify-between mb-3">
                            <div>
                                <h4 class="font-semibold text-lg">08:30 - Volkswagen Golf</h4>
                                <p class="text-sm text-gray-500">Taak: Onderhoudsbeurt en algemene controle</p>
                            </div>
                            <span class="inline-flex items-center rounded-full text-sm font-medium px-3 py-1 bg-amber-100 text-amber-800">Ingepland</span>
                        </div>

                        <div class="grid gap-3 md:grid-cols-3 md:items-end">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="hours-1">Uren</label>
                                <input
                                    type="number"
                                    step="0.25"
                                    min="0.25"
                                    class="w-full border border-gray-300 rounded-lg p-2 text-sm"
                                    placeholder="Bijv. 1.5"
                                >
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="materials-1">Materialen</label>
                                <input
                                    id="materials-1"
                                    type="text"
                                    class="w-full border border-gray-300 rounded-lg p-2 text-sm"
                                    placeholder="Bijv. Olie 5W30, oliefilter"
                                >
                            </div>

                            <button type="button" class="inline-flex items-center justify-center px-4 py-2 bg-gray-300 text-gray-700 rounded-lg text-sm cursor-not-allowed" disabled>
                                Opslaan
                            </button>
                        </div>
                    </div>

                    <div class="border rounded-lg p-5">
                        <div class="flex flex-col gap-3 md:flex-row md:items-start md:justify-between mb-3">
                            <div>
                                <h4 class="font-semibold text-lg">10:00 - BMW 3 Serie</h4>
                                <p class="text-sm text-gray-500">Taak: Diagnose van motorstoring</p>
                            </div>
                            <span class="inline-flex items-center rounded-full text-sm font-medium px-3 py-1 bg-amber-100 text-blue-800">ingepland</span>
                        </div>

                        <div class="grid gap-3 md:grid-cols-3 md:items-end">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="hours-2">Uren</label>
                                <input
                                    type="number"
                                    step="0.25"
                                    min="0.25"
                                    class="w-full border border-gray-300 rounded-lg p-2 text-sm"
                                    placeholder="Bijv. 1.5"
                                >
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="materials-2">Materialen</label>
                                <input
                                    id="materials-2"
                                    type="text"
                                    class="w-full border border-gray-300 rounded-lg p-2 text-sm"
                                    placeholder="Bijv. Olie 5W30, oliefilter"
                                >
                            </div>

                            <button type="button" class="inline-flex items-center justify-center px-4 py-2 bg-gray-300 text-gray-700 rounded-lg text-sm cursor-not-allowed" disabled>
                                Opslaan
                            </button>
                        </div>
                    </div>

                    <div class="border rounded-lg p-5">
                        <div class="flex flex-col gap-3 md:flex-row md:items-start md:justify-between mb-3">
                            <div>
                                <h4 class="font-semibold text-lg">13:30 - Audi A4</h4>
                                <p class="text-sm text-gray-500">Taak: Remblokken vervangen</p>
                            </div>
                            <span class="inline-flex items-center rounded-full text-sm font-medium px-3 py-1 bg-green-100 text-green-800">Ingepland</span>
                        </div>

                        <div class="grid gap-3 md:grid-cols-3 md:items-end">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="hours-3">Uren</label>
                                <input

                                    type="number"
                                    step="0.25"
                                    min="0.25"
                                    class="w-full border border-gray-300 rounded-lg p-2 text-sm"
                                    placeholder="Bijv. 1.5"
                                >
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="materials-3">Materialen</label>
                                <input
                                    id="materials-3"
                                    type="text"
                                    class="w-full border border-gray-300 rounded-lg p-2 text-sm"
                                    placeholder="Bijv. Olie 5W30, oliefilter"
                                >
                            </div>

                            <button type="button" class="inline-flex items-center justify-center px-4 py-2 bg-gray-300 text-gray-700 rounded-lg text-sm cursor-not-allowed" disabled>
                                Opslaan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>