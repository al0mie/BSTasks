@extends('app')

@section('content')
<div class="container">
  {!! HTML::ul($errors->all()) !!}
  <div class="row">
    <div class="col-md-6">
    
          <form class="form-horizontal" action="/auth/register" method="POST">
           {!! csrf_field() !!}
          <fieldset>
            <div id="legend">
              <legend class="">Registration</legend>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">First Name</label>
              <div class="controls">
                <input type="text" id="firstname" name="firstname" placeholder="" class="form-control input-lg">
                <p class="help-block">Username can contain only letters  without spaces</p>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="lastname">Last Name</label>
              <div class="controls">
                <input type="text" id="lastname" name="lastname" placeholder="" class="form-control input-lg">
                <p class="help-block">Last name contain onlu letters without spaces</p>
              </div>
            </div>
         
            <div class="control-group">
              <label class="control-label" for="email">E-mail</label>
              <div class="controls">
                <input type="email" id="email" name="email" placeholder="" class="form-control input-lg">
                <p class="help-block">Please provide your E-mail</p>
              </div>
            </div>
         
            <div class="control-group">
              <label class="control-label" for="password">Password</label>
              <div class="controls">
                <input type="password" id="password" name="password" placeholder="" class="form-control input-lg">
                <p class="help-block">Password should be at least 4 characters</p>
              </div>
            </div>
         
            <div class="control-group">
              <label class="control-label" for="password_confirmation">Password (Confirm)</label>
              <div class="controls">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="" class="form-control input-lg">
                <p class="help-block">Please confirm password</p>
              </div>
            </div>
         
            <div class="control-group">
              <div class="controls">
                <button class="btn btn-success">Register</button>
                  <a class = "btn btn-success" href="{{ URL::to('auth/login')}}">Go to login</a>
              </div>
            </div>
          </fieldset>
        </form>
    
    </div> 
  </div>
</div>
@stop