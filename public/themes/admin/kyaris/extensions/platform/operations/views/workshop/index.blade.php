@extends('layouts/fixed-top-left-sidebar')

{{-- Page title --}}
@section('pageTitle')
	@parent
	: {{{ trans('platform/operations::workshop/general.title') }}}
@stop

{{-- Queue assets --}}
{{ Asset::queue('validate', 'js/validate/validate.min.js', 'jquery') }}

{{-- Page content --}}
@section('content')

{{-- Page header --}}
<div class="m-b-md">
	<div class="row">
		<div class="col-sm-6">
			<h3 class="m-b-none">{{{ trans('platform/operations::workshop/general.title') }}} <small>Create a new extension</small></h3>
		</div>
	</div>
</div>

<form id="workshop-form" action="{{ Request::fullUrl() }}" method="post" accept-char="UTF-8" autocomplete="off" class="validate">
	<div class="panel panel-default">
		{{-- Tabs content --}}
		<div class="panel-body">

			{{-- CSRF Token --}}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="row">

				{{-- Author Name --}}
				<div class="col-lg-6">
					<div class="form-group{{ $errors->first('author', ' has-error') }}">
						<label for="author" class="control-label">{{{ trans('platform/operations::workshop/form.author') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/operations::workshop/form.author_help') }}}"></i></label>
						<input type="text" class="form-control" name="author" id="author" placeholder="{{{ trans('platform/operations::workshop/form.author') }}}" value="{{{ Input::old('author', Config::get('workbench.name')) }}}" required>
						<span class="help-block">{{{ $errors->first('author', ':message') }}}</span>
					</div>
				</div>

				{{-- Author Email --}}
				<div class="col-lg-6">
					<div class="form-group{{ $errors->first('email', ' has-error') }}">
						<label for="email" class="control-label">{{{ trans('platform/operations::workshop/form.email') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/operations::workshop/form.email_help') }}}"></i></label>
						<input type="text" class="form-control" name="email" id="email" placeholder="{{{ trans('platform/operations::workshop/form.email') }}}" value="{{{ Input::old('email', Config::get('workbench.email')) }}}" required>
						<span class="help-block">{{{ $errors->first('email', ':message') }}}</span>
					</div>
				</div>
			</div>

			<div class="row">

				{{-- Vendor --}}
				<div class="col-lg-4">
					<div class="form-group{{ $errors->first('vendor', ' has-error') }}">
						<label for="vendor" class="control-label">{{{ trans('platform/operations::workshop/form.vendor') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/operations::workshop/form.vendor_help') }}}"></i></label>
						<input type="text" class="form-control" name="vendor" id="vendor" placeholder="{{{ trans('platform/operations::workshop/form.vendor') }}}" value="{{{ Input::old('vendor', Config::get('cartalyst/workshop::vendor')) }}}" required>
						<span class="help-block">{{{ $errors->first('vendor', ':message') }}}</span>
					</div>
				</div>

				{{-- Name --}}
				<div class="col-lg-4">
					<div class="form-group{{ $errors->first('name', ' has-error') }}">
						<label for="name" class="control-label">{{{ trans('platform/operations::workshop/form.name') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/operations::workshop/form.name_help') }}}"></i></label>
						<input type="text" class="form-control" name="name" id="name" placeholder="{{{ trans('platform/operations::workshop/form.name') }}}" value="{{{ Input::old('name') }}}" required>
						<span class="help-block">{{{ $errors->first('name', ':message') }}}</span>
					</div>
				</div>

				{{-- Version --}}
				<div class="col-lg-4">
					<div class="form-group{{ $errors->first('version', ' has-error') }}">
						<label for="version" class="control-label">{{{ trans('platform/operations::workshop/form.version') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/operations::workshop/form.version_help') }}}"></i></label>
						<input type="text" class="form-control" name="version" id="version" placeholder="{{{ trans('platform/operations::workshop/form.version') }}}" value="{{{ Input::old('version', '0.1.0') }}}" required>
						<span class="help-block">{{{ $errors->first('version', ':message') }}}</span>
					</div>
				</div>
			</div>

			{{-- Description --}}
			<div class="form-group{{ $errors->first('description', ' has-error') }}">
				<label for="description" class="control-label">{{{ trans('platform/operations::workshop/form.description') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/operations::workshop/form.description_help') }}}"></i></label>
				<input type="text" class="form-control" name="description" id="description" placeholder="{{{ trans('platform/operations::workshop/form.description') }}}" value="{{{ Input::old('name') }}}" required>
				<span class="help-block">{{{ $errors->first('description', ':message') }}}</span>
			</div>

			{{-- Dependencies --}}
			<div class="form-group{{ $errors->first('require', ' has-error') }}">
				<label for="require" class="control-label">{{{ trans('platform/operations::workshop/form.dependencies') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/operations::workshop/form.dependencies_help') }}}"></i></label>
				<textarea class="form-control" name="require" id="require" rows="5">{{{ Input::old('require') }}}</textarea>
				<span class="help-block">{{{ $errors->first('require', ':message') }}}</span>
			</div>

			<div class="row">

					{{-- Components --}}
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label font-bold">{{{ trans('platform/operations::workshop/form.components') }}}</label>

						<label class="checkbox">
							<input type="checkbox" name="components[]" value="config"> Sample config file
						</label>

						<label class="checkbox">
							<input type="checkbox" name="components[]" value="widget"> Basic widget
						</label>

						<label class="checkbox">
							<input type="checkbox" name="components[]" value="admin"> Admin components <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="Includes: Controller, Theme files and assets"></i>
						</label>

						<label class="checkbox">
							<input type="checkbox" name="components[]" value="frontend"> Frontend components <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="Includes: Controller, Theme files and assets"></i>
						</label>
					</div>
				</div>

				<div class="col-lg-8">
					<div class="form-group">
						<label class="control-label  font-bold">{{{ trans('platform/operations::workshop/form.install') }}}</label>

						<label class="radio">
							<input type="radio" name="install" value="automatic"{{ $canInstall ? ' checked' : ' disabled' }}>
							Automatic
						</label>

						<span class="help-block">
							Automatic installation installs the files into your filesystem, you need to then <a href="{{ URL::toAdmin('operations/extensions') }}">install and enable it</a> in Platform.

							@if ( ! $canInstall)
							<p></p>

							<span class="text-warning">Make sure the <strong>{{ $workbench }}</strong> directory exists and is writeable by the web so that we can deploy the extension for you!</span>
							@endif
						</span>

						<label class="radio">
							<input type="radio" name="install" value="manual"{{ ! $canInstall ? ' checked' : null }}>
							Download ZIP, I'll Install Myself
						</label>
					</div>
				</div>
			</div>
		</div>
		
		{{-- Form actions --}}
		<div class="panel-footer">
			<button class="btn btn-success" type="submit">{{{ trans('button.save') }}}</button>
			<a class="btn btn-default" href="{{ URL::toAdmin('operations/extensions') }}">{{{ trans('button.cancel') }}}</a>
		</div>
	</div>
</form>

@stop
