@extends("layouts/auth")

{{-- page title --}}
@section('pageTitle')
Password Reset Sent
@stop

{{-- our conent --}}
@section('content')

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		
		<div class="well well-info">
			<p class="h4 text-center">Password Reset Sent Successfully!</p>

			<div class="line line-dashed line-lg pull-in"></div>
			
			<p>We’ve sent an email to <strong>{{ $user->email }}</strong> containing a temporary link that will allow you to reset your password for the next 24 hours.</p>
			<p>Please check your spam folder if the email doesn’t appear within a few minutes.</p>
		</div>

		<a href="{{ URL::to('login') }}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-sign-in"></i> &nbsp;Sign into Your Account</a>

	</div>
</div>

@stop
