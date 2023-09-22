<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pet as PetModel;

class Pet extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PetModel::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!$request->name || !$request->type) {
            return response()->json(['error' => 'error'], 400);
        }

        // echo $request->name;
        // echo $request->type;

        return PetModel::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return PetModel::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $find = PetModel::findOrFail($id);

        $find->update($request->all());

        return $find;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return PetModel::destroy($id);
    }
}
