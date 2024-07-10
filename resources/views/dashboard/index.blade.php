<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if (!$recipes->count())
                <p class="text-gray-500 pt-2">No recipes available.</p>
            @endif

            <div class="grid col-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($recipes as $recipe)
                    <div
                        class="h-full w-full flex flex-col justify-between bg-white border border-gray-200 rounded-lg shadow">
                        <div>
                            <a href="/recipes/{{ $recipe->id }}">
                                <img class="rounded-t-lg w-full max-h-64 object-cover"
                                    src="{{ asset('storage/' . $recipe->image_path) }}" alt="" />
                            </a>

                            <div class="p-5">
                                <a href="/recipes/{{ $recipe->id }}">
                                    <h5 class="text-2xl font-bold tracking-tight text-gray-900">
                                        {{ $recipe->title }}
                                    </h5>
                                </a>

                                <a href="/recipes/{{ $recipe->id }}">
                                    <h6 class="mb-2 tracking-tight text-gray-500">
                                        {{ $recipe->user->name }}
                                    </h6>
                                </a>

                                <p class="font-normal line-clamp-4 text-gray-700">
                                    {{ $recipe->description }}
                                </p>
                            </div>
                        </div>

                        <div
                            class="border-t-2 px-5 border-neutral-100 py-3 flex justify-between justify-items-center items-center">
                            <ul class="flex gap-4 text-gray-400 font-medium">
                                <li class="flex gap-1">
                                    <x-icons.category /> {{ $recipe->category->name }}
                                </li>

                                <li class="flex gap-1">
                                    <x-icons.clock /> {{ $recipe->duration }}
                                </li>
                            </ul>

                            <x-secondary-link href="/recipes/{{ $recipe->id }}">
                                View
                                <x-icons.right-arrow />
                            </x-secondary-link>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $recipes->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
