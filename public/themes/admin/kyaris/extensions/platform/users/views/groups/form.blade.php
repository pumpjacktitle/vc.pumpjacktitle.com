@extends('layouts/fixed-top-left-sidebar')

{{-- Page title --}}
@section('pageTitle')
	@parent
	: {{{ trans("platform/users::groups/general.{$mode}") }}}
@stop

{{ Asset::queue('validate', 'js/validate/validate.min.js', 'jquery') }}

{{-- bread crumbs --}}
@section('breadCrumbs')
@parent

<li><a href="{{{ URL::toAdmin('users/groups') }}}">{{{ trans('platform/users::groups/general.title') }}}</a></li>
<li class="active">{{{ trans("platform/users::groups/general.{$mode}") }}} <small>{{{ $group->name }}}</small></li>
@stop

@section('content')

{{-- Page header --}}
<div class="m-b-md">
	<h3 class="m-b-none">{{{ trans("platform/users::groups/general.{$mode}") }}} <small>{{{ $group->name }}}</small></h3>
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
					@include('platform/users::groups/partials/general')
				</div>
				<div class="tab-pane fade" id="permissions">
					@include('platform/users::groups/partials/permissions')
				</div>
				<div class="tab-pane fade" id="attributes">
					@widget('platform/attributes::entity.form', array($group))
				</div>
			</div>
		</div>

		<section class="panel-footer">
			<button class="btn btn-primary" type="submit">{{{ trans("button.{$mode}") }}}</button>
			
			@if ($group->exists)
			<div class="btn-group">
				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Actions <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a data-toggle="modal" data-target="modal-confirm" href="{{ URL::toAdmin("users/groups/{$group->id}/delete") }}"><i class="fa fa-trash-o"></i>&nbsp;{{{ trans('button.delete') }}}</a></li>
				</ul>
			</div>
			@endif

			<a class="btn btn-default" href="{{{ URL::toAdmin('users') }}}">{{{ trans('button.cancel') }}}</a>
		</section>
	</section>
</form>

@stop
