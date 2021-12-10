<?php

namespace App\Http\Controllers\Bac;

use Illuminate\Http\Request;
use App\Models\Bac\Invitation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class InvitationController extends Controller
{
    //  Display a listing of the resource.
    public function index()
    {
        $invitations = DB::table('invitations')->orderBy('id','desc')->paginate(10);
        return view('bac.invitation.index', compact('invitations')); 
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
            $invitations = DB::table('invitations')->where('date', 'like', '%'.$search.'%')
                                                ->orWhere('title', 'like', '%'.$search.'%')
                                                ->orderBy($sort_by, $sort_type)
                                                ->paginate(10);
            return view('bac.invitation.partials.form', compact('invitations'));
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
            $data = new Invitation;

        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename =  $request->title.'.'.$extension;
            $file->move('bac/invitation/', $filename);
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
        $data=Invitation::find($id);
        return view('bac.invitation.view',compact('data'));
    }

    // Show the form for editing the specified resource.
    public function edit(Request $request) 
    {
		$id = $request->id;
		$data = Invitation::find($id);
		return response()->json($data);
	}

    // Update the specified resource in storage.
    public function update(Request $request)
    {
        // Save file to the storage.
        $invitation = Invitation::findOrfail($request->id);
        if($request->hasfile('edit_file'))
        {
            $destination = 'bac/invitation/'.$invitation->file;
            if(File::exists($destination))
            {
            File::delete($destination);
            }
            $file = $request->file('edit_file');
            $extention = $file->getClientOriginalExtension();
            $filename = $request->edit_title.'.'.$extention;
            $file->move('bac/invitation/', $filename);
            $invitation->file = $filename;
        }

        $invitation->date = $request->edit_date;
        $invitation->title = $request->edit_title;
		$invitation->update();
		return response()->json([
			'status' => 1,
        ]);
    }
   
    // Remove the specified resource from storage.
    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = Invitation::find($id); 
        $destination = 'bac/invitation/'.$data->file; 
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $data->delete();
    }
    
    // Download the specified date from the storage.
    public function download($file)
    {
        return response()->download(public_path('bac/invitation/'.$file));
    }
}
