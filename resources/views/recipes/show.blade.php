<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
        <x-card class="mb-4">
            <div class="sm:flex sm:gap-4">
                <div class="w-full sm:w-4/12 h-full">
                    <img class="max-h-72 w-full object-cover rounded-lg"
                        src="{{ asset('storage/' . $recipe->image_path) }}" alt="" />
                </div>

                <div class="w-full sm:w-8/12 h-full">
                    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">{{ $recipe->title }}</h2>

                    <h6 class="mb-4 tracking-tight text-gray-500">
                        {{ $recipe->user->name }}
                    </h6>

                    <p class="font-normal text-gray-700 mb-4">
                        {{ $recipe->description }}
                    </p>

                    <ul class="flex gap-4 text-gray-400 font-medium">
                        <li class="flex gap-1">
                            <x-icons.category /> {{ $recipe->category->name }}
                        </li>

                        <li class="flex gap-1">
                            <x-icons.clock /> {{ $recipe->duration }}
                        </li>
                    </ul>

                </div>
            </div>
        </x-card>

        <div class="sm:flex sm:gap-4 mb-8">
            <div class="w-full sm:w-4/12 h-full">
                <x-card>
                    <h3 class="mb-2 font-semibold text-xl text-gray-800 leading-tight">Ingredients</h3>
                    <p>{!! nl2br(Purify::clean($recipe->ingredients)) !!}</p>
                </x-card>
            </div>

            <div class="w-full sm:w-8/12 h-full">
                <x-card>
                    <h3 class="mb-2 font-semibold text-xl text-gray-800 leading-tight">Steps</h3>
                    <p>{!! nl2br(Purify::clean($recipe->steps)) !!}</p>
                </x-card>
            </div>
        </div>
    </div>

</x-app-layout>
