<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
      .pad{
        margin-left: 164px;
      }
      form{
          margin-left: 250px;
      }
      .btn-primary{
          margin-left: 15px;
      }

  </style>
</head>
<body>
    @extends('layouts.app')
    @if(session()->has('message'))
    <p class="alert alert-info">
        {{ session()->get('message') }}
    </p>
@endif
<form method="POST" action="{{ route('verify.store') }}">
    {{ csrf_field() }}
    <h1>Email Verification</h1>
    <p class="text-muted">
        we have sent you a code please enter and continue
        If you haven't received it, press <a href="{{ route('verify.resend') }}">Here</a>.
    </p>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="fa fa-lock"></i>
            </span>
        </div>
        <input name="two_factor_code" type="text" 
            class="form-control{{ $errors->has('two_factor_code') ? ' is-invalid' : '' }}" 
            required autofocus placeholder="Enter Code">
        @if($errors->has('two_factor_code'))
            <div class="invalid-feedback">
                {{ $errors->first('two_factor_code') }}
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-6">
            <button type="submit" class="btn btn-primary btns">
                Verify
            </button>
        </div>
    </div>
</form>

</body>
</html>
