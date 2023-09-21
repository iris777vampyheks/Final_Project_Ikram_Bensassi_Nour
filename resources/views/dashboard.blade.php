<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 style="font-size: 24px; font-weight: bold; color: #333;" class="leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="flex">
                <a href="{{ route('home.index') }}" class="text-blue-600 hover:underline mr-4">
                    Home
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-600 hover:underline">Logout</button>
                </form>
            </div>
        </div>
    </x-slot>

    <div style="padding: 48px 0; background-color: #f5f5f5;">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <div style="background-color: #fff; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); border-radius: 8px;">
                <div style="padding: 24px; color: #333;">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
