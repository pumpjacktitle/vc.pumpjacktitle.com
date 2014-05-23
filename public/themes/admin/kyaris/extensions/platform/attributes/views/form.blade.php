@extends('layouts/fixed-top-left-sidebar')

{{-- Page title --}}
@section('pageTitle')
	@parent
	: {{{ trans("platform/attributes::general.{$mode}") }}}
@stop

{{-- Queue assets --}}
{{ Asset::queue('selectize', 'selectize/css/selectize.css', 'styles') }}

{{ Asset::queue('validate', 'js/validate/validate.min.js', array('jquery', 'vertexhs')) }}
{{ Asset::queue('sortable', 'platform/attributes::js/jquery.sortable.js', 'jquery') }}
{{ Asset::queue('selectize', 'selectize/js/selectize.js', 'jquery') }}
{{ Asset::queue('attributes', 'platform/attributes::js/scripts.js', array('sortable', 'selectize')) }}

{{-- bread crumbs --}}
@section('breadCrumbs')
@parent

<li><a href="{{{ URL::toAdmin('attributes') }}}">{{{ trans('platform/attributes::general.title') }}}</a></li>
<li class="active">{{{ trans("platform/attributes::general.{$mode}") }}} {{{ $attribute->exists ? " - {$attribute->name}" : null }}} </li>
@stop

{{-- Page content --}}
@section('content')

{{-- Page header --}}
<div class="m-b-md">
	<h3 class="m-b-none">{{{ trans("platform/attributes::general.{$mode}") }}} <small>{{{ $attribute->exists ? $attribute->name : null }}}</small></h3>
</div>

{{-- Attributes form --}}
<form id="attributes-form" action="{{ Request::fullUrl() }}" method="post" accept-char="UTF-8" autocomplete="off" class="validate">

	<section class="panel panel-default">
		<div class="panel-body">
			{{-- CSRF Token --}}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="row">

			 	<div class="col-lg-5">


					<div class="row">

						<div class="col-lg-6">

							{{-- Name --}}
							<div class="form-group{{ $errors->first('name', ' has-error') }}">
								<label for="name" class="control-label">{{{ trans('platform/attributes::form.name') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-original-title="{{{ trans('platform/attributes::form.name_help') }}}"></i></label>

								<input type="text" class="form-control" name="name" id="name" placeholder="{{{ trans('platform/attributes::form.name') }}}" value="{{{ Input::old('name', $attribute->exists ? $attribute->name : null) }}}" required>

								<span class="help-block">{{{ $errors->first('name', ':message') }}}</span>
							</div>

						</div>

						{{-- Slug --}}
						<div class="col-lg-6">

							<div class="form-group{{ $errors->first('slug', ' has-error') }}">
								<label for="slug" class="control-label">{{{ trans('platform/attributes::form.slug') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-original-title="{{{ trans('platform/attributes::form.slug_help') }}}"></i></label>

								<input type="text" class="form-control" name="slug" id="slug" placeholder="{{{ trans('platform/attributes::form.slug') }}}" value="{{{ Input::old('slug', $attribute->exists ? $attribute->slug : null) }}}" required>

								<span class="help-block">{{{ $errors->first('slug', ':message') }}}</span>
							</div>

						</div>

					</div>

					{{-- Namespace --}}
					<div class="form-group{{ $errors->first('namespace', ' has-error') }}">
						<label for="namespace" class="control-label">{{{ trans('platform/attributes::form.namespace') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-original-title="{{{ trans('platform/attributes::form.namespace_help') }}}"></i></label>

						<select class="selectize" data-selectize="create" name="namespace" id="namespace" class="form-control">
							<option value="">Select a namespace...</option>
							@foreach ($namespaces as $namespace)
							<option {{ Input::old('namespace', $attribute->exists ? $attribute->namespace : Input::get('namespace')) === $namespace ? ' selected="selected"' : null }} value="{{{ $namespace }}}">{{{ $namespace }}}</option>
							@endforeach
						</select>

						<span class="help-block">{{{ $errors->first('namespace', ':message') }}}</span>
					</div>

					<div class="row">

						{{-- Type --}}
						<div class="col-lg-6">

							<div class="form-group{{ $errors->first('type', ' has-error') }}">
								<label for="type" class="control-label">{{{ trans('platform/attributes::form.type') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-original-title="{{{ trans('platform/attributes::form.type_help') }}}"></i></label>

								<select class="form-control" name="type" id="type" required>
								<option value="">Select a type...</option>
								@foreach ($types as $type)
									<option data-allow-options="{{ $type->allowOptions() ?: 0 }}"{{ Input::old('type', $attribute->exists ? $attribute->type : null) === $type->getIdentifier() ? ' selected="selected"' : null }} value="{{ $type->getIdentifier() }}">{{ $type->getName() }}</option>
								@endforeach
								</select>

								<span class="help-block">{{{ $errors->first('type', ':message') }}}</span>
							</div>

						</div>

						{{-- Enabled --}}
						<div class="col-lg-6">

							<div class="form-group{{ $errors->first('enabled', ' has-error') }}">
								<label for="enabled" class="control-label">{{{ trans('platform/attributes::form.enabled') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-original-title="{{{ trans('platform/attributes::form.enabled_help') }}}"></i></label>

								<select class="form-control" name="enabled" id="enabled" required>
									<option value="">Select a status...</option>
									<option value="1"{{ Input::old('enabled', $attribute->exists ? (int) $attribute->enabled : 1) === 1 ? ' selected="selected"' : null }}>{{{ trans('general.enabled') }}}</option>
									<option value="0"{{ Input::old('enabled', $attribute->exists ? (int) $attribute->enabled : 1) === 0 ? ' selected="selected"' : null }}>{{{ trans('general.disabled') }}}</option>
								</select>

								<span class="help-block">{{{ $errors->first('enabled', ':message') }}}</span>
							</div>

						</div>

					</div>

				</div>

				<div class="col-lg-7">

					<div class="hide" data-options>

						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th colspan="2">{{{ trans('platform/attributes::form.option.value') }}}</th>
									<th>{{{ trans('platform/attributes::form.option.label') }}}</th>
									<th></th>
								</tr>
							</thead>
							<tbody>

								<tr data-option-clone class="hide">
									<td><i data-option-move class="fa fa-arrows"></i></td>
									<td><input class="form-control" name="options[:number][value]" type="text"></td>
									<td><input class="form-control" name="options[:number][label]" type="text"></td>
									<td><span data-option-remove class="btn btn-danger btn-sm">{{{ trans('button.remove') }}}</span></td>
								</tr>

								{{-- Show options here --}}
								@foreach ($options as $value => $label)
								<tr>
									<td><i data-option-move class="fa fa-arrows"></i></td>
									<td><input class="form-control" name="options[{{ $value }}][value]" type="text" value="{{{ $value }}}"></td>
									<td><input class="form-control" name="options[{{ $value }}][label]" type="text" value="{{{ $label }}}"></td>
									<td><span data-option-remove class="btn btn-danger btn-sm">{{{ trans('button.remove') }}}</span></td>
								</tr>
								@endforeach

								<tr data-options-empty{{ count($options) >= 1 ? ' class="hide"' : null }}>
									<td colspan="4">There are no options.</td>
								</tr>

							</tbody>
							<tfoot>
								<tr>
									<td colspan="3"></td>
									<td><span data-option-add class="btn btn-info btn-sm">{{{ trans('button.add') }}}</span></td>
								</tr>
							</tfoot>
						</table>

					</div>

					<div class="hide" data-no-options>

						<div class="jumbotron">
							<h4 class="text-center">The selected attribute type, doesn't allow options.</h4>
						</div>

					</div>

				</div>

			</div>

			{{-- Form actions --}}
			<div class="row">

				<div class="col-lg-12">

					{{-- Form actions --}}
					<div class="form-group">

						<button class="btn btn-success" type="submit">{{{ trans('button.save') }}}</button>

						<a class="btn btn-default" href="{{{ URL::toAdmin('attributes') }}}">{{{ trans('button.cancel') }}}</a>

						@if ($attribute->exists)
						<a class="btn btn-danger" data-toggle="modal" data-target="modal-confirm" href="{{ URL::toAdmin("attributes/{$attribute->id}/delete") }}">{{{ trans('button.delete') }}}</a>
						@endif

					</div>

				</div>

			</div>
		</div>
	</section>

</form>

@stop
