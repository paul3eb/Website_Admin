

<div class="col-md-14">
  <div class="card card-outline card-primary">
    <div>
      <br />
      @isset($create)
      <h4><p class="login-box-msg">Add a new Division Advisory</p></h4>
      @endisset
      @isset($edit)
      <h4><p class="login-box-msg">Edit a new Division Advisory</p></h4>
      @endisset
    </div>


    @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="date">Date</label>
          <input name="date" type="date" class="form-control @error('date') is-invalid @enderror" id="date"  
          value="@isset($advisory){{ $advisory->date }}@endisset">
              @error('date')
              <span class="invalid-feedback" role="alert">
                  {{ $message }}
              </span>
              @enderror
        </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input name="title" id="title" type="text" class="form-control @error('title') is-invalid @enderror"
          value="@isset($advisory){{ $advisory->title }}@endisset" placeholder="Title">
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
                <iframe height="90px" width="90px" src="/records/advisory/{{ $advisory->file }}" Hidden></iframe>
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
        <a href="{{ route('dashboard.advisory') }}"class="btn  btn-danger float-right">Cancel</a>
      </div>
    </form>
  </div>
</div>









