@extends("layouts/auth")

{{-- page title --}}
@section('pageTitle')
Welcome to PJT!
@stop

{{-- our conent --}}
@section('content')

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		
		<div class="well well-info">
			<p class="h4 text-center">Welcome to PJT!</p>

			<div class="line line-dashed line-lg pull-in"></div>
			
			<p>Thank you for registering, your account has been created.</p>
			<p>You may now login with your email and password.</p>
		</div>

		<a href="{{ URL::to('login') }}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-sign-in"></i> &nbsp;Sign into Your Account</a>

	</div>
</div>

@stop
