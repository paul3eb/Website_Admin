<?php

namespace App\Http\Controllers\Records;
use Illuminate\Http\Request;
use App\Models\Records\Advisory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdvisoriesController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $advisories = DB::table('advisories')->orderBy('id','desc')->paginate(10);
        return view('records.advisories.index', compact('advisories'));
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
            $advisories = DB::table('advisories')->where('id', 'like', '%'.$search.'%')
                                                ->orWhere('title', 'like', '%'.$search.'%')
                                                ->orderBy($sort_by, $sort_type)
                                                ->paginate(10);
            return view('records.advisories.partials.form', compact('advisories'));
        }
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'date'=>'required',
            'title'=>'required',
            'file'=>'required'
       ]);

        if($validator->fails())
        {
            return response()->json(['status' => 0,'error'=>$validator->errors()->toArray()]);
        }
        else
        {
            $data = new Advisory;

        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename =  $request->title.'.'.$extension;
            $file->move('records/advisory/', $filename);
            $data->file = $filename;
            
        }
        
        // Other fields save to the storage.
        $data->date=$request->input('date');
        $data->title= $request->input('title');
        $data->save();
        return response()->json(['status' =>1]);
        }
    }

    // Display the specified resource.
    public function show($id)
    {
        $data=Advisory::find($id);
        return view('records.advisories.view',compact('data'));
    }

    // Show the form for editing the specified resource.
    public function edit(Request $request)
    {
        $id = $request->id;
		$data = Advisory::find($id);
		return response()->json($data);
    }

    // Update the specified resource in storage.
    public function update(Request $request)
    {
        // Save file to the storage.
       $order = Advisory::findOrfail($request->id);
       if($request->hasfile('edit_file'))
       {
           $destination = 'records/advisory/'.$order->file;
           if(File::exists($destination))
           {
           File::delete($destination);
           }
           $file = $request->file('edit_file');
           $extention = $file->getClientOriginalExtension();
           $filename = $request->edit_title.'.'.$extention;
           $file->move('records/advisory/', $filename);
           $order->file = $filename;
       }

       $order->date = $request->edit_date;
       $order->title = $request->edit_title;
       $order->update();
       return response()->json([
           'status' => 1,
       ]);
    }

    // Remove the specified resource from storage.
    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = Advisory::find($id); 
        $destination = 'records/advisory/'.$data->file; 
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $data->delete();
    }

    // Download the specified date from the storage.
    public function download($file)
    {
        return response()->download(public_path('records/advisory/'.$file));
    }
}
