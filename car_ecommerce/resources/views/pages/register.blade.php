@extends('layouts.master')







    @section('content')

    <style>

        #sticker-sticky-wrapper{
            background-color: #051922;
        }

        .limiter {
            width: 100%;
            margin: 70px auto;
        }
        .wrap-login100{
            margin-top: 50px;
        }
            </style>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(form/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Register
					</span>
				</div>

				<form class="login100-form validate-form" action="{{route('register-user')}}" method="POST">
                    @method('POST')
                    @csrf
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if (Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="name" value="{{old('name')}}" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>
                        <span class="text-danger">@error('name') {{$message}} @enderror</span>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" value="{{old('password')}}" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Address is required">
						<span class="label-input100">Address</span>
						<input class="input100" type="text" name="address" value="{{old('address')}}" placeholder="Enter address">
						<span class="focus-input100"></span>
					</div>
                    <span class="text-danger">@error('address') {{$message}} @enderror</span>

                    {{-- <form class="login100-form validate-form"> --}}
                        <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                            <span class="label-input100">Email</span>
                            <input class="input100" type="email" name="email" value="{{old('email')}}" placeholder="email">
                            <span class="focus-input100"></span>
                        </div>
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>

                        <div class="wrap-input100 validate-input m-b-26" data-validate="Phone is required">
                            <span class="label-input100">Phone</span>
                            <input class="input100" type="number" name="phone" value="{{old('phone')}}" placeholder="077......">
                            <span class="focus-input100"></span>
                        </div>
                        <span class="text-danger">@error('phone') {{$message}} @enderror</span>

					<div class="flex-sb-m w-full p-b-30">
						<div >
							{{-- <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me"> --}}
							<label >
								Do you Have an account ? <a style="color: orange" href="/login">Login</a>
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
							Register
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>




@endsection
