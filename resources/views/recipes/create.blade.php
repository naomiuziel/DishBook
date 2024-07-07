<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Recipe') }}
        </h2>
    </x-slot>

    <form action="/recipes" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @include('recipes.partials.form-contents')
            </div>
        </div>
    </form>
</x-app-layout>
