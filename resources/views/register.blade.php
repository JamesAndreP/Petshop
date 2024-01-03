@extends('register-template')
@section('title', 'Register')
@section('content')
    <form 
                    id="registration_form" 
                    class="login100-form validate-form" 
                    action="{{url('/register')}}"
                    method="post"
					enctype="multipart/form-data"
                >
					@csrf
					<span class="login100-form-title">
						Member Registration
					</span>
					@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<x-error />
					<div class="wrap-input100 validate-input" data-validate = "Avatar is required">
						<input class="file-upload" type="file" name="avatar" required="required" multiple accept="image/png, image/gif, image/jpeg, image/jpg" />
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username" required="required" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" id="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Re-enter Password">
						<input class="input100" type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" oninput="checkSamePassword()">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                        <span id="password_error" class="error-message"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Fullname is required">
						<input class="input100" type="text" name="fullname" placeholder="Full Name" required="required" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Email is required. Ex. example@mail.com">
						<input class="input100" type="email" name="email" placeholder="example@mail.com" required="required" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
                            <i class="fa fa-envelope"></i>
                        </span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Contact is required">
						<input class="input100" type="text" name="contact" placeholder="Contact Number" required="required" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-address-book" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn" style="padding-bottom: 30px">
						<button id="submit_button" class="register-button" onclick="submitHandler()">
							Create Account
						</button>
                        {{-- <input type="button" value="Create Account" class="register-button" onclick="submitHandler()"> --}}
					</div>

					{{-- <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div> --}}

					{{-- <div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div> --}}
				</form>
@endsection