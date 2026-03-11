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
                        <p class="text-gray-600 mt-1">Overzicht van de ingeplande voertuigen en lopende werkzaamheden.</p>
                    </div>
                    <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        Terug naar dashboard
                    </a>
                </div>

                <div class="grid gap-4 md:grid-cols-3 mb-8">
                    <div class="border rounded-lg p-4 bg-gray-50">
                        <p class="text-sm text-gray-500">Afspraken vandaag</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">6</p>
                    </div>
                    <div class="border rounded-lg p-4 bg-gray-50">
                        <p class="text-sm text-gray-500">Voertuigen bezig</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">2</p>
                    </div>
                    <div class="border rounded-lg p-4 bg-gray-50">
                        <p class="text-sm text-gray-500">Klaar voor ophalen</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">1</p>
                    </div>
                </div>

                <div class="grid gap-4">
                    <div class="border rounded-lg p-5">
                        <div class="flex flex-col gap-3 md:flex-row md:items-start md:justify-between mb-3">
                            <div>
                                <h4 class="font-semibold text-lg">08:30 - Volkswagen Golf</h4>
                                <p class="text-sm text-gray-500">Onderhoudsbeurt en algemene controle</p>
                            </div>
                            <span class="inline-flex items-center rounded-full bg-amber-100 text-amber-800 text-sm font-medium px-3 py-1">Ingepland</span>
                        </div>
                        <p class="text-gray-600">Klant: Jan Jansen</p>
                        <p class="text-gray-600">Kenteken: AB-123-CD</p>
                        <p class="text-gray-600">Werk: Onderhoudsbeurt</p>
                        <p class="text-gray-600">Monteur: Kevin</p>
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="notitie-1">Werkplaatsnotitie</label>
                            <textarea id="notitie-1" class="w-full border border-gray-300 rounded-lg p-3 text-sm" rows="3" placeholder="Bijvoorbeeld: olie verversen en remmen controleren."></textarea>
                        </div>
                    </div>

                    <div class="border rounded-lg p-5">
                        <div class="flex flex-col gap-3 md:flex-row md:items-start md:justify-between mb-3">
                            <div>
                                <h4 class="font-semibold text-lg">10:00 - BMW 3 Serie</h4>
                                <p class="text-sm text-gray-500">Diagnose van motorstoring</p>
                            </div>
                            <span class="inline-flex items-center rounded-full bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1">Bezig</span>
                        </div>
                        <p class="text-gray-600">Klant: Pieter de Vries</p>
                        <p class="text-gray-600">Kenteken: XY-456-ZK</p>
                        <p class="text-gray-600">Werk: Diagnose motorstoring</p>
                        <p class="text-gray-600">Monteur: Ahmed</p>
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="notitie-2">Werkplaatsnotitie</label>
                            <textarea id="notitie-2" class="w-full border border-gray-300 rounded-lg p-3 text-sm" rows="3" placeholder="Bijvoorbeeld: foutcode uitlezen en proefrit uitvoeren."></textarea>
                        </div>
                    </div>

                    <div class="border rounded-lg p-5">
                        <div class="flex flex-col gap-3 md:flex-row md:items-start md:justify-between mb-3">
                            <div>
                                <h4 class="font-semibold text-lg">13:30 - Audi A4</h4>
                                <p class="text-sm text-gray-500">Voertuig gereed voor klant</p>
                            </div>
                            <span class="inline-flex items-center rounded-full bg-green-100 text-green-800 text-sm font-medium px-3 py-1">Klaar</span>
                        </div>
                        <p class="text-gray-600">Klant: Lisa Bakker</p>
                        <p class="text-gray-600">Kenteken: KL-908-MN</p>
                        <p class="text-gray-600">Werk: Remblokken vervangen</p>
                        <p class="text-gray-600">Monteur: Daan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>