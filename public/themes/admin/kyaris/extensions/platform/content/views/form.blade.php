@extends('layouts/fixed-top-left-sidebar')

{{-- Page title --}}
@section('pageTitle')
	@parent
	: {{{ trans("platform/content::general.{$mode}") }}} {{{ $content->exists ? '- ' . $content->name : null }}}
@stop

{{-- Queue assets --}}
{{ Asset::queue('redactor', 'imperavi/css/redactor.css', 'styles') }}

{{ Asset::queue('slugify', 'platform/js/slugify.js', 'jquery') }}
{{ Asset::queue('validate', 'platform/js/validate.js', 'jquery') }}
{{ Asset::queue('bootstrap.tabs', 'bootstrap/js/tab.js', 'jquery') }}
{{ Asset::queue('redactor', 'imperavi/js/redactor.min.js', 'jquery') }}
{{ Asset::queue('content', 'platform/content::js/scripts.js', 'jquery') }}

{{-- Inline scripts --}}
@section('scripts')
@parent
@stop

{{-- Inline styles --}}
@section('styles')
@parent
@stop

{{-- bread crumbs --}}
@section('breadCrumbs')
@parent

<li><a href="{{{ URL::toAdmin('content') }}}">{{{ trans('platform/content::general.title') }}}</a></li>
<li class="active">{{{ trans("platform/content::general.{$mode}") }}} - {{{ $content->name }}} </li>
@stop

{{-- Page content --}}
@section('content')

{{-- Page header --}}
<div class="m-b-md">
	<h3 class="m-b-none">{{{ trans("platform/content::general.{$mode}") }}} <small>{{{ $content->name }}}</small></h3>
</div>

{{-- Content form --}}
<form id="content-form" action="{{ Request::fullUrl() }}" method="post" accept-char="UTF-8" autocomplete="off" class="validate">

	{{-- CSRF Token --}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<section class="panel panel-default">
		<header class="panel-heading text-right bg-light">
			<ul class="nav nav-tabs pull-left">
				<li class="active"><a href="#general" data-toggle="tab">{{{ trans('platform/content::general.tabs.general') }}}</a></li>
				<li class=""><a href="#attributes" data-toggle="tab">{{{ trans('platform/content::general.tabs.attributes') }}}</a></li>
			</ul>
			<span class="hidden-sm">&nbsp;</span>
		</header>
		<div class="panel-body">
			<div class="tab-content">
				<div class="tab-pane fade active in" id="general">
					<div class="row">

						{{-- Name --}}
						<div class="col-lg-6">
							<div class="form-group{{ $errors->first('name', ' has-error') }}">
								<label for="name" class="control-label">{{{ trans('platform/content::form.name') }}} &nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" data-container="body" data-placement="right" data-original-title="{{{ trans('platform/content::form.name_help') }}}"></i></label>
								<input type="text" class="form-control" name="name" id="name" placeholder="{{{ trans('platform/content::form.name') }}}" value="{{{ Input::old('name', $content->name) }}}" required>
								<span class="help-block">{{{ $errors->first('name', ':message') }}}</span>
							</div>
						</div>

						{{-- Slug --}}
						<div class="col-lg-3">

							<div class="form-group{{ $errors->first('slug', ' has-error') }}">
								<label for="slug" class="control-label">{{{ trans('platform/content::form.slug') }}} &nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" data-container="body" data-placement="right" data-original-title="{{{ trans('platform/content::form.slug_help') }}}"></i></label>
								<input type="text" class="form-control" name="slug" id="slug" placeholder="{{{ trans('platform/content::form.slug') }}}" value="{{{ Input::old('slug', $content->slug) }}}" required>
								<span class="help-block">{{{ $errors->first('slug', ':message') }}}</span>
							</div>
						</div>

						{{-- Enabled --}}
						<div class="col-lg-3">
							<div class="form-group{{ $errors->first('enabled', ' has-error') }}">
								<label for="enabled" class="control-label">{{{ trans('platform/content::form.enabled') }}} &nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" data-container="body" data-placement="right" data-original-title="{{{ trans('platform/content::form.enabled_help') }}}"></i></label>
								<select class="form-control" name="enabled" id="enabled" required>
									<option value="1"{{ Input::old('enabled', $content->enabled) == 1 ? ' selected="selected"' : null }}>{{{ trans('general.enabled') }}}</option>
									<option value="0"{{ Input::old('enabled', $content->enabled) == 0 ? ' selected="selected"' : null }}>{{{ trans('general.disabled') }}}</option>
								</select>
								<span class="help-block">{{{ $errors->first('enabled', ':message') }}}</span>
							</div>
						</div>
					</div>

					<div class="row">

						{{-- Type --}}
						<div class="col-lg-6">
							<div class="form-group{{ $errors->first('type', ' has-error') }}">
								<label for="type" class="control-label">{{{ trans('platform/content::form.type') }}} &nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" data-container="body" data-placement="right" data-original-title="{{{ trans('platform/content::form.type_help') }}}"></i></label>
								<select class="form-control" name="type" id="type" required>
									<option value="database"{{ Input::old('type', $content->type) == 'database' ? ' selected="selected"' : null }}>{{{ trans('platform/content::form.database') }}}</option>
									<option value="filesystem"{{ Input::old('type', $content->type) == 'filesystem' ? ' selected="selected"' : null }}>{{{ trans('platform/content::form.filesystem') }}}</option>
								</select>
								<span class="help-block">{{{ $errors->first('type', ':message') }}}</span>
							</div>
						</div>

						{{-- Type : Filesystem --}}
						<div class="col-lg-6">
							<div data-type="filesystem" class="{{ Input::old('type', $content->type) == 'database' ? ' hide' : null }}">
								<div class="form-group{{ $errors->first('file', ' error') }}">
									<label for="file" class="control-label">{{{ trans('platform/content::form.file') }}} &nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" data-container="body" data-placement="right" data-original-title="{{{ trans('platform/content::form.file_help') }}}"></i></label>
									<select class="form-control" name="file" id="file"{{ Input::old('type', $content->type) == 'filesystem' ? ' required' : null }}>
									@foreach ($files as $value => $name)
										<option value="{{ $value }}"{{ Input::old('file', $content->file) == $value ? ' selected="selected"' : null}}>{{ $name }}</option>
									@endforeach
									</select>
									<span class="help-block">{{{ $errors->first('file', ':message') }}}</span>
								</div>
							</div>
						</div>
					</div>

					{{-- Type : Database --}}
					<div data-type="database"class="{{ Input::old('type', $content->type) == 'filesystem' ? ' hide' : null }}">

						<div class="form-group{{ $errors->first('value', ' has-error') }}">

							<label for="value" class="control-label">{{{ trans('platform/content::form.value') }}} &nbsp;<i class="fa fa-info-circle" data-toggle="tooltip" data-container="body" data-placement="right" data-original-title="{{{ trans('platform/content::form.value_help') }}}"></i></label>

							<textarea class="form-control redactor" name="value" id="value"{{ Input::old('type', $content->type) == 'database' ? ' required' : null }}>{{{ Input::old('value', $content->value) }}}</textarea>

							<span class="help-block">{{{ $errors->first('value', ':message') }}}</span>

						</div>

					</div>
				</div>

				<!-- attributes tab -->
				<div class="tab-pane fade" id="attributes">
					@widget('platform/attributes::entity.form', [$content])
				</div>
			</div>
		</div>
	</section>

	{{-- Form actions --}}
	<div class="row">
		<div class="col-md-12">
			{{-- Form actions --}}
			<div class="form-group">
				<button class="btn btn-primary" type="submit">{{{ trans("button.{$mode}") }}}</button>
				@if ($content->exists and $mode != 'copy')
				<div class="btn-group">
					<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Actions <span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a class="" href="{{ URL::toAdmin("content/{$content->slug}/copy") }}"><i class="fa fa-copy"></i>&nbsp;{{{ trans('button.copy') }}}</a></li>
						<li><a data-toggle="modal" data-target="modal-confirm" href="{{ URL::toAdmin("content/{$content->slug}/delete") }}"><i class="fa fa-trash-o"></i>&nbsp;{{{ trans('button.delete') }}}</a></li>
					</ul>
				</div>
				@endif

				<a class="btn btn-rounded btn-link" href="{{{ URL::toAdmin('content') }}}">{{{ trans('button.cancel') }}}</a>
			</div>
		</div>
	</div>
</form>

@stop
