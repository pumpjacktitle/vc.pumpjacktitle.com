{{ Asset::queue('results-style', 'pjtitle/virtualcourthouse::css/results/style.css') }}

<div class="table-responsive">
	<table class="data-grid table table-striped b-t b-light">
		<thead>
			<tr>
				<th class="1%"></th>
				<th data-sort="county"  width="5%" class="sortable">{{{ trans('pjtitle/virtualcourthouse::results/table.county') }}}</th>
				<th data-sort="recordType" class="sortable" width="4%">{{{ trans('pjtitle/virtualcourthouse::results/table.recordType') }}}</th>
				<th data-sort="instrumentType" class="sortable" width="6%">{{{ trans('pjtitle/virtualcourthouse::results/table.instrumentType') }}}</th>
				<th data-sort="instrumentNumber" class="sortable" width="4%">{{{ trans('pjtitle/virtualcourthouse::results/table.instrumentNumber') }}}</th>
				<th data-sort="volume" class="sortable" width="3%">{{{ trans('pjtitle/virtualcourthouse::results/table.volume') }}}</th>
				<th data-sort="page" class="sortable" width="3%">{{{ trans('pjtitle/virtualcourthouse::results/table.page') }}}</th>
				<th data-sort="instrumentDate" class="sortable" width="6%">{{{ trans('pjtitle/virtualcourthouse::results/table.instrumentDate') }}}</th>
				<th data-sort="fileDate" class="sortable" width="6%">{{{ trans('pjtitle/virtualcourthouse::results/table.fileDate') }}}</th>
				<th width="14%">{{{ trans('pjtitle/virtualcourthouse::results/table.grantor') }}}</th>
				<th width="14%">{{{ trans('pjtitle/virtualcourthouse::results/table.grantee') }}}</th>
				<th width="33%">{{{ trans('pjtitle/virtualcourthouse::results/table.survey') }}}</th>
			</tr>
		</thead>

		<tbody>
			@foreach($priorReferencesWithMatches as $priorReference)
			<tr>
				<td>
					@if ( ! empty($priorReference['cwlId']))
					<div class="btn-group text-left">
					    <button type="button" class="btn btn-xs dropdown-toggle btn-default" data-toggle="dropdown">
					        <span class="fa fa-cogs"></span> <span class="caret"></span>
					    </button>

					    <ul class="dropdown-menu text-sm" role="menu">
					        <li><a href="#" class="action-view" data-cwlid="{{ array_get($priorReference, 'cwlId') }}">View Details</a></li>
					        <li><a href="#" class="action-preview" data-cwlid="{{ array_get($priorReference, 'cwlId') }}">Open in Preview</a></li>
					        <li><a href="#" class="action-download" data-cwlid="{{ array_get($priorReference, 'cwlId') }}">Download PDF</a></li>
					    </ul>
					</div>
					@else
					<div class="text-center">
						<a href="{{ $priorReference['searchLink'] }}" target="_blank" data-toggle="tooltip" data-original-title="Search for possible matches"><i class="fa fa-search"></i></a>
					</div>
					@endif

				</td>
				<td>{{ array_get($priorReference, 'county') }}</td>
				<td>{{ strtoupper(array_get($priorReference, 'recordType')) }}</td>
				<td>{{ strtoupper(array_get($priorReference, 'instrumentType')) }}</td>
				<td>{{ strtoupper(array_get($priorReference, 'instrumentNumber')) }}</td>
				<td>{{ strtoupper(array_get($priorReference, 'volume')) }}</td>
				<td>{{ array_get($priorReference, 'page') }}</td>
				<td>{{ array_get($priorReference, 'instrumentDate') }}</td>
				<td>{{ array_get($priorReference, 'fileDate') }}</td>
				<td>
					@if (empty($priorReference['grantor']))
						N/A
						@else
							<?php $grantor = explode("," , $priorReference['grantor']); ?>

						@foreach ($grantor as $g)
							<li>{{ strtoupper($g) }}</li>
						@endforeach
					@endif
				</td>

				<td>
					@if (empty($priorReference['grantee']))
					N/A
					@else
					<?php $grantee = explode("," , $priorReference['grantee']); ?>

					@foreach ($grantee as $g)
					<li>{{ strtoupper($g) }}</li>
					@endforeach
					@endif
				</td>
				<td>
					@if ( ! empty($priorReference['survey']))
						<table class="surveySortable">
							<thead>
								<th width="13%">Abst</th>
								<th width="26%">Survey</th>
								<th width="16%" class="{sorter: 'digit'}">Survey #</th>
								<th width="14%">Sub</th>
								<th width="14%" class="{sorter: 'digit'}">Block</th>
								<th width="14%" class="{sorter: 'digit'}">Lot</th>
								<th width="3%" class="{sorter: 'digit'}">Ac</th>
							</thead>

							<tbody>
								@foreach ($priorReference['survey'] as $survey)
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
						No survey information available
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
