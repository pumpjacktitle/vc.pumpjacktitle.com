@extends("layouts/auth")

{{ Asset::queue('parsley', 'js/parsley/parsley.min.js', 'jquery') }}

{{-- page title --}}
@section('pageTitle')
Create a New Account
@stop

{{-- content --}}
@section('content')

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<form method="post" name="form-register" id="form-register" data-bootstrap-parsley>
			<section class="panel panel-default">
				<header class="panel-heading">
					<span class="h4">Create Your PJT Account</span>
				</header>
				<div class="panel-body">

					<p>
						One account is all you need to access our whole suite of industry leading tools and applications.
					</p>

					<div class="line line-dashed line-lg pull-in"></div>

					<div class="well well-sm bg-light lt">
						<p>
							<span class="font-bold">One Less Password to Remember...</span> <br>
							Creating your account couldn't be any easier. You can either sign up using your Google account or use the form below to create a new account.
							To use your existing Google account, just click the button below.
						</p>

						<div class="text-center">
							<a href="{{ URL::to('oauth/authorize/google') }}" class="btn btn-danger"><i class="fa fa-google-plus-square"></i> Use Your Google Account to Sign Up</a>
						</div>
					</div>

					<div class="line line-dashed line-lg pull-in"></div>

					<!-- first name -->
					<div class="form-group{{ $errors->has('first_name') ? ' has-error' : null }}">
						<input id="first_name" name="first_name" type="text" class="form-control input-lg" value="{{ Input::old('first_name') }}" data-parsley-required="true" data-parsley-error-message="Your first name is required" placeholder="First Name">
						{{ $errors->first('first_name', '<span class="help-block">:message</span>')  }}
					</div>

					<!-- last name -->
					<div class="form-group{{ $errors->has('last_name') ? ' has-error' : null }}">
						<input id="last_name" name="last_name" type="text" class="form-control input-lg" value="{{ Input::old('last_name') }}" data-parsley-required="true" data-parsley-error-message="Your Last Name is required" placeholder="Last Name">
						{{ $errors->first('last_name', '<span class="help-block">:message</span>')  }}
					</div>

					<!-- email address -->
					<div class="form-group{{ $errors->has('email') ? ' has-error' : null }}">
						<input id="email" name="email" type="text" class="form-control input-lg" value="{{ Input::old('email') }}" data-parsley-required="true" data-type="email" data-parsley-error-message="Your email address is required" placeholder="Your Email Address">
						{{ $errors->first('email', '<span class="help-block">:message</span>')  }}
					</div>
					
					<!-- password -->
					<div class="form-group{{ $errors->has('password') ? ' has-error' : null }}">
						<input id="password" name="password" type="password" class="form-control input-lg" value="{{ Input::old('password') }}" data-parsley-required="true" data-parsley-required-error-message="Please enter your password." placeholder="Password">
						{{ $errors->first('password', '<span class="help-block">:message</span>')  }}
					</div>

					<!-- password_confirm -->
					<div class="form-group{{ $errors->has('password_confirm') ? ' has-error' : null }}">
						<input id="password_confirm" name="password_confirm" type="password" class="form-control input-lg" value="{{ Input::old('password_confirm') }}" data-parsley-required="true" data-parsley-equalto="#password" data-parsley-required-error-message="Please retype your Password." placeholder="Retype Password">
						{{ $errors->first('password_confirm', '<span class="help-block">:message</span>')  }}
					</div>
				</div>
				
				<footer class="panel-footer text-right bg-light lter">
					<button type="submit" class="btn btn-success btn-s-xs">Create Account</button>
				</footer>
			</section>
		</form>
	</div>
</div>

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		
		<div class="well well-info">
			<p class="m-b-xs">
				<a href="{{ URL::to('login') }}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-sign-in"></i> &nbsp;Already Have an Account? Sign In</a>
			</p>
		</div>

	</div>
</div>

@stop
