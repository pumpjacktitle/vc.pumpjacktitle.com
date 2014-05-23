@extends('layouts/fixed-top-left-sidebar')

{{-- Page title --}}
@section('pageTitle')
	@parent
	: {{{ trans("pjtitle/virtualcourthouse::counties/general.{$mode}") }}}
@stop

{{ Asset::queue('validate', 'js/validate/validate.min.js', 'jquery') }}

{{-- bread crumbs --}}
@section('breadCrumbs')
@parent

<li><a href="{{{ URL::toAdmin('vc/counties') }}}">{{{ trans('pjtitle/virtualcourthouse::counties/general.title') }}}</a></li>
<li class="active">{{{ trans("pjtitle/virtualcourthouse::counties/general.{$mode}") }}} <small>{{{ $county->name }}}</small></li>
@stop

@section('content')

{{-- Page header --}}
<div class="m-b-md">
	<h3 class="m-b-none">{{{ trans("pjtitle/virtualcourthouse::counties/general.{$mode}") }}} <small>{{{ $county->name }}}</small></h3>
</div>

{{-- Content form --}}
<form id="department-form" action="{{ Request::fullUrl() }}" method="post" accept-char="UTF-8" autocomplete="off" class="form-horizontal validate">

	{{-- CSRF Token --}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<section class="panel panel-default">
		<header class="panel-heading text-right bg-light">
			<ul class="nav nav-tabs pull-left">
				<li class="active"><a href="#general" data-toggle="tab">{{{ trans('pjtitle/virtualcourthouse::counties/general.tabs.general') }}}</a></li>
			</ul>
			<span class="hidden-sm">&nbsp;</span>
		</header>
		<div class="panel-body">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="general">
					@include('pjtitle/virtualcourthouse::counties/partials/general')
				</div>
			</div>
		</div>

		<section class="panel-footer">
			<button class="btn btn-primary" type="submit">{{{ trans("button.{$mode}") }}}</button>

			<a class="btn btn-default" href="{{{ URL::toAdmin('vc/counties') }}}">{{{ trans('button.cancel') }}}</a>
			
			@if ($county->exists)
			<a class="btn btn-danger pull-right" data-toggle="modal" data-target="modal-confirm" href="{{ URL::toAdmin("vc/counties/{$county->id}/delete") }}"><i class="fa fa-trash-o"></i>&nbsp;{{{ trans('button.delete') }}}</a>
			@endif
		</section>
	</section>
</form>

@stop
