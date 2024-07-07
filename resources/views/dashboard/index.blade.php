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
                            <a href="#">
                                <img class="rounded-t-lg w-full max-h-64 object-cover"
                                    src="{{ asset('storage/' . $recipe->image_path) }}" alt="" />
                            </a>

                            <div class="p-5">
                                <a href="#">
                                    <h5 class="text-2xl font-bold tracking-tight text-gray-900">
                                        {{ $recipe->title }}
                                    </h5>
                                </a>

                                <a href="#">
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
                                    <svg class="w-6 h-6 text-gray-400 aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5.005 11.19V12l6.998 4.042L19 12v-.81M5 16.15v.81L11.997 21l6.998-4.042v-.81M12.003 3 5.005 7.042l6.998 4.042L19 7.042 12.003 3Z" />
                                    </svg>

                                    {{ $recipe->category->name }}
                                </li>

                                <li class="flex gap-1">
                                    <svg class="w-6 h-6 text-gray-400 aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>

                                    {{ $recipe->duration }}
                                </li>
                            </ul>

                            <x-secondary-link href="#">
                                View
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
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
