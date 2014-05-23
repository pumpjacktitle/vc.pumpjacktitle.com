@extends('layouts/fixed-top-left-sidebar')

{{-- Page title --}}
@section('pageTitle')
	@parent
	: Complete
@stop

{{-- Inline scripts --}}
@section('scripts')
@if ($zipHash)
	<script>
		$(window).load(function() {
			setTimeout(function() {
				window.location = '{{ URL::toAdmin('operations/workshop/download/'.$zipHash) }}';
			}, 1000);
		});
	</script>
@endif
@parent
@stop

{{-- Page content --}}
@section('content')

{{-- Page header --}}
<div class="m-b-md">
	<div class="row">
		<div class="col-sm-6">
			<h3 class="m-b-none">Hold Up Sailor! <small>We're almost there...</small></h3>
		</div>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-body">
		@if ($zipHash)

			<p>
				Check your downloads folder, you should receive a zip file with your extension. Extract it and place it under your <kbd>extensiosn</kbd> or <kbd>workbench</kbd> folder on your server. Didn't get it? <a href="{{ URL::toAdmin('operations/workshop/download/'.$zipHash) }}">Try again</a>.
			</p>

			<h3>Placing under <kbd>extensions</kbd></h3>

			<p>
				After placing your extension under <kbd>extensions</kbd>, we provide a template for your <kbd>composer.json</kbd> autoload. Visit the <kbd>root.extensions.composer.json</kbd> to find out more.
			</p>

			<h3>Placing under <kbd>workbench</kbd></h3>

			<p>
				You may choose to handle your own autoloading. First, place your extension under <kbd>workbench</kbd>, visit it in the command line and run <kbd>composer install</kbd>.
			</p>

		@else

			<p>
				 Visit your extension in the <kbd>workbench</kbd> folder in the command line and run <kbd>composer install</kbd>.
			</p>

		@endif

		<p>
			Alternatively, we provide a template for your <kbd>composer.json</kbd> autoload. Visit the <kbd>root.workbench.composer.json</kbd> to find out more.
		</p>	
	</div>

	<div class="panel-footer">
		<div class="form-actions">
			<a href="{{ URL::toAdmin('operations/workshop') }}" class="btn btn-large @if($zipHash) btn-primary @endif">Back to Workshop</a>

			@if ( ! $zipHash)
				<a href="{{ URL::toAdmin("operations/extensions") }}" class="btn btn-large btn-primary">Continue to Install</a>
			@endif
		</div>
	</div>
</div>

@stop
