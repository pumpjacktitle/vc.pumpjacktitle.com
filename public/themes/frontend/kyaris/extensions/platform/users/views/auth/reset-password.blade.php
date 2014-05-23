@extends("layouts/auth")

{{ Asset::queue('parsley', 'js/parsley/parsley.min.js', 'jquery') }}

{{-- page title --}}
@section('pageTitle')
Reset Your Password
@stop

@section('content')

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<form method="post" name="form-login" id="form-login">
			<section class="panel panel-default">
				<header class="panel-heading">
					<span class="h4">Reset Your Password</span>
				</header>
				<div class="panel-body">

					<p>
						Use the form below to create a new password. Your password can contain letters, numbers and special characters.
						<strong>No spaces</strong> are allowed. Make your password something that is easy for you to remember, but
						not obvious enough for others to guess.
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
				
					<!-- password -->
					<div class="form-group{{ $errors->has('password') ? ' has-error' : null }}">
						<input id="password" name="password" type="password" class="form-control" value="{{ Input::old('password') }}" data-parsley-required="true" data-parsley-required-error-message="Please enter your password." placeholder="Password">
						{{ $errors->first('password', '<span class="help-block">:message</span>')  }}
					</div>

					<!-- password_confirm -->
					<div class="form-group{{ $errors->has('password_confirm') ? ' has-error' : null }}">
						<input id="password_confirm" name="password_confirm" type="password" class="form-control" value="{{ Input::old('password_confirm') }}" data-parsley-required="true" data-parsley-equalto="#password" data-parsley-required-error-message="Please retype your Password." placeholder="Retype Password">
						{{ $errors->first('password_confirm', '<span class="help-block">:message</span>')  }}
					</div>
				</div>
				
				<footer class="panel-footer text-right bg-light lter">
					<button type="submit" class="btn btn-success btn-s-xs">Submit</button>
				</footer>
			</section>
		</form>
	</div>
</div>

@stop
