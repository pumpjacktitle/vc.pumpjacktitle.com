@extends('layouts/fixed-top-left-sidebar')

{{-- Page title --}}
@section('pageTitle')
	@parent
	: {{{ trans("platform/users::users/general.{$mode}") }}}
@stop

{{ Asset::queue('validate', 'js/validate/validate.min.js', 'jquery') }}
{{ Asset::queue('bootstrap-datepicker', 'js/datepicker/datepicker.js', ['jquery', 'bootstrap']) }}
{{ Asset::queue('datepicker', 'js/datepicker/datepicker.css') }}
{{ Asset::queue('jasny', '/js/jasny-bootstrap/js/inputmask.js', ['jquery', 'bootstrap']) }}

@section('scripts')
@parent

<script type="text/javascript">
	$(document).ready(function( $ ) {
	  $('#user_profile_birthday').datepicker({
	  	format: "mm/d/yyyy",
	  	startView: 2,
	  	autoclose: true
	  });

	  $('#user_profile_birthday').inputmask({
	    mask: '99/99/9999'
	  })
	});
</script>

@stop

{{-- bread crumbs --}}
@section('breadCrumbs')
@parent

<li><a href="{{{ URL::toAdmin('users') }}}">{{{ trans('platform/users::users/general.title') }}}</a></li>
<li class="active">{{{ trans("platform/users::users/general.{$mode}") }}} <small>{{{ ($user->first_name and $user->last_name) ? " - {$user->first_name} {$user->last_name}" : $user->email }}}</small></li>
@stop

@section('content')

{{-- Page header --}}
<div class="m-b-md">
	<h3 class="m-b-none">{{{ trans("platform/users::users/general.{$mode}") }}} <small>{{{ ($user->first_name and $user->last_name) ? " - {$user->first_name} {$user->last_name}" : $user->email }}}</small></h3>
</div>

{{-- Content form --}}
<form id="user-form" action="{{ Request::fullUrl() }}" method="post" accept-char="UTF-8" autocomplete="off" class="form-horizontal validate">

	{{-- CSRF Token --}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<section class="panel panel-default">
		<header class="panel-heading text-right bg-light">
			<ul class="nav nav-tabs pull-left">
				<li class="active"><a href="#general" data-toggle="tab">{{{ trans('platform/users::general.tabs.general') }}}</a></li>
				<li class=""><a href="#permissions" data-toggle="tab">{{{ trans('platform/users::general.tabs.permissions') }}}</a></li>
				<li class=""><a href="#attributes" data-toggle="tab">{{{ trans('platform/users::general.tabs.attributes') }}}</a></li>
			</ul>
			<span class="hidden-sm">&nbsp;</span>
		</header>
		<div class="panel-body">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="general">
					@include('platform/users::users/partials/general')
				</div>
				<div class="tab-pane fade" id="permissions">
					@include('platform/users::users/partials/permissions')
				</div>
				<div class="tab-pane fade" id="attributes">
					@widget('platform/attributes::entity.form', array($user))
				</div>
			</div>
		</div>

		<section class="panel-footer">
			<button class="btn btn-primary" type="submit">{{{ trans("button.{$mode}") }}}</button>
			
			@if ($user->exists and Sentry::getUser()->id != $user->id)
			<div class="btn-group">
				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Actions <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a data-toggle="modal" data-target="modal-confirm" href="{{ URL::toAdmin("users/{$user->id}/delete") }}"><i class="fa fa-trash-o"></i>&nbsp;{{{ trans('button.delete') }}}</a></li>
				</ul>
			</div>
			@endif

			<a class="btn btn-default" href="{{{ URL::toAdmin('users') }}}">{{{ trans('button.cancel') }}}</a>
		</section>
	</section>
</form>

@stop
