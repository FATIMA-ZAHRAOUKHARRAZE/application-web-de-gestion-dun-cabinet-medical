<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('./css/login.css')}}">
</head>
<body>
	
	<div id="mainContainer">
        <div class="">
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-6 col-xs-12 d-none d-lg-block d-md-block">
            <div id="mainBgn" style="background-image: url('img/login.jpg');">     
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="p-4 centerOnMobile" >
              <div class="formContainer">
                <h2 class="p-2 h4 text-center"><i class="fas fa-lock me-2"></i> Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <div class="form-floating my-3 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <h4>  <i class="fa-solid fa-user"></i>username</h4>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                               
                                <strong>{{ $message }}</strong>
                              
                            </span>
                        @enderror
					</div>

                    <div class="form-floating validate-input" data-validate="Password is required">
                        <h4> <i class="fa-solid fa-key"></i>Password</h4>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                           
                        </div>
                        <div id="btnHolder">

                            <button  type="submit" class="btn btn-lg btn-primary mt-3 w-100">
                                 
                                {{ __('Login') }}
                                </button>
                            
                        </div>
                    </form>
                   
        </div>
    </div>
</div>
</body>

<script src="{{asset('js/bootstrap.min.js')}}"></script>
</html>
