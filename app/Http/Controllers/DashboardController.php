<?php

namespace App\Http\Controllers;

use App\Models\Recipe;

class DashboardController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with(['user', 'category'])->latest()->paginate(9);

        return view('dashboard.index', [
            'recipes' => $recipes,
        ]);
    }
}
