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
			<p class="h4 text-center">Your account has been created.</p>

			<div class="line line-dashed line-lg pull-in"></div>
			
			<p>However, this website requires account activation by the administrator group.</p>
			<p>An e-mail has been sent to them and you will be informed when your account has been activated.</p>
		</div>

	</div>
</div>

@stop
