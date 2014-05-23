@extends('layouts/fixed-top-left-sidebar')

{{-- Page title --}}
@section('title')
	@parent
	: {{{ trans("platform/menus::general.{$mode}") }}} {{{ ! empty($menu) ? '- ' . $menu->name : null }}}
@stop

{{-- Queue assets --}}
{{ Asset::queue('menus', 'platform/menus::css/menus.css', 'styles') }}
{{ Asset::queue('jquery.slugify', 'platform/js/slugify.js', 'jquery') }}
{{ Asset::queue('jquery.sortable', 'platform/menus::js/jquery.sortable.js', 'jquery')}}
{{ Asset::queue('jquery.menu-manager', 'platform/menus::js/jquery.menumanager.js', array('jquery.slugify', 'jquery.sortable')) }}
{{ Asset::queue('underscore', 'underscore/js/underscore.js', 'jquery.menu-manager') }}

{{-- Inline scripts --}}
@section('scripts')
@parent
<script>
	jQuery(document).ready(function($)
	{
		// Instantiate a new Menu Manager
		var MenuManager = $.menumanager('#menu-form');

		// Set the persisted slugs
		MenuManager.setPersistedSlugs({{ json_encode($persistedSlugs) }});

		// Register the available types
		@foreach ($types as $type)
			MenuManager.registerType('{{ $type->getName() }}', '{{ $type->getIdentifier() }}');
		@endforeach
	});
</script>
@stop

{{-- Inline styles --}}
@section('styles')
@parent
@stop

{{-- Page content --}}
@section('content')

<form id="menu-form" action="{{ Request::fullUrl() }}" method="POST" accept-char="UTF-8">

	{{-- Page header --}}
	<div class="m-b-md">
		<div class="row">
			<div class="col-sm-6">
				<h3 class="m-b-none">{{{ trans("platform/menus::general.{$mode}") }}} <small>{{{ ! empty($menu) ? $menu->name : null }}}</small></h3>
			</div>
			<div class="col-sm-6 m-t-md text-right">
				<button class="btn btn-success" type="submit"><i class="fa fa-save"></i> {{{ trans('button.update') }}}</button>
				<a class="btn btn-default" href="{{ URL::toAdmin('menus') }}"><i class="fa fa-times"></i> {{{ trans('button.cancel') }}}</a>
			</div>
		</div>
	</div>

	<section class="panel panel-default">
		<div class="panel-body">
			
			
			{{-- CSRF Token --}}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="row">

				{{-- Menu Items --}}
				<div class="col-md-7">

					<div data-no-items class="jumbotron{{ ! empty($children) ? ' hide' : null }}">

						<div class="container" id="no-children">

							<h1>{{ trans('platform/menus::message.no_children') }}</h1>

							<p>&nbsp;</p>

							<p><button class="btn btn-primary btn-md" data-item-add data-item="new-child"><i class="icon-plus"></i> {{{ trans('platform/menus::button.add_item') }}}</button></p>

						</div>

					</div>

					<ol class="items{{ empty($children) ? ' hide' : null }}" data-item-add>
						<li class="item-add">
							<div class="item-name" data-item="new-child">{{{ trans('platform/menus::button.add_item') }}}</div>
						</li>
					</ol>

					<div id="sortable">
						<ol class="items">
							@if ( ! empty($children))
							@each('platform/menus::manage/children', $children, 'child')
							@endif

							{{-- Underscore children template --}}
							@include('platform/menus::manage/children-template')
						</ol>
					</div>

				</div>

				{{-- Sidebar --}}
				<div class="col-md-5">

					{{-- Root form --}}
					<div class="well well-md item-box-borderless" data-root-form>

						<fieldset>

							<legend>Menu Details</legend>

							<div class="form-group">
								<label class="control-label" for="menu-name">{{ trans('platform/menus::form.name') }}</label>
								<input type="text" class="form-control" name="menu-name" id="menu-name" value="{{{ ! empty($menu) ? $menu->name : null }}}" required>
							</div>

							<div class="form-group">
								<label class="control-label" for="menu-slug">{{ trans('platform/menus::form.slug') }}</label>
								<input type="text" class="form-control" name="menu-slug" id="menu-slug" value="{{{ ! empty($menu) ? $menu->slug : null }}}" required>
							</div>

						</fieldset>

					</div>

					{{-- Items form --}}
					@if ( ! empty($children))
					@each('platform/menus::manage/form', $children, 'child')
					@endif

					{{-- New children form --}}
					@include('platform/menus::manage/form')

					{{-- Underscore form template --}}
					<div data-forms>
						@include('platform/menus::manage/form-template')
					</div>

				</div>

			</div>
		</div>
	</section>

</form>

@stop
