<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <a href="/home">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <h1 class="flex justify-center text-white text-3xl font-medium py-8 dark:hover:text-red-600 dark:focus:text-red-600">Perpustakaan Skomda</h1>
                </div>
            </div>
        </a>
    </div>
</x-app-layout>
