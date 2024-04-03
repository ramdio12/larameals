<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        return view('recipes.index',  [
            'recipes' => Recipe::latest()->filter(request(['category', 'search']))->paginate(8),
            'totalrecipes' => Recipe::count()
        ]);
        // return view('recipes.index', ['recipes' => Recipe::all()]);
    }
    public function show(Recipe $recipe)
    {
        return view('recipes.show', ['recipe' => $recipe]);
    }



    public function create()
    {
        return view('recipes.create');
    }
    public function store(Request $request)
    {
        // dd($request->file('photo'));
        $fields = $request->validate(

            [
                'title' => 'required',
                'description' => 'required',
                'ingredients' => 'required',
                'instructions' => 'required',
                'serving' => ['required', 'numeric'],
                'category' => 'required',
                'description' => 'required'
            ]
        );

        if ($request->hasFile('photo')) {
            $fields['photo']  = $request->file('photo')->store('recipephotos', 'public');
        }

        $fields['user_id'] = auth()->id();

        Recipe::create($fields);
        return redirect('/')->with('message', 'Recipe Created Successfully');
    }

    // read user's recipe
    public function manage()
    {
        return view('recipes.manage', ['recipes' => auth()->user()->recipes()->latest()->get()]);
    }

    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', ['recipe' => $recipe]);
    }
    public function update(Recipe $recipe, Request $request)
    {
        if ($recipe->user_id != auth()->id()) {
            abort(403, 'This is not your recipe');
        }
        $fields = $request->validate(

            [
                'title' => 'required',
                'description' => 'required',
                'ingredients' => 'required',
                'instructions' => 'required',
                'serving' => ['required', 'numeric'],
                'category' => 'required',
                'description' => 'required',
                'photo' => 'extensions:jpg,png'
            ]
        );

        if ($request->hasFile('photo')) {


            $fields['photo']  = $request->file('photo')->store('recipephotos', 'public');
        }

        $recipe->update($fields);
        return back()->with('message', 'Recipe Updated Successfully');
    }


    function delete(Recipe $recipe)
    {
        if ($recipe->user_id != auth()->id()) {
            abort(403, 'This is not your recipe');
        }

        $recipe->delete();
        return redirect('/')->with('message', 'Recipe Deleted Successfully');
    }
}
