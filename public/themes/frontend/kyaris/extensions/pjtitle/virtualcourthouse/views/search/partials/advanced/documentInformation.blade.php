<section class="panel panel-default no-border">
	<header class="panel-heading font-bold">
		<span class="panel-title">
			<span class="fa fa-file"></span>
			&nbsp; Document Information

			<div class="pull-right">
				<span class="fa fa-question-circle"></span>
			</div>
		</span>
	</header>
	<div class="panel-body">

		{{-- Instrument Number --}}
		<div class="form-group">
			<label class="col-sm-2 control-label" for="instrumentNumber">
				{{ trans('pjtitle/virtualcourthouse::search/form.instrumentNumber') }}
			</label>
			<div class="col-sm-10">
				<input type="text" id="instrumentNumber" name="instrumentNumber" class="form-control tags" value="{{ array_get($input, 'instrumentNumber', '') }}" data-defaultText="Add Instrument Number(s)">
				<span class="help-block">{{ trans('pjtitle/virtualcourthouse::search/form.instrumentNumber_help') }}</span>
			</div>
		</div>

		<div class="line line-dashed line-lg pull-in"></div>

		{{-- Volume & Page --}}
		<div class="form-group">
			<label class="col-sm-2 control-label" for="volumePage">
				{{ trans('pjtitle/virtualcourthouse::search/form.volumePage') }}
			</label>
			
			<div class="row">
				<div class="col-sm-2">
					<input type="text" id="cwlvcda:volume" name="volume" class="form-control" value="{{ array_get($input, 'volume', '') }}" placeholder="Volume">
				</div>

				<div class="col-sm-2">
					<input type="text" id="page" name="page" class="form-control" value="{{ array_get($input, 'page', '') }}" placeholder="Page #">
				</div>
			</div>
		</div>

		<div class="line line-dashed line-lg pull-in"></div>

		{{-- Record Type --}}
		<div class="form-group">
			<label class="col-sm-2 control-label" for="recordType">
				{{ trans('pjtitle/virtualcourthouse::search/form.recordType') }}
			</label>
			<div class="col-sm-10">
				{{ Form::select(
					'recordType[]', 
					array("" => "Choose Record Types...") + $recordTypes, 
					array_get($input, 'recordType'),
					array(
						'multiple'                 => 'multiple',
						'class'                    => 'form-control selectize',
						'parsley-required-message' => 'You must choose at least one county.',
						'data-placeholder'         => 'Choose the record types that you want to search. Leave blank to search all.',
						'id'                       => 'cwlvcda-county'
					))
				}}

				<span class="help-block">{{ trans('pjtitle/virtualcourthouse::search/form.recordType_help') }}</span>
			</div>
		</div>

		<div class="line line-dashed line-lg pull-in"></div>

		{{-- Instrument Type --}}
		<div class="form-group">
			<label class="col-sm-2 control-label" for="instrumentType">
				{{ trans('pjtitle/virtualcourthouse::search/form.instrumentType') }}
			</label>
			<div class="col-sm-10">
				<input type="text" id="instrumentType" name="instrumentType" class="form-control tags" value="{{ array_get($input, 'instrumentType', '') }}" data-defaultText="Add Instrument Type(s)">
				<span class="help-block">{{ trans('pjtitle/virtualcourthouse::search/form.instrumentType_help') }}</span>
			</div>
		</div>

		<div class="line line-dashed line-lg pull-in"></div>

		{{-- Cause Number --}}
		<div class="form-group">
			<label class="col-sm-2 control-label" for="causeNumber">
				{{ trans('pjtitle/virtualcourthouse::search/form.causeNumber') }}

			</label>
			<div class="col-sm-10">
				<input type="text" id="causeNumber" name="causeNumber" class="form-control tags" value="{{ array_get($input, 'causeNumber', '') }}" data-defaultText="Add Cause Number(s)">
				<span class="help-block">{{ trans('pjtitle/virtualcourthouse::search/form.causeNumber_help') }}</span>
			</div>
		</div>

		<div class="line line-dashed line-lg pull-in"></div>

		{{-- Instrument Date --}}
		<div class="form-group{{ ($errors->has('instrumentDate.start') or $errors->has('instrumentDate.end')) ? ' has-error' : ' no-errors' }}">
			<label class="col-sm-2 control-label" for="instrumentDate">
				{{ trans('pjtitle/virtualcourthouse::search/form.instrumentDate') }}
			</label>
			
			<div class="col-sm-4">
				<div class="input-range input-group" id="datepicker">
					<input type="text" class="form-control strtotime" name="instrumentDate[start]" id="instrumentDate_start" value="{{ array_get($input, 'instrumentDate.start', '') }}" placeholder="{{ trans('pjtitle/virtualcourthouse::search/form.date.start') }}" parsley-americandate="true" />
					<span class="input-group-addon">to</span>
					<input type="text" class="form-control strtotime"  name="instrumentDate[end]" id="instrumentDate_end" value="{{ array_get($input, 'instrumentDate.end', '') }}" placeholder="{{ trans('pjtitle/virtualcourthouse::search/form.date.end') }}" parsley-afterdate="#instrumentDate_start"/>
				</div>

				<span class="help-block">
				 	@if ($errors->has('instrumentDate.start') or $errors->has('instrumentDate.start'))
				 		Please make sure you entered a valid date.
				 	@else
				 		The date the instrument was executed or signed
				 	@endif
				 </span>
			</div>
		</div>

		<div class="line line-dashed line-lg pull-in"></div>

		{{-- File Date --}}
		<div class="form-group">
			<label class="col-sm-2 control-label">
				{{ trans('pjtitle/virtualcourthouse::search/form.fileDate') }}
			</label>
							
			<div class="col-sm-4">
				<div class="input-range input-group">
					<input type="text" class="form-control strtotime" name="fileDate[start]" id="fileDate_start" value="{{ array_get($input, 'fileDate.start', '') }}" placeholder="{{ trans('pjtitle/virtualcourthouse::search/form.date.start') }}" />
					<span class="input-group-addon">to</span>
					<input type="text" class="form-control strtotime"  name="fileDate[end]" id="fileDate_end" value="{{ array_get($input, 'fileDate.end', '') }}" placeholder="{{ trans('pjtitle/virtualcourthouse::search/form.date.end') }}" />
				</div>

				<span class="help-block">
				 	@if ($errors->has('instrumentDate.end') or $errors->has('instrumentDate.end'))
				 		Please make sure you entered a valid date.
				 	@else
				 		The date the instrument was filed with the county.
				 	@endif
				 </span>
			</div>
		</div>
	</div>
</section>
