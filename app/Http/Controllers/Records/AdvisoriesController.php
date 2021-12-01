<?php

namespace App\Http\Controllers\Records;
use Illuminate\Http\Request;
use App\Models\Records\Advisory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AdvisoriesController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        return view('records.advisories.index', ['advisories' => Advisory::paginate(10)]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('records.advisories.create', ['advisories' => Advisory::all()]);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request -> validate([
            'date' => 'required',
            'title' => 'required',
            'file' => 'required'
        ]);

        $data=new Advisory();

        // Save file to the storage.
        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename =  $request->title.'.'.$extension;
            $file->move('records/advisory/', $filename);
            $data->file = $filename;
            
        }
        
        // Other fields save to the storage.
        $data->date=$request->date;
        $data->title= $request->title;
        $data->save();
        return redirect(route('dashboard.advisory'))->with('success', 'You have created the memorandum');
    }

    // Display the specified resource.
    public function show($id)
    {
        $data=Advisory::find($id);
        return view('records.advisories.view',compact('data'));
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        return view('records.advisories.edit',['advisory' => Advisory::find($id)]);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $request -> validate([
            'date' => 'required',
            'title' => 'required',
            'file' => 'required'
        ]);

        $data = Advisory::findOrFail($id);
        // Save file to the storage.
        if($request->hasfile('file'))
        {
            $destination = 'records/advisory/'.$data->file;
            if(File::exists($destination))
            {
            File::delete($destination);
            }
            $file = $request->file('file');
            $extention = $file->getClientOriginalExtension();
            $filename = $request->title.'.'.$extention;
            $file->move('records/advisory/', $filename);
            $data->file = $filename;
        }
        // Other fields save to the storage.
        $data->date=$request->date;
        $data->title= $request->title;
        $data->update();
        return redirect(route('dashboard.advisory'))->with('success', 'You have Edited the memorandum');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $data = Advisory::find($id); 
        $destination = 'records/advisory/'.$data->file; 
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $data->delete();
        return redirect(route('dashboard.advisory'))->with('success', 'You have Deleted the memorandum');
    }

    // Download the specified date from the storage.
    public function download(Request $request,$file)
    {
        return response()->download(public_path('records/advisory/'.$file));
    }
}
