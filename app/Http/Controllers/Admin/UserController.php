<?php

namespace App\Http\Controllers\Admin;


use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\StoreUserRequest;
use App\Providers\RouteServiceProvider;

class UserController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        return view('admin.users.index', ['users' => User::paginate(10)]);
    }

    // Show the form for creating a new resource.
    
    public function create()
    {
        return view('admin.users.create', ['roles'=> Role::pluck('name','id')]);
    }

    // Store a newly created resource in storage.
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();
        
        $user = User::create($validatedData);
        $user->attachRole($request->role_id);
        event(new Registered($user));
        $request->session()->flash('success', 'You have created the user');
        return redirect(route('dashboard.users'));
    }

    // Display the specified resource.
    public function show($id)
    {
        //
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        return view('admin.users.edit', [
            'roles'=> Role::pluck('name','id'),
            'user' => User::find($id)
        ]);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->except(['_token','roles']));
        $user->syncRoles([$request->role_id]);
        $request->session()->flash('success', 'You have edeted the user');
        return redirect(route('dashboard.users'));
    }

    // Remove the specified resource from storage.
    public function destroy($id, Request $request)
    {
        User::destroy($id);

        $request->session()->flash('success', 'You have deleted the user');

        return redirect(route('dashboard.users'));
    }
}
