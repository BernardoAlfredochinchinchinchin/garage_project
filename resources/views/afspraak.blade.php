<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .flatpickr-calendar.inline {
            box-shadow: none;
            border: none;
            background: transparent;
        }
    </style>

    <div class="py-12 flex items-center justify-center min-h-screen">
        <div class="w-full max-w-5xl bg-white rounded-lg shadow-sm p-10 relative">
            
            <div class="flex items-center mb-16 relative">
                <a href="{{ url('/dashboard') }}" class="px-8 py-2 border border-gray-400 rounded-3xl text-black-600 hover:bg-gray-100 transition duration-200 z-10">
                    Terug
                </a>
                <h1 class="text-3xl text-black-500 absolute left-1/2 transform -translate-x-1/2">
                    Vraag uw afspraak aan!
                </h1>
            </div>
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg text-center">
                    {{ session('success') }}
                </div>
            @endif
            test
            <form action="{{ route('afspraak.store') }}" method="POST" class="border border-gray-300 p-10 max-w-4xl mx-auto flex flex-col md:flex-row gap-12">
                @csrf
                <div class="flex-1 flex flex-col justify-between">
                    <div class="space-y-6">
                        <div>
                            <label for="naam" class="block text-black-500 mb-1">Naam:</label>
                            <input type="text" id="naam" name="naam" required class="w-full border border-gray-300 p-2 focus:ring-1 focus:ring-gray-400 outline-none transition">
                        </div>
                        <div>
                            <label for="kenteken" class="block text-black-500 mb-1">Kenteken:</label>
                            <input type="text" id="kenteken" name="kenteken" required class="w-full border border-gray-300 p-2 focus:ring-1 focus:ring-gray-400 outline-none transition">
                        </div>
                        <div>
                            <label for="opmerkingen" class="block text-black-500 mb-1">Opmerkingen (optioneel):</label>
                            <textarea id="opmerkingen" name="opmerkingen" rows="3" placeholder="Voer hier uw auto merk en model in, en waar u last van heeft..." class="w-full border border-gray-300 p-2 focus:ring-1 focus:ring-gray-400 outline-none transition resize-none">{{ old('opmerkingen') }}</textarea>
                        </div>
                    </div>
                    <div class="mt-8">
                        <button type="submit" class="px-10 py-2 border border-gray-400 rounded-lg text-black-600 hover:bg-gray-100 transition duration-200">
                            Aanvragen
                        </button>
                    </div>
                </div>
                <div class="w-full md:w-80 flex flex-col pt-6 md:pt-0 items-center">
                    <input type="hidden" id="gekozen_datum" name="datum" required>
                    <p class="text-sm text-black-500 leading-relaxed text-center">
                        Kies uw gewenste dag van de afspraak
                    </p> 
                    <div class="w-full border border-gray-300 flex items-center justify-center bg-gray-50 rounded-lg p-3 mt-2 mb-4">
                        <input type="text" id="inline-calendar" class="hidden">
                    </div>
                    <button type="button" id="kies-dag-btn" class="px-6 py-2 border border-gray-400 rounded-lg text-black-600 hover:bg-gray-100 transition duration-200 w-full">
                        Bevestig datum
                    </button>
                    <p id="gekozen-datum-text" class="text-sm font-semibold text-green-600 mt-3 hidden"></p>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/nl.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let tijdelijkeDatum = "";
            flatpickr("#inline-calendar", {
                inline: true,               
                minDate: "today",           
                locale: "nl",               
                onChange: function(selectedDates, dateStr, instance) {
                    tijdelijkeDatum = dateStr;
                    document.getElementById('gekozen_datum').value = dateStr;
                    document.getElementById('gekozen-datum-text').classList.add('hidden');
                }
            });
            document.getElementById('kies-dag-btn').addEventListener('click', function() {
                const textEl = document.getElementById('gekozen-datum-text');
                if(tijdelijkeDatum !== "") {
                    textEl.innerText = "Geselecteerd: " + tijdelijkeDatum;
                    textEl.classList.remove('hidden');
                } else {
                    alert("Klik eerst op een datum in de kalender.");
                }
            });
        });
    </script>
</x-app-layout>