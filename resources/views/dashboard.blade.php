<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('BMPerformance Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    
                    <h3 class="text-2xl font-bold text-center mb-8 border-b pb-4">Welkom bij BMPerformance</h3>

                    <div class="flex flex-col space-y-8">
                        
                        <div class="p-6 rounded-lg flex flex-col items-center text-center">
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">Afspraak maken</h4>
                            <p class="text-gray-600 mb-5">
                                Wilt u uw auto langsbrengen voor onderhoud, chiptuning of een andere service? Plan direct een datum en tijd in die u het beste uitkomt. Wij zorgen dat we klaarstaan voor uw voertuig.
                            </p>
                            <a href="{{ url('/afspraak-maken') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded transition duration-150 ease-in-out">
                                Afspraak maken
                            </a>
                        </div>

                        <div class="p-6 rounded-lg flex flex-col items-center text-center">
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">Uw Facturen</h4>
                            <p class="text-gray-600 mb-5">
                                Hier vindt u een compleet overzicht van al uw eerdere en openstaande facturen. U kunt ze eenvoudig bekijken, downloaden voor uw eigen administratie, of direct betalen.
                            </p>
                            <a href="{{ url('/facturen') }}" class="bg-gray-800 hover:bg-gray-900 text-white font-semibold py-2 px-6 rounded transition duration-150 ease-in-out">
                                Facturen bekijken
                            </a>
                        </div>

                        <div class="p-6 rounded-lg flex flex-col items-center text-center">
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">Reviews</h4>
                            <p class="text-gray-600 mb-5">
                                Bent u tevreden over het resultaat van uw auto? Of wilt u lezen wat andere autoliefhebbers over BMPerformance zeggen? Bekijk de ervaringen of laat zelf een review achter!
                            </p>
                            <a href="{{ url('/reviews') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded transition duration-150 ease-in-out">
                                Naar Reviews
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>