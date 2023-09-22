<x-app-layout class="bg-red-200">
    <x-slot name="header">
        <div class="bg-red-300 py-4">
            <div class="max-w-screen-xl mx-auto px-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-semibold text-white">{{ __('Dashboard') }}</h2>
                    <div class="flex space-x-4">
                        <a href="{{ route('home.index') }}" class="text-white hover:underline font-bold">Home</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-red-600 hover:underline font-bold">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="bg-red-200">
        <div class="max-w-screen-xl mx-auto px-4 py-12">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <p class="text-gray-700 text-lg">{{ __("You've successfully logged in!") }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
