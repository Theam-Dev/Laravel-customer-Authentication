@extends('layout.app')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    
    <div class="card">
      <div class="card-header">Log In</div>
      <div class="card-body">
        <form action="{{route('login.store')}}" method="POST">
          @csrf
          <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            <label for="email">Email:</label>
            <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" value="{{ old('email') }}" >
            
            @if($errors->has('email'))
            <span class="text-danger">
              {{ $errors->first('email') }}
            </span>
            @endif
          </div>
          <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
            @if($errors->has('password'))
            <span class="text-danger">
              {{ $errors->first('password') }}
            </span>
            @endif
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
    
  </div>
</div>
@endsection