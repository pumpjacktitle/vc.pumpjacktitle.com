<section class="panel panel-default no-border">
	<header class="panel-heading font-bold">
		<span class="panel-title">
			<span class="fa fa-globe"></span>
			&nbsp; Subdivision

			<div class="pull-right">
				<span class="fa fa-question-circle"></span>
			</div>
		</span>
	</header>
	<div class="panel-body">
		{{-- Subdivision/Block/Lot --}}
		<div class="form-group" class="subdivisionInfo">
			<label class="col-sm-2 control-label" for="subdivision">
				{{ trans('pjtitle/virtualcourthouse::search/form.subdivisionInfo') }}
			</label>
			
			<div class="col-sm-10">
					<input type="text" id="subdivision" name="subdivision" class="form-control" value="{{ array_get($input, 'subdivision') }}" placeholder="{{ trans("pjtitle/virtualcourthouse::search/form.subdivision_help") }}">
			</div>
		</div>

		<div class="form-group" class="subdivisionInfo">
			<label class="col-sm-2 control-label" for="subdivision">
				{{ trans('pjtitle/virtualcourthouse::search/form.blocksAndLots') }}
			</label>
			
			<div class="col-sm-10">
				@if ( empty($input['blockLotRows']))
				<div class="row">
					<div class="col-sm-2">
							<input type="text" id="block" name="blockLotRows[0][block]" class="form-control" value="" placeholder="{{ trans("pjtitle/virtualcourthouse::search/form.block_help") }}">
					</div>

					<div class="col-sm-2">
						<input type="text" id="lot" name="blockLotRows[0][lot]" class="form-control" value="" placeholder="{{ trans("pjtitle/virtualcourthouse::search/form.lot_help") }}">
					</div>

					<div class="col-sm-8">
						<button type="button" class="btn btn-default btn-success"><i class="fa fa-plus-circle" onclick="javascript:addRow();" data-toggle="tooltip" data-original-title="Click here to add more lots & blocks to your search." data-container="body"></i></button>
					</div>
				</div>
				@else
					<?php $rowNum = 0; ?>
					@foreach($input['blockLotRows'] as $row)
					<div class="row m-t-sm" id="rowNum{{$rowNum}}">
						<div class="col-sm-2">
								<input type="text" id="block{{$rowNum}}" name="blockLotRows[{{$rowNum}}][block]" class="form-control" value="{{ array_get($row, 'block') }}" placeholder="{{ trans("pjtitle/virtualcourthouse::search/form.block_help") }}">
						</div>

						<div class="col-sm-2">
							<input type="text" id="lot{{$rowNum}}" name="blockLotRows[{{$rowNum}}][lot]" class="form-control" value="{{ array_get($row, 'lot') }}" placeholder="{{ trans("pjtitle/virtualcourthouse::search/form.lot_help") }}">
						</div>

						<div class="col-sm-8">
							@if ($rowNum > 0)
							<button type="button" class="btn btn-danger"><i class="fa fa-minus-circle" onclick="javascript:deleteRow({{$rowNum}});"></i></button>
							@endif
							<button type="button" class="btn btn-success"><i class="fa fa-plus-circle" onclick="javascript:addRow();"></i></button>
						</div>
					</div>

					<?php $rowNum++; ?>
					@endforeach
				@endif
				
				{{-- dynamc rows will be added here --}}
				<div id="blockLotRows"></div>
			</div>
		</div>
	</div>
</section>
