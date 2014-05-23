@extends('layouts/fixed-top-left-sidebar')

{{-- Page title --}}
@section('pageTitle')
	@parent
	: {{{ trans("platform/pages::general.{$mode}") }}} {{{ $page->exists ? '- ' . $page->name : null }}}
@stop

{{-- Queue assets --}}
{{ Asset::queue('redactor', 'imperavi/css/redactor.css', 'styles') }}

{{ Asset::queue('slugify', 'platform/js/slugify.js', 'jquery') }}
{{ Asset::queue('validate', 'platform/js/validate.js', 'jquery') }}
{{ Asset::queue('bootstrap.tabs', 'bootstrap/js/tab.js', 'jquery') }}
{{ Asset::queue('redactor', 'imperavi/js/redactor.min.js', 'jquery') }}
{{ Asset::queue('pages', 'platform/pages::js/scripts.js', 'jquery') }}

{{-- bread crumbs --}}
@section('breadCrumbs')
@parent

<li><a href="{{ URL::toAdmin('pages') }}">{{{ trans('platform/pages::general.title') }}}</a></li>
<li class="active">{{{ trans("platform/pages::general.{$mode}") }}} <small>{{{ $page->name }}}</small></li>
@stop

{{-- Page content --}}
@section('content')

{{-- Page header --}}
<div class="m-b-md">
	<div class="row">
		<div class="col-sm-6">
			<h3 class="m-b-none">{{{ trans("platform/pages::general.{$mode}") }}} <small>{{{ $page->name }}}</small></h3>
		</div>
	</div>
</div>

{{-- Content form --}}
<form id="pages-form" action="{{ Request::fullUrl() }}" method="post" accept-char="UTF-8" autocomplete="off" class="validate">

	{{-- CSRF Token --}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<section class="panel panel-default">
		<header class="panel-heading text-right bg-light">
			<ul class="nav nav-tabs pull-left">
				<li class="active"><a href="#general" data-toggle="tab">{{{ trans('platform/pages::general.tabs.general') }}}</a></li>
				<li class=""><a href="#attributes" data-toggle="tab">{{{ trans('platform/pages::general.tabs.attributes') }}}</a></li>
			</ul>
			<span class="hidden-sm">&nbsp;</span>
		</header>
		<div class="panel-body">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="general">
					@include('platform/pages::partials/general')
				</div>
				<div class="tab-pane fade" id="attributes">
					@widget('platform/attributes::entity.form', [$page])
				</div>
			</div>
		</div>

		<section class="panel-footer">
			<button class="btn btn-primary" type="submit">{{{ trans("button.{$mode}") }}}</button>
			
			@if ($page->exists and $mode != 'copy')
			<div class="btn-group">
				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Actions <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a data-toggle="modal" data-target="modal-confirm" href="{{ URL::toAdmin("pages/{$page->id}/delete") }}"><i class="fa fa-trash-o"></i>&nbsp;{{{ trans('button.delete') }}}</a></li>
				</ul>
			</div>
			@endif

			<a class="btn btn-default" href="{{{ URL::toAdmin('pages') }}}">{{{ trans('button.cancel') }}}</a>
		</section>
	</section>
</form>

@stop
