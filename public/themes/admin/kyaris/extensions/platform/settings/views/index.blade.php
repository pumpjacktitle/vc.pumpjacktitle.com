@extends('layouts/fixed-top-left-sidebar')

{{-- Page title --}}
@section('pageTitle')
	@parent
	: {{ trans('platform/settings::general.title') }}
@stop

{{-- Page content --}}
@section('content')

{{-- Page header --}}
<div class="m-b-md">
	<h3 class="m-b-none">Manage Your System Settings - <small>{{ $namespace['name'] }}</small></h3>
</div>

<form class="form-horizontal" action="{{ Request::fullUrl() }}" method="POST" accept-char="UTF-8">

	{{-- CSRF Token --}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<ul class="nav nav-pills">
	@foreach ($namespaces as $_namespace)
		<li class="{{ $_namespace['slug'] == $namespace['slug'] ? 'active' : '' }}">
			<a href="{{ URL::toAdmin("settings/edit/{$_namespace['slug']}") }}">{{ $_namespace['name'] }}</a>
		</li>
	@endforeach
	</ul>

	<div class="padder bg-white m-t-md">
		{{-- Tabs content --}}
		<div class="wrapper">

			@if ($namespace['groups'])

				@foreach ($namespace['groups'] as $i => $group)
				<fieldset>
					<legend>{{ $group['name'] }}</legend>
					@if ($group['settings'])
						@each('platform/settings::form', $group['settings'], 'setting')
					@else
						<h3>{{ trans('platform/settings::general.no_settings', array('group' => $group['key'], 'namespace' => $namespace['key'])) }}</h3>
					@endif
					</fieldset>
				@endforeach

			@else
				<h3>{{ trans('platform/settings::general.no_groups', array('namespace' => $namespace['key'])) }}</h3>
			@endif

			{{-- Form actions --}}
			<div class="form-group">

				<div class="col-lg-offset-3 col-lg-9">
					<button class="btn btn-success" type="submit">{{{ trans('button.save') }}}</button>
				</div>

			</div>

		</div>
	</div>

</form>

@stop
