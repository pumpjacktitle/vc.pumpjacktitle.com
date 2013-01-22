@extends('templates/default')

@section('title')
{{ Lang::get('platform/users::groups/general.title') }}
@stop

@section('assets')

@stop

@section('scripts')

@stop

@section('content')
<div class="page-header">
	<h3>
		{{ Lang::get('platform/users::groups/form.edit.legend') }}

		<small>{{ Lang::get('platform/users::groups/form.edit.summary') }}</small>

		<div class="pull-right">
			<a href="{{ URL::to(ADMIN_URI . '/users/groups') }}" class="btn btn-inverse btn-small">{{ Lang::get('button.back') }}</a>
		</div>
	</h3>
</div>
@stop