<?php

namespace App\Http\Controllers\Planning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IntegratedController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        return view('planning.integrated.index');
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('planning.integrated.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        //
    }

    // Display the specified resource.
    public function show($id)
    {
        //
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        //
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        //
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        //
    }

    // Download the specified date from the storage.
    public function download($file)
    {
        return response()->download(public_path('records/nummemo/'.$file));
    }
}
