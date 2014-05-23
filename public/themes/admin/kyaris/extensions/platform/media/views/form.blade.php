@extends('layouts/fixed-top-left-sidebar')

{{-- Page title --}}
@section('pageTitle')
	@parent
	: {{{ trans('platform/media::general.update') }}}
@stop

{{-- Queue assets --}}
{{ Asset::queue('selectize', 'selectize/css/selectize.css', 'styles') }}
{{ Asset::queue('selectize', 'selectize/js/selectize.js', 'jquery') }}

{{ Asset::queue('jasny', 'js/jasny-bootstrap/css/jasny-bootstrap.min.css', 'bootstrap') }}
{{ Asset::queue('jasny', 'js/jasny-bootstrap/js/jasny-bootstrap.min.js', array('jquery', 'bootstrap')) }}

{{-- Inline scripts --}}
@section('scripts')
@parent
<script type="text/javascript">
	jQuery(document).ready(function($)
	{
		$('#tags').selectize({
			maxItems: 4,
			create: true
		});

		$('#private').on('change', function()
		{
			if ($(this).val() == 1)
			{
				$('[data-groups]').removeClass('hide');
			}
			else
			{
				$('[data-groups]').addClass('hide');
			}
		});

		$('.fileinput').fileinput()
	});
</script>
@stop

{{-- Inline styles --}}
@section('styles')
@parent

<style type="text/css">
	.btn-file > input {
	   transform: none;
	   -webkit-transform: none;
	}
</style>
@stop

{{-- bread crumbs --}}
@section('breadCrumbs')
@parent

<li class=""><a href="{{ URL::toAdmin('media') }}">{{{ trans('platform/media::general.title') }}}</a></li>
<li class="active">{{{ trans('platform/media::general.update') }}}</li>
@stop

{{-- Page content --}}
@section('content')

{{-- Page header --}}
<div class="m-b-md">
	<div class="row">
		<div class="col-sm-12">
			<h3 class="m-b-none">{{{ trans('platform/media::general.update') }}}</h3>
		</div>
	</div>
</div>

{{-- Media form --}}
<form id="media-form" action="{{ Request::fullUrl() }}" method="post" accept-char="UTF-8" autocomplete="off" enctype="multipart/form-data">

	<section class="panel panel-default">
		<div class="panel-body">
			{{-- CSRF Token --}}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="row">

				{{-- Name --}}
				<div class="col-lg-7">
					<div class="form-group">
						<label class="control-label" for="name">{{{ trans('platform/media::form.name') }}}</label>
						<div class="controls">
							<input type="text" name="name" id="name" class="form-control" value="{{ $media->name }}">
						</div>
					</div>
				</div>

				{{-- Tags --}}
				<div class="col-lg-5">
					<div class="form-group">
						<label class="control-label" for="tags">{{{ trans('platform/media::form.tags') }}}</label>
						<div class="controls">
							<select id="tags" name="tags[]" multiple="multiple" tabindex="-1">
							@foreach ($tags as $tag)
								<option value="{{{ $tag }}}"{{ in_array($tag, $media->tags) ? ' selected="selected"' : null }}>{{{ $tag }}}</option>
							@endforeach
							</select>
						</div>
					</div>
				</div>
			</div>

			<div class="row">

				{{-- Private --}}
				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label" for="private">{{{ trans('platform/media::form.private') }}}</label>
						<i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/media::form.private_help') }}}"></i>
						<div class="controls">
							<select name="private" id="private" class="form-control">
								<option value="0"{{ Input::old('private', $media->private) == 0 ? ' selected="selected"' : null }}>Public</option>
								<option value="1"{{ Input::old('private', $media->private) == 1 ? ' selected="selected"' : null }}>Private</option>
							</select>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label" for="file">{{{ trans('platform/media::form.file') }}}</label>

						<div class="controls">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
									<img src="{{ URL::to("media/{$media->path}") }}" style="width: 200px; height: 150px;" />
								</div>
								<div>
									<span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="file"></span>
									<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			{{-- Groups --}}
			<div class="row">
				<div class="col-lg-4">
					<div class="form-group{{ Input::old('private', $media->private) == 0 ? ' hide' : null }}" data-groups>
						<label class="control-label" for="groups">{{{ trans('platform/media::form.groups') }}}</label>

						<i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/media::form.groups_help') }}}"></i>

						<div class="controls">
							<select name="groups[]" id="groups" class="form-control" multiple="true">
							@foreach ($groups as $group)
								<option value="{{{ $group->id }}}"{{ in_array($group->id, $media->groups) ? ' selected="selected"' : null }}>{{{ $group->name }}}</option>
							@endforeach
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="panel-footer">
			{{-- Form actions --}}
			<button class="btn btn-success" type="submit">{{{ trans('button.update') }}}</button>
			<a href="{{ URL::toAdmin('media') }}" class="btn btn-default">{{{ trans('button.cancel') }}}</a>
		</div>
	</section>

</form>

@stop
