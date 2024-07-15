<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class RecipeController extends Controller
{
    public $validationRules = [
        'title' => ['required'],
        'description' => ['required'],
        'ingredients' => ['required'],
        'steps' => ['required'],
        'category' => ['required', 'exists:categories,id'],
        'duration' => ['required'],
        'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
    ];

    public function index(Request $request)
    {
        $recipes = $request
            ->user()
            ->recipes()
            ->with('category')
            ->latest()
            ->paginate(10);

        return view('recipes.index', [
            'recipes' => $recipes,
        ]);
    }

    public function show(Recipe $recipe)
    {
        $comments = $recipe->comments()->with('user')->latest()->get();

        return view('recipes.show', [
            'recipe' => $recipe,
            'comments' => $comments,
        ]);
    }

    public function create()
    {
        $categories = Category::get()->pluck('name', 'id');

        return view('recipes.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate($this->validationRules);

        $imagePath = null;

        if ($request->image) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Recipe::create([
            'user_id' => $request->user()->id,
            'category_id' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'steps' => $request->steps,
            'ingredients' => $request->ingredients,
            'duration' => $request->duration,
            'image_path' => $imagePath,
        ]);

        Session::flash('success', 'Thank you, your recipe has been saved successfully.');

        return redirect()->to('/recipes');
    }

    public function edit(Recipe $recipe)
    {
        Gate::authorize('update', $recipe);

        $categories = Category::get()->pluck('name', 'id');

        return view('recipes.edit', [
            'recipe' => $recipe,
            'categories' => $categories,
        ]);
    }

    public function update(Recipe $recipe, Request $request)
    {
        Gate::authorize('update', $recipe);

        $request->validate($this->validationRules);

        $imagePath = $recipe->image_path;

        if ($request->image) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $recipe->update([
            'category_id' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'steps' => $request->steps,
            'ingredients' => $request->ingredients,
            'duration' => $request->duration,
            'image_path' => $imagePath,
        ]);

        Session::flash('success', 'Thank you, your recipe has been updated successfully.');

        return redirect()->to('/recipes');
    }
}
