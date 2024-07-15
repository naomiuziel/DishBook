<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RecipeCommentController extends Controller
{
    public function store(Request $request, Recipe $recipe)
    {
        $request->validate([
            'comment' => ['required'],
        ]);

        Comment::create([
            'user_id' => $request->user()->id,
            'recipe_id' => $recipe->id,
            'comment' => $request->comment,
        ]);

        Session::flash('success', 'Thank you for submitting your comment.');

        return redirect()->back();
    }
}
