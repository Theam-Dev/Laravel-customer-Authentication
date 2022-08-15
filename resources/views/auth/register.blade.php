@extends('layout.app')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card-header">Register</div>
    <div class="card">
      <div class="card-body">
        
        <form action="{{route('register.store')}}" method="post">
          @csrf
          <div class="form-group  {{ $errors->has('name') ? 'has-error' : ''}}">
            <label for="name">User Name:</label>
            <input type="text" class="form-control" placeholder="name" id="name" name="name" value="{{ old('name') }}" >
            
            @if($errors->has('name'))
            <span class="text-danger">
              {{ $errors->first('name') }}
            </span>
            @endif
          </div>
          <div class="form-group  {{ $errors->has('email') ? 'has-error' : ''}}">
            <label for="email">Email:</label>
            <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" value="{{ old('email') }}" >
            @if($errors->has('email'))
            <span class="text-danger">
              {{ $errors->first('email') }}
            </span>
            @endif
          </div>
          <div class="form-group  {{ $errors->has('password') ? 'has-error' : ''}}">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
            @if($errors->has('password'))
            <span class="text-danger">
              {{ $errors->first('password') }}
            </span>
            @endif
          </div>
          <div class="form-group  {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
            <label for="password_confirmation">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password_confirmation" id="password_confirmation" name="password_confirmation">
            @if($errors->has('password_confirmation'))
            <span class="text-danger">
              {{ $errors->first('password_confirmation') }}
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