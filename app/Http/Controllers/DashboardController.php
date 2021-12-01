<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('planning'))
        {
            return view('planning.planningdashboard');
        }
        elseif(Auth::user()->hasRole('record'))
        {
            return view('records.recorddashboard');
        }
        elseif(Auth::user()->hasRole('bac'))
        {
            return view('bac.bacdashboard');
        }
        elseif(Auth::user()->hasRole('admin'))
        {
            return view('admin.dashboard');
        }
        elseif(Auth::user()->hasRole('user'))
        {
            return view('users.userdashboard');
        }
    }
    
    public function elementary()
    {
        return view('planning.elementary.index');
    }
    public function secondary()
    {
        return view('planning.secondary.index');
    }
    public function integrated()
    {
        return view('planning.integrated.index');
    }
    public function private()
    {
        return view('planning.private.index');
    }
}
