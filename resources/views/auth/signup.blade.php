@extends('layouts.master')

@section('master')
{{-- Displays Error Messages --}}
@if($errors->any())
  <div class="alert alert-danger" role="alert">
    <span>{{ $errors->first() }}</span>
  </div>
@endif
<div class="container">
  <row>
    <h1 class="col-md-4 col-md-offset-4">SIGNUP</h1>
  </row>
  <row>
    <div class="col-md-4 col-md-offset-4">
      {!! Form::open(['route' => 'signup.store']) !!}
        <div class="form-group">
          <label for="exampleInputEmail1">Enter an Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Enter your Name</label>
          <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="nameHelp" placeholder="Enter name">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Enter a Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password...">
        </div>
        <button type="submit" class="btn btn-primary">Create an Account</button>
      {!! Form::close() !!}
    </div>
  </row>
</div>
@endsection
