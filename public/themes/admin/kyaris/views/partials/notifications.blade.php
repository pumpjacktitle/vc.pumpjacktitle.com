@if ($errors->any())

	<script type="text/javascript">
		@if ($message = $errors->first(0, ':message'))
			$.jGrowl('{{ $message }}', { header: 'Oops...', position: 'center', sticky: true, theme: 'growl-error', });
		@else
			$.jGrowl("Please check the form below for errors", { header: 'Oops...', sticky: true, theme: 'growl-error', });
		@endif
	</script>

@endif

@if ( $success = Session::get('success'))
<script type="text/javascript">
   $.jGrowl('{{ $success }}', { theme: 'growl-success', position: 'center' });
</script>
@endif
