<?php

namespace App\Http\Controllers\Planning;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Planning\Private_plan;
use Illuminate\Support\Facades\Validator;

class PrivateController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $privates = DB::table('private_plans')->orderBy('id','desc')->paginate(10);
        return view('planning.private.index', compact('privates'));
    }

    // Show the form for creating a new resource.
    public function create(Request $request)
    {
        if($request->ajax())
        {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $search = $request->get('search');
            $search = str_replace(" ", "%", $search);
            $privates = DB::table('private_plans')->where('id', 'like', '%'.$search.'%')
                                                ->orWhere('name_school', 'like', '%'.$search.'%')
                                                ->orderBy($sort_by, $sort_type)
                                                ->paginate(10);
            return view('planning.private.partials.form', compact('privates'));
        }
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name_school'=>'required',
            'address'=>'required',
            'email'=>'email|required',
            'school_head'=>'required',
            'file'=>'required'
       ]);

        if($validator->fails())
        {
            return response()->json(['status' => 0,'error'=>$validator->errors()->toArray()]);
        }
        else
        {
            $data = new Private_plan;

        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename =  $request->name_school.'.'.$extension;
            $file->move('planning/private/', $filename);
            $data->file = $filename;
            
        }
        
        // Other fields save to the storage.
        $data->name_school=$request->input('name_school');
        $data->address= $request->input('address');
        $data->email= $request->input('email');
        $data->school_head= $request->input('school_head');
        $data->save();
        return response()->json(['status' =>1]);
        }
    }

    // Display the specified resource.
    public function show($id)
    {
        //
    }

    // Show the form for editing the specified resource.
    public function edit(Request $request)
    {
        $id = $request->id;
		$data = Private_plan::find($id);
		return response()->json($data);
    }

    // Update the specified resource in storage.
    public function update(Request $request)
    {
         // Save file to the storage.
         $elementaries = Private_plan::findOrfail($request->id);
         if($request->hasfile('edit_file'))
         {
             $destination = 'planning/private/'.$elementaries->file;
             if(File::exists($destination))
             {
             File::delete($destination);
             }
             $file = $request->file('edit_file');
             $extention = $file->getClientOriginalExtension();
             $filename = $request->edit_school_name.'.'.$extention;
             $file->move('planning/private/', $filename);
             $elementaries->file = $filename;
         }
 
         $elementaries->name_school = $request->edit_school_name;
         $elementaries->address = $request->edit_address;
         $elementaries->email = $request->edit_email;
         $elementaries->school_head = $request->edit_school_head;
         $elementaries->update();
         return response()->json([
             'status' => 1,
         ]);
    }

    // Remove the specified resource from storage.
    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = Private_plan::find($id); 
        $destination = 'planning/private/'.$data->file; 
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $data->delete();
    }

    // Download the specified date from the storage.
    public function download($file)
    {
        return response()->download(public_path('records/nummemo/'.$file));
    }
}
