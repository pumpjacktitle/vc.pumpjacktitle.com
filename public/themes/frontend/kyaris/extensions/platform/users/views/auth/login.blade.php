@extends("layouts/auth")

{{ Asset::queue('parsley', 'js/parsley/parsley.min.js', 'jquery') }}

{{-- page title --}}
@section('pageTitle')
Sign In
@parent
@stop

@section('content')

<div class="row" id="login-container">
	<div class="col-md-4 col-md-offset-4">
		<form method="post" name="form-login" id="form-login" data-bootstrap-parsley>
			<section class="panel panel-default">
				<header class="panel-heading">
					<span class="h4">
						<i class="fa fa-sign-in"></i> Sign into Your Account
					</span>
				</header>
				<div class="panel-body">

					<p>Enter your email and password into the form below to continue.</p>

					<div class="line line-dashed line-lg pull-in"></div>

					@if ($errors->any())
					<div class="alert alert-danger">
						<p class="h4">Oops, Something Went Wrong!</p>

						<ul class="m-t-sm">
							<li>
								{{ $errors->first(0, ":message") }}
							</li>
						</ul>
					</div>
					@elseif ($message = Session::get('success'))
					<div class="alert alert-success">
						{{ $message }}
					</div>
					@endif
				
					<!-- email address -->
					<div class="form-group{{ $errors->has('email') ? ' has-error' : null }}">
						<div class="input-group input-group-lg">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input  id="email" name="email" type="text" class="form-control" data-parsley-required="true" data-type="email" data-parsley-error-message="Your email address is required" placeholder="Your Email Address">
						</div>
					</div>
					
					<!-- password -->
					<div class="form-group{{ $errors->has('password') ? ' has-error' : null }}">
						<div class="input-group input-group-lg">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input  id="password" name="password" type="password" class="form-control" data-parsley-required="true" data-parsley-required-error-message="Please enter your password." placeholder="Password">
						</div>
					</div>
				</div>
				
				<footer class="panel-footer bg-light lt">
					<div class="row">
						<div class="col-md-6">
							<a class="btn" href="{{ URL::to('forgot-password') }}"><i class="fa fa-info-circle"></i>&nbsp;Forgot Your Password?</a>
						</div>

						<div class="col-md-6 text-right">
							<button type="submit" class="btn btn-success btn-s-xs">Submit</button>
						</div>
					</div>
				</footer>
			</section>
		</form>
	</div>
</div>

@stop
