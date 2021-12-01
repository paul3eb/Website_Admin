@extends('templates.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">User Data</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <br/>
                    <a href="{{ route('users.create') }}" class="btn btn-lg btn-success" role="button">Add Users</a>
                    <br/><br/>  
                    {{-- @if (session('success'))
                    <div class="alert alert-success" role="alert"> 
                        {{ session('success') }}
                    </div> 
                @endif --}}
                    </div>
                    <div class="card-body p-0">
                        <table class="table projects table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th style="width: 30%">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <a>
                                                {{ $user->name }}
                                            </a>
                                        </td>
                                            <td>
                                                <a>
                                                    {{ $user->email }}
                                                </a>
                                            </td>
                                        <td class="project-actions text-left">
                                            <a class="btn btn-info btn-sm" href="{{ route('users.edit', $user->id) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                    <form method="POST" action="{{ route('users.destroy',$user->id) }}" accept-charset="UTF-8" style="display:inline">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete User" 
                                        onclick="return confirm('Are you sure you want to delete?')
                                            event.preventDefault();
                                            document.getElementById('delete-user-form-{{ $user->id }}').submit()">
                                            <i class="fas fa-trash">
                                            </i>
                                             Delete
                                        </button>
                                    </form>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                            
                        </table>
                        
                    </div>
                    
                </div>
                {{ $users->links() }}
            </div>
          </div>
          @include('sweetalert::alert')
        </div>
    </section>
    
@endsection