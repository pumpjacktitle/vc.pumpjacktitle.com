@extends('layouts/fixed-top-left-sidebar')

{{-- Page title --}}
@section('pageTitle')
	@parent
	: Email Media
@stop

{{-- Queue assets --}}
{{ Asset::queue('selectize', 'selectize/css/selectize.css', 'styles') }}
{{ Asset::queue('selectize', 'selectize/js/selectize.js', 'jquery') }}

{{-- Inline scripts --}}
@section('scripts')
@parent
<script>
	jQuery(document).ready(function($)
	{
		$('#users').selectize({
			persist: false,
			maxItems: null,
			valueField: 'email',
			labelField: 'name',
			searchField: ['name', 'email'],
			options: [
				@foreach ($users as $user)
				{email: '{{ $user->email }}', name: '{{ $user->first_name }} {{ $user->last_name }}'},
				@endforeach
			],
			render: {
				item: function(item, escape)
				{
					return '<div>' +
						(item.name ? '<span class="name">' + escape(item.name) + '</span>' : '') +
						(item.email ? '<span class="email">' + escape(item.email) + '</span>' : '') +
					'</div>';
				},
				option: function(item, escape)
				{
					var label = item.name || item.email;
					var caption = item.name ? item.email : null;
					return '<div>' +
						'<span class="label">' + escape(label) + '</span>' +
						(caption ? '<span class="caption">' + escape(caption) + '</span>' : '') +
					'</div>';
				}
			},
		});

		$('#groups').selectize({
			persist: false,
			maxItems: null,
		});
	});
</script>
@stop

{{-- bread crumbs --}}
@section('breadCrumbs')
@parent

<li class=""><a href="{{ URL::toAdmin('media') }}">{{{ trans('platform/media::general.title') }}}</a></li>
<li class="active">{{{ trans('platform/media::general.email') }}}</li>
@stop

{{-- Page content --}}
@section('content')

{{-- Page header --}}
<div class="m-b-md">
	<div class="row">
		<div class="col-sm-12">
			<h3 class="m-b-none">{{{ trans('platform/media::general.email') }}}</h3>
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

				<div class="col-lg-4">
					<div class="form-group">
						<label class="control-label" for="users">Attachments</label>
						<div style="max-height: 285px; overflow: auto">
						
						@foreach ($items as $item)
						<div class="media">
							<span class="pull-left">
								<img src="{{ URL::to(media_cache_path($item->thumbnail)) }}">
							</span>

							<div class="media-body">
								<span class="pull-right">
									<a href="{{{ URL::current() }}}?remove={{ $item->id }}">&times;</a>
								</span>

								<h4 class="media-heading">{{{ Str::limit($item->name, 30) }}}</h4>

								{{{ formatBytes($item->size) }}}
							</div>
						</div>
						@endforeach
						</div>

						<div>
							<hr />
							Total: {{{ formatBytes($total) }}}
						</div>
					</div>
				</div>

				<div class="col-lg-8">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label" for="users">Users</label>
								<select name="users[]" id="users"></select>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label" for="groups">Groups</label>
								<select name="groups[]" id="groups">
									<option></option>
								@foreach ($groups as $group)
									<option value="{{{ $group->id }}}">{{{ $group->name }}}</option>
								@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="panel-footer">
			<button class="btn btn-success" type="submit">Send Email</button>
			<a href="{{ URL::toAdmin('media') }}" class="btn btn-default">{{{ trans('button.cancel') }}}</a>
		</div>
	</section>

</form>

@stop
