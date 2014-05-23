@extends("layouts/auth")

{{ Asset::queue('parsley', 'js/parsley/parsley.min.js', 'jquery') }}

{{-- page title --}}
@section('pageTitle')
Sign into Your Account
@stop

@section('content')

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<form method="post" name="form-forgot-password" id="form-forgot-password" data-bootstrap-parsley>
			<section class="panel panel-default">
				<header class="panel-heading">
					<span class="h4">Forgot your password?</span>
				</header>
				<div class="panel-body">

					<p>
						To reset your password, enter the email address you use to sign in to PJT.
					</p>

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
					@endif
				
					<!-- email address -->
					<div class="form-group{{ $errors->has('email') ? ' has-error' : null }}">
						<div class="input-group input-group-lg">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input  id="email" name="email" type="text" class="form-control" data-parsley-required="true" data-type="email" data-parsley-error-message="Your email address is required" placeholder="Your Email Address">
						</div>
					</div>
				</div>
				
				<footer class="panel-footer text-right bg-light lter">
					<button type="submit" class="btn btn-success btn-s-xs">Submit</button>
					<a href="{{ URL::to('login') }}" class="btn btn-default btn-s-xs">Cancel</a>
				</footer>
			</section>
		</form>
	</div>
</div>

@stop
