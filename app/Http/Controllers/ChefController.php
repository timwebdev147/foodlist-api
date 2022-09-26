<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $chefs = Chef::latest()->paginate(10);
        return [
            "status" => 1,
            "data" => $chefs
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
        //
        $request->validate([
            'chef' => 'required',
            'DOB' => 'required',
            'about' => 'required',
            'nationalty' => 'required',
            'specialty' => 'required',
            'YOE' => 'required',
            'image'  => 'required'
        ]);

        $chefs = Chef::create($request->all());
        return [
            "status" => 1,
            "data" => $chefs
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chef  $chefs
     * @return \Illuminate\Http\Response
     */
    public function show(Chef $chefs)
    {
        //
        return [
            "status" => 1,
            "data" =>$chefs
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chef  $chefs
     * @return \Illuminate\Http\Response
     */
    public function edit(Chef $chefs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chef  $chefs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chef $chefs)
    {
        //
        $request->validate([
            'chef' => 'required',
            'DOB' => 'required',
            'about' => 'required',
            'nationalty' => 'required',
            'specialty' => 'required',
            'YOE' => 'required',
            'image'  => 'required'
        ]);

        $chefs->update($request->all());
 
        return [
            "status" => 1,
            "data" => $chefs,
            "msg" => "foods updated successfully"
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Models\Chef  $chefs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chef $chefs, $id)
    {
        //
        $data = Chef::findOrFail($id);
        $data->delete();
        return [
            "status" => 1,
            "data" => $chefs,
            "msg" => "food deleted successfully"
        ];
    }
}
