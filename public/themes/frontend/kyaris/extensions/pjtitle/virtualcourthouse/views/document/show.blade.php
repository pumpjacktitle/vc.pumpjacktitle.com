@extends('layouts/fixed-top-bottom')

{{-- Page title --}}
@section('pageTitle')
	@parent
	: {{{ trans('pjtitle/virtualcourthouse::search/general.document.title') }}}
@stop

{{ Asset::queue('sieve', 'js/sieve/sieve.js', 'jquery.js') }}
{{ Asset::queue('metadata', 'js/metadata/metadata.js', 'jquery.js') }}
{{ Asset::queue('tablesorter', 'js/tablesorter/tablesorter.min.js', 'jquery') }}

@section('scripts')
@parent
	<script>
		$(document).ready(function() {
			$("table.sieve").sieve({
				searchTemplate: "<div class='m-t-xs m-b-xs visible-lg'><input type='text' class='form-control input-sm' placeholder='Filter List...'></label></div>"
			});

			$("table.sortable").tablesorter({
				cssAsc: 'sortable asc',
				cssDesc: 'sortable desc',
				cssHeader: 'sortable'
			});

			$(document).on('click', '.action-preview', function(e)
			{
				e.preventDefault();

				alert("Hello");

				var cwlId = $(this).data('cwlid');

				window.open(
				  '{{ URL::to("vc/search/document/'+ cwlId +'/preview")}}',
				  '_blank' // <- This is what makes it open in a new window.
				);
			});

			$(document).on('click', '.action-download', function(e)
			{
				e.preventDefault();

				var cwlId = $(this).data('cwlid');

				window.open(
				  '{{ URL::to("vc/search/document/'+ cwlId +'/download")}}'
				);
			});

			$(document).on('click', '.action-view', function(e)
			{
				e.preventDefault();

				var cwlId = $(this).data('cwlid');

				window.open(
				  '{{ URL::to("vc/search/document/'+ cwlId +'")}}'
				);
			});
		});
	</script>
@stop

@section('content')

{{-- Page header --}}
<div class="m-b-md">
	<div class="row">
		<div class="col-sm-10">
			<h3 class="m-b-none">
				{{ HTML::formatDocumentTitle($document) }}
			</h3>
		</div>
		<div class="col-sm-6 m-t-md text-right">
			
		</div>
	</div>
</div>

<section class="panel panel-default">
	<header class="panel-heading text-right bg-light">
		<ul class="nav nav-tabs pull-left">
			<li class="active"><a href="#document-information" data-toggle="tab">Document Information</a></li>
			<li class=""><a href="#grantor-grantee" data-toggle="tab">Grantors/Grantees</a></li>
			<li class=""><a href="#abstract-survey" data-toggle="tab">Abstract/Survey Info</a></li>
			<li class=""><a href="#prior-references" data-toggle="tab">Prior References</a></li>
		</ul>
		<span class="hidden-sm">
			<a 	href="{{ URL::to("vc/search/document/{$document['cwlId']}/preview")}}">Preview Document</a>
		</span>
	</header>
	<div class="panel-body">
		<div class="tab-content">
			<div class="tab-pane fade active in" id="document-information">
				<table class="table table-striped">
					<tr>
						<td class="col-sm-2 font-bold">Date Executed</td>
						<td class="col-sm-10">{{ array_get($document, 'instrumentDate') }}</td>
					</tr>

					<tr>
						<td class="col-sm-2 font-bold">Date Files</td>
						<td class="col-sm-10">{{ array_get($document, 'fileDate') }}</td>
					</tr>

					<tr>
						<td class="col-sm-2 font-bold">Instrument Number</td>
						<td class="col-sm-10">{{ array_get($document, 'instrumentNumber', 'N/A') }}</td>
					</tr>

					<tr>
						<td class="col-sm-2 font-bold">Record Type (Book)</td>
						<td class="col-sm-10">{{ strtoupper(array_get($document, 'recordType')) }}</td>
					</tr>

					<tr>
						<td class="col-sm-2 font-bold">Instrument Type</td>
						<td class="col-sm-10">{{ strtoupper(array_get($document, 'instrumentType')) }}</td>
					</tr>

					<tr>
						<td class="col-sm-2 font-bold">Volume</td>
						<td class="col-sm-10">{{ array_get($document, 'volume') }}</td>
					</tr>

					<tr>
						<td class="col-sm-2 font-bold">Page</td>
						<td class="col-sm-10">{{ array_get($document, 'page') }} ({{ array_get($document, 'pageCount', 0) }} total pages)</td>
					</tr>
				</table>
			</div>
			<div class="tab-pane fade" id="grantor-grantee">
				<div class="row">
					<div class="col-sm-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-sm-6">
										<h3 class="panel-title">Grantors</h3>
									</div>
								</div>
							</div>
							<div class="panel-body">

								{{-- sieve container --}}
								<div class="sieve-container">
								</div>
							@if ( ! empty($document['grantor']))

								<?php $grantors = explode(",", $document['grantor']) ?>

								<table class="table table-striped sieve">

									@foreach ($grantors as $grantor)
									<tr>
										<td>{{ $grantor }}</td>
									</tr>
									@endforeach
								</table>
							@else
								<p>There are no grantors to display</p>
							@endif
							</div>
						</div>
					</div>
					
					<div class="col-sm-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-sm-6">
										<h3 class="panel-title">Grantees</h3>
									</div>
								</div>
							</div>
							<div class="panel-body">

								{{-- sieve container --}}
								<div class="sieve-container">
								</div>
							@if ( ! empty($document['grantee']))

								<?php $grantees = explode(",", $document['grantee']) ?>

								<table class="table table-striped sieve">

									@foreach ($grantees as $grantee)
									<tr>
										<td>{{ $grantee }}</td>
									</tr>
									@endforeach
								</table>
							@else
								<p>There are no grantees to display</p>
							@endif
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="abstract-survey">
				@if ( ! empty($document['survey']))
					<table class="table table-striped sieve sortable" id="abstract-survey-table">
						<thead>
							<tr>
								<th class="{sorter: 'digit'}">Abstract #</th>
								<th>Survey Name</th>
								<th class="{sorter: 'digit'}">Survey #</th>
								<th>Subdivision</th>
								<th class="{sorter: 'digit'}">Block</th>
								<th class="{sorter: 'digit'}">Lot</th>
								<th class="{sorter: 'digit'}">Acreage</th>
							</tr>
						</thead>

						<tbody>
							@foreach ($document['survey'] as $survey)
							<tr>
								<td>{{ array_get($survey, 'abstractNumber') }}</td>
								<td>{{ array_get($survey, 'surveyName') }}</td>
								<td>{{ array_get($survey, 'surveyNumber') }}</td>
								<td>{{ array_get($survey, 'subdivision') }}</td>
								<td>{{ array_get($survey, 'block') }}</td>
								<td>{{ array_get($survey, 'lot') }}</td>
								<td>{{ array_get($survey, 'acreage') }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				@else
					<p class="h3">There is no survey information to display.</p>
				@endif
			</div>
			<div class="tab-pane fade" id="prior-references">
				@if ( ! empty($priorReferencesWithMatches))
					@include('pjtitle/virtualcourthouse::document/partials/tab_priorReferences')
				@else
					<p class="h3">There is no prior reference information to display.</p>
				@endif
			</div>
		</div>
	</div>
</section>

@stop
