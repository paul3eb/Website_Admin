<?php

namespace App\Http\Controllers\Bac;

use App\Models\Bac\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TimelineController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $timelines = DB::table('timelines')->orderBy('id','desc')->paginate(10);
        return view('bac.timeline.index', compact('timelines'));
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
            $timelines = DB::table('timelines')->where('date', 'like', '%'.$search.'%')
                                                ->orWhere('title', 'like', '%'.$search.'%')
                                                ->orderBy($sort_by, $sort_type)
                                                ->paginate(10);
            return view('bac.timeline.partials.form', compact('timelines'));
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
            $data = new Timeline;

        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename =  $request->title.'.'.$extension;
            $file->move('bac/timeline/', $filename);
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
        $data=Timeline::find($id);
        return view('bac.timeline.view',compact('data'));
    }

    // Show the form for editing the specified resource.
    public function edit(Request $request)
    {
        $id = $request->id;
		$data = Timeline::find($id);
		return response()->json($data);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        // Save file to the storage.
        $timelines = Timeline::findOrfail($request->id);
        if($request->hasfile('edit_file'))
        {
            $destination = 'bac/timeline/'.$timelines->file;
            if(File::exists($destination))
            {
            File::delete($destination);
            }
            $file = $request->file('edit_file');
            $extention = $file->getClientOriginalExtension();
            $filename = $request->edit_title.'.'.$extention;
            $file->move('bac/timeline/', $filename);
            $timelines->file = $filename;
        }

        $timelines->date = $request->edit_date;
        $timelines->title = $request->edit_title;
		$timelines->update();
		return response()->json([
			'status' => 1,
        ]);
    }

    // Remove the specified resource from storage.
    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = Timeline::find($id); 
        $destination = 'bac/timeline/'.$data->file; 
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $data->delete();
    }

    // Download the specified date from the storage.
    public function download($file)
    {
        return response()->download(public_path('bac/timeline/'.$file));
    }
}
