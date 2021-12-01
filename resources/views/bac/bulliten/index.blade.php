@extends('templates.master')
@section('content')

{{-- Add Invitation to Bid Modal --}}
<div id="AddBullitenModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Bid Bulliten</h4>
                <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
            </div>
            <form  method="POST" enctype="multipart/form-data" id="AddBullitenForm" class="form-horizontal" >
                @csrf
                <div class="modal-body">
                    <div class="form-group row add">
                        <label for="date" class="control-label col-sm-2">Date :</label>
                        <div class="col-sm-10">
                            <input type="date" class="date form-control" id="date" name="date" 
                            placeholder="Your date here"required>
                            <span class="text-danger error-text date_error"></span>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label for="title" class="control-label col-sm-2">Title :</label>
                        <div class="col-sm-10">
                            <input type="text" class="title form-control" id="title" name="title" 
                            placeholder="Your Title here" required>
                            <span class="text-danger error-text title_error"></span>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label for="file" class="control-label col-sm-2">File :</label>
                        <div class="col-sm-10">
                            <input type="file" class="file form-control" id="file" name="file" 
                            placeholder="Your Title here"required>
                           <span class="text-danger error-text file_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="add_Bulliten_btn"class="add_Bullitenbtn btn-primary">
                           <span class="fas fa-plus"></span> Save</button>
                        <button type="button"   class="btn btn-danger" data-bs-dismiss="modal">
                            <span class="fas fa-times"></span> Close</button>
                      </div>
                </div>
            </form>
      </div>
    </div>
  </div>
{{-- End -- Add Invitation to Bid Modal --}}

{{-- Edit Invitation to Bid Modal --}}
<div id="editBullitenModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Bid Bulliten</h4>
                <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                
            </div>
            <form  method="POST" enctype="multipart/form-data" id="editBullitenForm" class="form-horizontal" >
              @method('PATCH')
                @csrf
                <input type="text" name="id" id="id" hidden>
                <input type="text" name="pdf" id="pdf" hidden>
                <div class="modal-body">
                    <div class="form-group row add">
                        <label for="edit_date" class="control-label col-sm-2">Date :</label>
                        <div class="col-sm-10">
                            <input type="date" class="edit_date form-control" id="edit_date" name="edit_date" 
                            placeholder="Your date here"required>
                            <span class="text-danger error-text date_error"></span>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label for="edit_title" class="control-label col-sm-2">Title :</label>
                        <div class="col-sm-10">
                            <input type="text" class="edit_title form-control" id="edit_title" name="edit_title" 
                            placeholder="Your Title here" required>
                            <span class="text-danger error-text title_error"></span>
                        </div>
                    </div>
                    <div class="form-group row add">
                        <label for="edit_file" class="control-label col-sm-2">File :</label>
                        <div class="col-sm-10">
                            <input type="file" class="edit_file form-control" id="edit_file" name="edit_file" 
                            placeholder="Your Title here"required>
                           <span class="text-danger error-text file_error"></span>
                        </div>
                    </div>
                    <div class="mt-2" id="edit_pdf" hidden>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="edit_Bulliten_btn"class="edit_Bulliten btn btn-primary">
                           <span class="fas fa-plus"></span> Update</button>
                        <button type="button"   class="btn btn-danger" data-bs-dismiss="modal">
                            <span class="fas fa-times"></span> Close</button>
                      </div>
                </div>
            </form>
      </div>
    </div>
  </div>
{{-- End -- Edit Invitation to Bid Modal --}}
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Bid Bulliten</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Bid Bulliten</li>
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
                  <a href="#" class="btn btn-lg btn-success" role="button" data-bs-toggle="modal" data-bs-target="#AddBullitenModal">Add Bulliten</a> <br /><br />
                  <input type="text" id="search" placeholder="Search for...">
                </div>
                  <div class=" card-body p-0" id="datatable">
                     
                      <table class="table table-sm " id="table">
                          <thead>
                              <tr>
                                <th width="6%" class="sorting" data-sorting_type="desc" data-column_name="id" style="cursor:pointer">ID 
                                  <span id="id_icon" class="float-right ">
                                    <i class="bi bi-arrow-down-up text-muted"></i>
                                  </span>
                                </th>
                                <th>Date Posted</th>
                                <th class="sorting" data-sorting_type="desc" style="cursor:pointer"data-column_name="title">Name of Project 
                                  <span id="title_icon"class="float-right ">
                                    <i class="bi bi-arrow-down-up text-muted"></i>
                                  </span>
                                </th>
                                <th>File</th>
                                <th style="width: 30%">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            @include('bac.bulliten.partials.form')
                          </tbody>
                      </table>
                      <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                      <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                      <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="desc" />
                  </div>
              </div>
          </div>
           
           
        </div>
      </div>
  </section>

@endsection
@section('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
<script>
    $(document).ready(function(){

        //for Pagination teh Data.
        function fetch_data(page, sort_type, sort_by, search="") { 
            $.ajax({
            url: '{{ route('bulliten.create') }}?page='+page+'&sortby='+sort_by+'&sorttype='+sort_type+'&search='+search,
            success: function(data) 
            {
                $('tbody').html('');
                $('tbody').html(data);
            }
            });
        }

        //for Pagination the Data.
        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            var search = $('#search').val(); 
            var column_name = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();
            var page = $(this).attr('href').split('page=')[1];
            $('#hidden_page').val(page);
            fetch_data(page, sort_type, column_name, search);
        });

        // for search data.
        $(document).on('keyup', '#search', function(){
            var search = $('#search').val();  
            var column_name = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();
            var page = $('#hidden_page').val();
            fetch_data(page, sort_type, column_name, search);
        });

        // Use for Sorting Data.
        $(document).on('click', '.sorting', function(){
            var column_name = $(this).data('column_name');
            var order_type = $(this).data('sorting_type');
            var reverse_order = '';
            if(order_type == 'asc')
            {
                $(this).data('sorting_type', 'desc');
                reverse_order = 'desc';
                $('#'+column_name+'_icon').html('<i class="bi bi-arrow-down"></i>');
            }
            else
            {
                $(this).data('sorting_type', 'asc');
                reverse_order = 'asc';
                 $('#'+column_name+'_icon').html('<i class="bi bi-arrow-up"></i>');
            }
            $('#hidden_column_name').val(column_name);
            $('#hidden_sort_type').val(reverse_order);
            var page = $('#hidden_page').val();
            var search = $('#search').val();
            fetch_data(page, reverse_order, column_name, search);
        });

        // add new data ajax request.
            $("#AddBullitenForm").submit(function(e) {
                    e.preventDefault();
                    var column_name = $('#hidden_column_name').val();
                    var sort_type = $('#hidden_sort_type').val();
                    var page = $('#hidden_page').val();
                    const fd = new FormData(this);
                    $("#add_Bulliten_btn").text('');
                    $.ajax({
                      url: '{{ route('bulliten.store') }}',
                      method: 'POST',
                      data: fd,
                      cache: false,
                      contentType: false,
                      processData: false,
                      dataType: 'json',
                      success: function(response) {
                        if (response.status == 1) {
                          Swal.fire(
                            'Added!',
                            'Bulliten Added Successfully!',
                            'success'
                          )
                          fetch_data(page, sort_type, column_name);
                        }
                        $("#add_Bulliten_btn").text('Add Bulliten');
                        $("#AddBullitenForm")[0].reset();
                        $("#AddBullitenModal").modal('hide');
                        
                      }
                    });
                  });  

      // edit data ajax request
      $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        $.ajax({
          url: '{{ route('bulliten.edit','$data->id') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#edit_title").val(response.title);
            $("#edit_date").val(response.date);
            $("#edit_pdf").html(
              `<iframe src="/bac/bulliten/${response.file}" width="100" class="img-fluid img-thumbnail" > </iframe>`);
            $("#id").val(response.id);
            $("#pdf").val(response.file);
          }
        });
      });

      // update data ajax request
      $("#editBullitenForm").submit(function(e) {
        e.preventDefault();
        var column_name = $('#hidden_column_name').val();
        var sort_type = $('#hidden_sort_type').val();
        var page = $('#hidden_page').val();
        const fd = new FormData(this);
        $.ajax({
          url: '{{ route('bulliten.update','$bullitens->id') }}',
          method: "POST",
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 1) {
              Swal.fire(
                'Updated!',
                'Bulliten Updated Successfully!',
                'success'
              )
              fetch_data(page, sort_type, column_name);
            }
            $("#edit_Bulliten_btn").text('Update Bulliten');
            $("#editBullitenForm")[0].reset();
            $("#editBullitenModal").modal('hide');
          }
        });
      });

      // delete Data ajax request
      $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        var column_name = $('#hidden_column_name').val();
        var sort_type = $('#hidden_sort_type').val();
        var page = $('#hidden_page').val();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '{{ route('bulliten.destroy','$data->id') }}',
              method: 'delete',
              data: {
                id: id,
                _token: csrf
              },
              success: function(response) {
                console.log(response);
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                fetch_data(page, sort_type, column_name);
              }
            });
          }
        })
      });
    });
</script>
@endsection
