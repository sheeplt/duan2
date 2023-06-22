<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dishes;
use App\Models\Category;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dishes::all();
        //$dishes = Dishes::where('name','=','Cơm Trắng') ->get();
        //dd($dishes);
        return view('dishes.index', [
            'dishes' => $dishes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dishes.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->file('image')->guessExtension();
        $newImageName = 'image'.time().'-'.$request->name.'-'.$request->image->extension();
        $request->validate([
            'name' => 'required|unique:dishes',
            'price' => 'required|integer|min:0',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);
        $request->image->move(public_path('images'), $newImageName);
        $dish = Dishes::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'descri' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'image_path' => $newImageName
        ]);

        $dish->save();
        return redirect('/dishes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dish = Dishes::find($id);
        //dd($dish);
        $category = Category::find($dish->category_id);
        $dish->category =$category;
        return view('dishes.show')->with('dish', $dish);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dish = Dishes::find($id);
        //dd($dish);
        $categories = Category::all();

        return view('dishes.edit', compact('dish', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:dishes',
            'price' => 'required|integer|min:0'
        ]);
        $dish = Dishes::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'descri' => $request->input('description'),
                'category_id' => $request->input('category_id')
            ]);
        return redirect('/dishes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dish = Dishes::find($id);
        $dish->delete();   
        return redirect('/dishes');
    }
}
