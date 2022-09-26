<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
 
        $foods = Food::create($request->all());
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
