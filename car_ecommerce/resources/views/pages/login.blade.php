@extends('layouts.master')







    @section('content')
    <style>

#sticker-sticky-wrapper{
    background-color: #051922;
}
    </style>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(form/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						LogIn
					</span>
				</div>

				<form class="login100-form validate-form" action="{{route('login-user')}}" method="POST">
                    @method('POST')
                    @csrf
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if (Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
					{{-- <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div> --}}
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" value="{{old('email')}}" placeholder="email">
                        <span class="focus-input100"></span>
                    </div>
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" value="{{old('password')}}" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">

							<label >
								<label >
                                    Don't Have an account ? <a style="color: orange" href="registeration">Register</a>
                                </label>
							</label>
						</div>

						<div>
							{{-- <a href="#" class="txt1">
								Forgot Password?
							</a> --}}
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>




@endsection
