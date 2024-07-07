<div class="sm:flex sm:gap-4">
    <div class="w-full sm:w-8/12 h-full mb-4">
        <x-card title="Recipe content">
            {{-- recipe title --}}
            <div class="mb-4">
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $recipe->title ?? '')"
                    placeholder="Enter a brief name for your recipe..." />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>

            {{-- recipe description --}}
            <div class="mb-4">
                <x-input-label for="description" :value="__('Description')" />
                <x-textarea id="description" name="description" type="text" class="mt-1 block w-full"
                    :value="old('description', $recipe->description ?? '')" placeholder="Provide a description of no more than two lines..." />
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>

            {{-- recipe ingredients --}}
            <div class="mb-4">
                <x-input-label for="ingredients" :value="__('Ingredients')" />
                <x-textarea id="ingredients" name="ingredients" type="text" class="mt-1 block w-full"
                    :value="old('ingredients', $recipe->ingredients ?? '')" rows="5" placeholder="Enter your ingredients, separated by a new line..." />
                <x-input-error class="mt-2" :messages="$errors->get('ingredients')" />
            </div>

            {{-- recipe steps --}}
            <div class="mb-4">
                <x-input-label for="steps" :value="__('Steps')" />
                <x-textarea id="steps" name="steps" type="text" class="mt-1 block w-full" :value="old('steps', $recipe->steps ?? '')"
                    rows="5" placeholder="Enter your recipe steps..." />
                <x-input-error class="mt-2" :messages="$errors->get('steps')" />
            </div>
        </x-card>

        <x-primary-button class="mt-4">{{ __('Save recipe') }}</x-primary-button>
    </div>

    <div class="w-full sm:w-4/12 h-full">
        <x-card class="mb-4" title="Recipe details">
            {{-- recipe category --}}
            <div class="mb-4">
                <x-input-label for="category" :value="__('Category')" />
                <x-select id="category" name="category" class="mt-1 block w-full" :value="old('category', $recipe->category_id ?? '')"
                    :options="$categories" />
                <x-input-error class="mt-2" :messages="$errors->get('category')" />
            </div>

            {{-- recipe duration --}}
            <div class="mb-4">
                <x-input-label for="duration" :value="__('Duration')" />
                <x-text-input id="duration" name="duration" type="text" class="mt-1 block w-full" :value="old('duration', $recipe->duration ?? '')"
                    placeholder="E.g. 2 hours 45 minutes..." />
                <x-input-error class="mt-2" :messages="$errors->get('duration')" />
            </div>
        </x-card>

        <x-card title="Recipe image">
            <x-image-input name="image" :current-image-path="$recipe->image_path ?? ''" />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </x-card>
    </div>
</div>
