

<div class="register-box col-12" >
  <div class="card card-outline card-primary">
    <div class="card-body">
      <div>
        @isset($create)
          <h4 class="float-center">Register a new User</h4>
        @endisset
        @isset($edit)
          <h4 class="float-center">Edit User</h4>
        @endisset
       <br />
      </div>
      

      <form action="{{ route('users.create') }}" method="POST">
        @csrf
        <label for="name" class="form-label">Name</label>
        <div class="input-group mb-3"> 
          <input placeholder="Full name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" 
          value="@isset($user){{ $user->name }}@endisset"  autofocus >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
                    @error('name')
                          <span class="invalid-feedback" role="alert">
                              {{ $message }}
                          </span>
                    @enderror
        </div>
        <label for="name" class="form-label">Email</label>
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" 
          value="@isset($user){{ $user->email }}@endisset" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
                @error('email')
                      <span class="invalid-feedback" role="alert">
                          {{ $message }}
                      </span>
                @enderror
        </div>
        @isset($create)
        <label for="name" class="form-label">Password</label>
        <div class="input-group mb-3">
          <input name="password"  type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
        </div>
        @endisset
        <label for="name" class="form-label">Registered As:</label>
        <div class="input-group mb-3">
            <select name="role_id" type="role_id" class="form-control {{ $errors->has('roles') ? 'is-invalid' : '' }}" id="role_id">
             @foreach ($roles as $value=>$role)
             <option value="{{ $value }}" 
             {{ in_array($value, old('roles',[])) ? 'selected' : ''}}>
              {{ $role }}</option>
             @endforeach
            </select>
            <div class="input-group-text">
              <i class="fas fa-clipboard-check"></i> 
            </div>
                  @if($errors->has('roles'))
                  <div class="invalid-feedback" role="alert">
                      {{ $errors->first('roles') }}
                  </div>
                  @endif
          </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
            <a href="{{ route('dashboard.users') }}"class="btn  btn-danger float-right">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input name="name"type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name" 
                value="{{ old('name') }} @isset($user){{ $user->name }}@endisset" >
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" 
                value="{{ old('email') }}@isset($user){{ $user->email }}@endisset">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
                @isset($create)
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                @endisset
            
            <div class="mb-3">
                <label for="text">User Type</label>
                @foreach ($roles as $role)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" 
                        name="roles[]" value="{{ $role->id }}" id="{{ $role->name }}"
                        @isset($user) @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset>
                        <label for="{{ $role->name }}" class="form-check-label">
                        {{ $role->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Submit</button> --}}