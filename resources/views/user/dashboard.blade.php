<!-- resources/views/user/dashboard.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Mijn Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-bold">
                    Welkom, {{ $user->name }}! 👋
                </h3>
                <p class="text-gray-500">
                    Dit is jouw persoonlijke dashboard.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>