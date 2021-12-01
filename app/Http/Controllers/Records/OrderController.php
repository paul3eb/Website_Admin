<?php

namespace App\Http\Controllers\Records;

use Illuminate\Http\Request;
use App\Models\Records\Order;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $orders = DB::table('invitations')->orderBy('id','desc')->paginate(10);
        return view('records.order.index', compact('orders'));
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
            $orders = DB::table('orders')->where('id', 'like', '%'.$search.'%')
                                                ->orWhere('title', 'like', '%'.$search.'%')
                                                ->orderBy($sort_by, $sort_type)
                                                ->paginate(10);
            return view('records.order.partials.form', compact('orders'));
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
            $data = new Order;

        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename =  $request->title.'.'.$extension;
            $file->move('records/order/', $filename);
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
        $data=Order::find($id);
        return view('records.order.view',compact('data'));
    }

    // Show the form for editing the specified resource.
    public function edit(Request $request)
    {
        $id = $request->id;
		$data = Order::find($id);
		return response()->json($data);
    }

   // Update the specified resource in storage.
    public function update(Request $request)
    {
       // Save file to the storage.
       $order = Order::findOrfail($request->id);
       if($request->hasfile('edit_file'))
       {
           $destination = 'records/invitation/'.$order->file;
           if(File::exists($destination))
           {
           File::delete($destination);
           }
           $file = $request->file('edit_file');
           $extention = $file->getClientOriginalExtension();
           $filename = $request->edit_title.'.'.$extention;
           $file->move('records/order/', $filename);
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
        $data = Order::find($id); 
        $destination = 'records/order/'.$data->file; 
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $data->delete();
    }

    // Download the specified date from the storage.
    public function download($file)
    {
        return response()->download(public_path('records/order/'.$file));
    }
}
