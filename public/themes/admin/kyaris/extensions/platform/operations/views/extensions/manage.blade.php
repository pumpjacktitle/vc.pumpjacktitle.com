@extends('layouts/fixed-top-left-sidebar')

{{-- Page title --}}
@section('pageTitle')
	@parent
	: {{{ trans('platform/operations::extensions/general.manage') }}}
@stop

{{-- bread crumbs --}}
@section('breadCrumbs')
@parent

<li><a href="{{ URL::toAdmin('operations/extensions') }}">{{{ trans('platform/operations::extensions/general.title') }}}</a></li>
<li class="active">{{{ trans('platform/operations::extensions/general.manage') }}} <small> - {{{ $extension->name ?: $extension->getSlug() }}}</small></li>
@stop

{{-- Page content --}}
@section('content')

{{-- Page header --}}
<div class="m-b-md">
	<div class="row">
		<div class="col-sm-6">
			<h3 class="m-b-none">{{{ trans('platform/operations::extensions/general.manage') }}} <small>{{{ $extension->name ?: $extension->getSlug() }}}</small></h3>
		</div>
	</div>
</div>

<div class="row">

	{{-- Dependencies --}}
	<div class="col-lg-6">

		<div class="panel panel-default">

			<div class="panel-heading">
				<h3 class="panel-title">Dependencies</h3>
			</div>

			@if (count($dependencies) == 0)
			<div class="panel-body">
				This extension doesn't have any dependencies.
			</div>
			@else

			<table class="table">
			@foreach ($dependencies as $_extension)
				<tr>
					<td>
						{{{ $_extension->name }}} ({{{ $_extension->getSlug() }}})

						<div class="pull-right">

							@if ($_extension->isInstalled())
								<span class="label label-success">{{{ trans('general.installed') }}}</span>

								@if ($_extension->isEnabled())
								<span class="label label-success">{{{ trans('general.enabled') }}}</span>
								@else
								<span class="label label-warning">{{{ trans('general.disabled') }}}</span>
								@endif
							@else
								<span class="label label-danger">{{{ trans('general.uninstalled') }}}</span>
							@endif

						</div>
					</td>
				</tr>
			@endforeach
			</table>
			@endif

		</div>

	</div>

	{{-- Dependents --}}
	<div class="col-lg-6">

		<div class="panel panel-default">

			<div class="panel-heading">
				<h3 class="panel-title">Dependents</h3>
			</div>

			@if (count($dependents) == 0)
			<div class="panel-body">
				This extension doesn't have any dependents.
			</div>
			@else
			<table class="table">
			@foreach ($dependents as $_extension)
				<tr>
					<td>
						{{{ $_extension->name }}} ({{{ $_extension->getSlug() }}})

						<div class="pull-right">

							@if ($_extension->isInstalled())
								<span class="label label-success">{{{ trans('general.installed') }}}</span>

								@if ($_extension->isEnabled())
								<span class="label label-success">{{{ trans('general.enabled') }}}</span>
								@else
								<span class="label label-warning">{{{ trans('general.disabled') }}}</span>
								@endif
							@else
								<span class="label label-danger">{{{ trans('general.uninstalled') }}}</span>
							@endif

						</div>
					</td>
				</tr>
			@endforeach
			</table>
			@endif

		</div>

	</div>

</div>

<div class="row">

	<div class="col-lg-6">

		<div class="panel panel-default">

			<div class="panel-heading">
				<h3 class="panel-title">Manage Extension</h3>
			</div>

			<div class="panel-body">

				{{-- Check if the extension is installed --}}
				@if ($extension->isInstalled())

					{{-- Check if the extension is enabled --}}
					@if ($extension->isEnabled())

						{{-- Allow an extension to be disabled --}}
						@if ($extension->canDisable())
							<a href="{{ URL::toAdmin("operations/extensions/{$extension->getSlug()}/disable") }}" class="btn btn-primary">{{{ trans('button.disable') }}}</a>
						@else
							<span class="btn btn-primary" disabled="disabled">{{{ trans('button.disable') }}}</span>
						@endif

					{{-- Check if the extension can be enabled --}}
					@else
						@if ($extension->canEnable())
							<a href="{{ URL::toAdmin("operations/extensions/{$extension->getSlug()}/enable") }}" class="btn btn-info">{{{ trans('button.enable') }}}</a>
						@else
							<span class="btn btn-info" disabled="disabled">{{{ trans('button.enable') }}}</span>
						@endif
					@endif

					{{-- Check if the extension can be uninstalled --}}
					@if ($extension->canUninstall())
						<a href="{{ URL::toAdmin("operations/extensions/{$extension->getSlug()}/uninstall") }}" class="btn btn-danger">{{{ trans('button.uninstall') }}}</a>
					@else
						<span class="btn btn-danger" disabled="disabled">{{{ trans('button.uninstall') }}}</span>
					@endif

				@else

					{{-- Allow an extension to be installed --}}
					@if ($extension->canInstall())
						<a href="{{ URL::toAdmin("operations/extensions/{$extension->getSlug()}/install") }}" class="btn btn-success">{{{ trans('button.install') }}}</a>
					@else
						<span class="btn btn-success" disabled="disabled">{{{ trans('button.install') }}}</span>
					@endif

				@endif

			</div>

		</div>

	</div>

</div>

@stop
