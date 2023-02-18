<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::latest()->paginate(10);
        return [
            "status" => 1,
            "data" => $foods
        ];
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $request->validate([
            'food' => 'required',
            'description' => 'required',
            'cuisine' => 'required',
            'dish-type' => 'required',
            'p-ingredient' => 'required',
            'ingredient' => 'required',
            'instructions' => 'required',
            'prep-time' => 'required',
            'cook-time' => 'required'
        ]);

        if($request->hasFile('image')){
           
            $name = time()."_".$request->file('image')->getClientOriginalName();
            $request->file('image')->move('images',  $name);

            
        }
 
        $foods = Food::create([
            'food' => $request->food,
            'description' => $request->description,
            'cuisine' => $request->cuisine,
            'dish-type' => $request->get('dish-type'),
            'p-ingredient' => $request->get('p-ingredient'),
            'ingredient' => $request->ingredient,
            'instructions' => $request->instructions,
            'prep-time' => $request->get('prep-time'),
            'cook-time' => $request->get('cook-time'),
            'image' => $request->hasFile('image')? asset("images/$name"): $request->image
        ]);
        return [
            "status" => 1,
            "data" => $foods
        ];
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $foods
     * @return \Illuminate\Http\Response
     */
    public function show(Food $foods)
    {
        return [
            "status" => 1,
            "data" =>$foods
        ];
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $foods
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $foods)
    {
        //
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $foods
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $foods)
    {
        $request->validate([
            'food' => 'required',
            'description' => 'required',
            'cuisine' => 'required',
            'dish-type' => 'required',
            'p-ingredient' => 'required',
            'ingredient' => 'required',
            'instructions' => 'required',
            'prep-time' => 'required',
            'cook-time' => 'required'
        ]);
 
        $foods->update($request->all());
 
        return [
            "status" => 1,
            "data" => $foods,
            "msg" => "foods updated successfully"
        ];
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $foods
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $foods, $id)
    {
        $data = Food::findOrFail($id);
        $data->delete();
        return [
            "status" => 1,
            "data" => $foods,
            "msg" => "food deleted successfully"
        ];
    }

    
}
