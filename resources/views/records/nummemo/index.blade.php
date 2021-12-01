@extends('templates.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Numbered Memorandum</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li> 
            <li class="breadcrumb-item active">Numbered Memorandum</li>
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
                  <a href="{{ route('memo.create') }}" class="btn btn-lg btn-success" role="button">Add Memorandum</a>
                  </div>
                  <div class="card-body p-0">
                      <table class="table table-striped projects">
                          <thead>
                              <tr>
                                  <th>Date</th>
                                  <th>Title</th>
                                  <th> File</th>
                                  <th style="width: 30%"> Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($num_memos as $num_memo)
                                  <tr>
                                      <td><a>{{ $num_memo ->date }}</a></td>
                                      <td><a>{{ $num_memo->title }}</a></td>
                                      <td><a>{{ $num_memo->file }}</a></td>
                                      <td class="project-actions text-left">
                                          <a class="btn btn-primary btn-sm" href="{{ route('memo.show', $num_memo->id) }}">
                                            <i class="fas fa-folder"></i>View
                                          </a>
                                          <a class="btn btn-info btn-sm" href="{{ route('memo.edit', $num_memo->id) }}">
                                            <i class="fas fa-pencil-alt"></i>Edit
                                          </a>

                                          <form method="POST" action="{{ route('memo.destroy',$num_memo->id) }} }}" accept-charset="UTF-8" style="display:inline">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete Memo" 
                                            onclick="return confirm('Are you sure you want to delete?')
                                                event.preventDefault();
                                                document.getElementById('delete-user-form-#').submit()">
                                                <i class="fas fa-trash"></i>Delete
                                            </button>
                                          </form>
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div>
        {{ $num_memos->links() }}
        @include('sweetalert::alert')
      </div>
  </section>

@endsection

