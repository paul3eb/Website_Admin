
@foreach ($orders as $data)
<tr>
    <td>{{ $data->id }}</td>
    <td>{{ $data->date }}</td>
    <td>{{ $data->title }}</td>
    <td>{{ $data->file }}</td>
    <td class="project-actions text-left">
        <a class="btn btn-primary btn-sm "   href="{{ route('order.show', $data->id) }}"><i class="fas fa-folder"></i> View </a>
        <a class="editIcon btn btn-info btn-sm " id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#editOrderModal"><i class="fas fa-pencil-alt"></i> Edit </a>
        <a class="btn btn-sm btn-danger deleteIcon" id="{{ $data->id }}" ><i class="fas fa-trash"></i> Delete </a></td>            
</tr>   
@endforeach
<tr class="invitation_page_link">
<td colspan="6" align="right">{{ $orders->links() }}</td>
</tr>

{{-- <div class="col-md-14">
  <div class="card card-outline card-primary">
    <div>
      <br />
      @isset($create)
      <h4><p class="login-box-msg">Add a new DepEd Order</p></h4> 
      @endisset
      @isset($edit)
      <h4><p class="login-box-msg">Edit a new DepEd Order</p></h4>
      @endisset
    </div>
      
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="date">Date</label>
          <input name="date" type="date" class="form-control @error('date') is-invalid @enderror" id="date"  
          value="@isset($order){{ $order->date }}@endisset">
              @error('date')
              <span class="invalid-feedback" role="alert">
                  {{ $message }}
              </span>
              @enderror
        </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input name="title" id="title" type="text" class="form-control @error('title') is-invalid @enderror"
          value="@isset($order){{ $order->title }}@endisset" placeholder="Title">
            @error('title')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="form-group">
          <label for="file">File input</label>
          <input name="file" type="file"id="file" class="form-control-file @error('file') is-invalid @enderror">
              @isset($edit)
                <iframe height="90px" width="90px" src="/records/nummemo/{{ $order->file }}" Hidden></iframe>
              @endisset
              @error('file')
              <span class="invalid-feedback" role="alert">
                  {{ $message }}
              </span>
              @enderror
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('dashboard.order') }}"class="btn  btn-danger float-right">Cancel</a>
      </div>
  </div>
</div> --}}

















