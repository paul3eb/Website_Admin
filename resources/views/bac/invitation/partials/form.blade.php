
@foreach ($invitations as $data)
    <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->date }}</td>
        <td>{{ $data->title }}</td>
        <td>{{ $data->file }}</td>
        <td class="project-actions text-left">
            <a class="btn btn-primary btn-sm "   href="{{ route('invitation.show', $data->id) }}"><i class="fas fa-folder"></i> View </a>
            <a class="editIcon btn btn-info btn-sm " id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#editInvitationModal"><i class="fas fa-pencil-alt"></i> Edit </a>
            <a class="btn btn-sm btn-danger deleteIcon" id="{{ $data->id }}" ><i class="fas fa-trash"></i> Delete </a></td>            
    </tr>   
@endforeach
    <tr class="invitation_page_link">
    <td colspan="6" align="right">{{ $invitations->links() }}</td>
    </tr>









{{-- 
<div class="col-md-14">
  <div class="card card-outline card-primary">
    <br />
    <p class="login-box-msg">Add a new Invitation to Bid</p>

    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Date Upload</label>
          <input type="date" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Name of Project</label>
          <input type="text" class="form-control" placeholder="Name of Project">
        </div>
        <div class="form-group">
          <label for="exampleInputFile">File input</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text">Upload</span>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div> --}}









