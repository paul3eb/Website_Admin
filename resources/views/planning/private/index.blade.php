@extends('templates.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Private School</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Private School</li>
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
                  <a href="{{ route('private.create') }}" class="btn btn-lg btn-success" role="button">Add Private School</a>
                  </div>
                  <div class="card-body p-0">
                      <table class="table table-striped projects">
                          <thead>
                              <tr>
                                  <th>
                                      Name of the school
                                  </th>
                                  <th>
                                      Address of the school
                                  </th>
                                  <th>
                                    Email address
                                </th>
                                  <th style="width: 30%">
                                      Action
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                              {{-- @foreach($users as $user) --}}
                                  <tr>
                                      <td>
                                          <a>
                                              {{-- {{ $user->name }} --}}
                                          </a>
                                      </td>
                                      <td>
                                        <a>
                                            {{-- {{ $user->name }} --}}
                                        </a>
                                    </td>
                                          <td>
                                              <a>
                                                  {{-- {{ $user->email }} --}}
                                              </a>
                                          </td>
                                      <td class="project-actions text-left">
                                          <a class="btn btn-primary btn-sm" href="#">
                                              <i class="fas fa-folder">
                                              </i>
                                              View
                                          </a>
                                          <a class="btn btn-info btn-sm" href="{{ route('private.create') }}">
                                              <i class="fas fa-pencil-alt">
                                              </i>
                                              Edit
                                          </a>
                                          <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="#">
                                              <i class="fas fa-trash">
                                              </i>
                                              Delete
                                          </a>
                                      </td>
                                  </tr>
                              {{-- @endforeach --}}
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div>
      </div>
  </section>
@endsection