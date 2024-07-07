<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Recipes') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">
                                Title
                            </th>
                            <th class="px-6 py-3">
                                Status
                            </th>
                            <th class="px-6 py-3">
                                Category
                            </th>
                            <th class="px-6 py-3">
                                Image
                            </th>
                            <th class="px-6 py-3">
                                Creation date
                            </th>
                            <th class="px-6 py-3">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($recipes as $recipe)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="/recipes/{{ $recipe->id }}/edit">{{ $recipe->title }}</a>
                                </td>
                                <td class="px-6 py-4">
                                    {{-- TODO - approval flow --}}
                                    Created
                                </td>
                                <td class="px-6 py-4">
                                    {{ $recipe->category->name }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="/recipes/{{ $recipe->id }}/edit">
                                        <img class="rounded-lg max-w-28"
                                            src="{{ asset('storage/' . $recipe->image_path) }}" alt="" />
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $recipe->created_at->toFormattedDateString() }}
                                </td>
                                <td class="px-6 py-4">
                                    <x-secondary-link class="text-xs" href="/recipes/{{ $recipe->id }}/edit">
                                        Edit
                                    </x-secondary-link>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $recipes->links() }}
        </div>
    </div>
</x-app-layout>
