<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container mt-5">
        <div class="card">
            <img src="{{ asset('frontend/mountain.jpg') }}" width="100%" height="60%" alt="">
        </div>
    </div>
</x-app-layout>
