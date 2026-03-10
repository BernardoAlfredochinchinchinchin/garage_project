<x-app-layout>
    <div class="py-12 flex items-center justify-center min-h-screen">
        
        <div class="w-full max-w-5xl bg-white rounded-lg shadow-sm p-10 relative">
            
            <div class="flex items-center mb-16 relative">
                <a href="{{ url('/dashboard') }}" class="px-8 py-2 border border-gray-400 rounded-3xl text-black-600 hover:bg-gray-100 transition duration-200 z-10">
                    Terug
                </a>
                
                <h1 class="text-3xl text-black-500 absolute left-1/2 transform -translate-x-1/2">
                    Maak uw afspraak!
                </h1>
            </div>

            <div class="border border-gray-300 p-10 max-w-3xl mx-auto flex flex-col md:flex-row gap-12">
                
                <form action="#" method="POST" class="flex-1 flex flex-col justify-between">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <label for="naam" class="block text-black-500 mb-1">Naam:</label>
                            <input type="text" id="naam" name="naam" class="w-full border border-gray-300 p-2 focus:ring-1 focus:ring-gray-400 outline-none transition">
                        </div>

                        <div>
                            <label for="kenteken" class="block text-black-500 mb-1">Kenteken:</label>
                            <input type="text" id="kenteken" name="kenteken" class="w-full border border-gray-300 p-2 focus:ring-1 focus:ring-gray-400 outline-none transition">
                        </div>
                    </div>

                    <div class="mt-8">
                        <button type="submit" class="px-10 py-2 border border-gray-400 rounded-lg text-black-600 hover:bg-gray-100 transition duration-200">
                            Versturen
                        </button>
                    </div>
                </form>

                <div class="w-64 flex flex-col pt-6 md:pt-0">
                    <div class="w-full aspect-square border border-gray-300 flex items-center justify-center text-black-500 mb-4 bg-gray-50 hover:bg-gray-100 cursor-pointer transition">
                        Agenda
                    </div>
                    <p class="text-sm text-black-500 leading-relaxed text-center md:text-left">
                        Kies uw gewenste dag<br>van de afspraak
                    </p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>