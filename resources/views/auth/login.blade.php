@extends('app')

@section('content')
<div class="container">
  {!! HTML::ul($errors->all()) !!}
  <div class="row">
    <div class="col-md-6">
    
          <form class="form-horizontal" action="/auth/login" method="POST">
           {!! csrf_field() !!}
          <fieldset>
            <div id="legend">
              <legend class="">Login</legend>
            </div>
              
            <div class="control-group">
              <label class="control-label" for="email">E-mail</label>
              <div class="controls">
                <input type="email" id="email" name="email" placeholder="" class="form-control input-lg">
                <p class="help-block"></p>
              </div>
            </div>
         
            <div class="control-group">
              <label class="control-label" for="password">Password</label>
              <div class="controls">
                <input type="password" id="password" name="password" placeholder="" class="form-control input-lg">
                <p class="help-block"> </p>
              </div>
            </div>
         
             <div class="control-group">
              <div class="controls">
                <button class="btn btn-success">Login</button>
                 <a class = "btn btn-success" href="{{ URL::to('auth/register')}}">Go to registration</a>
              </div>
            </div>
          </fieldset>
        </form>
    <a href="/login/facebook">Login in with Facebook</a>
    </div> 
  </div>
</div>
@stop