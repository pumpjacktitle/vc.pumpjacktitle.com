<section class="panel panel-dark no-border" id="section-keyword">
	<header class="panel-heading font-bold">
		<span class="panel-title">
			<span class="fa fa-archive"></span>
			&nbsp; {{ trans('pjtitle/vc::search/form.alfresco_section_title') }}
		</span>
	</header>
	
	<div class="panel-body">

		{{-- Batch ID --}}
		<div class="form-group m-b-n-xs" id="section-batch-id" class="bg-white">
			<label class="col-sm-2 control-label">
				{{ trans('pjtitle/vc::search/form.batchId') }}
			</label>
			<div class="col-sm-10">
				<div class="row">
					<div class="col-sm-10">
						<input type="text" class="form-control tags" name="batchId" id="batchId" placeholder="text" data-defaultText="Add Batch IDs here..." value="{{ array_get($input, 'batchId') }}">
						<span class="help-block">{{ trans('pjtitle/vc::search/form.batchId_help') }}</span>
					</div>
				</div>
			</div>
		</div>

		{{-- CWL ID --}}
		<div class="form-group m-b-n-xs" id="section-batch-id" class="bg-white">
			<label class="col-sm-2 control-label">
				{{ trans('pjtitle/vc::search/form.cwlid') }}
			</label>
			<div class="col-sm-10">
				<div class="row">
					<div class="col-sm-10">
						<input type="text" class="form-control tags" name="cwlid" id="cwlid" placeholder="text" data-defaultText="Add CWL IDs here..." value="{{ array_get($input, 'cwlid') }}">
						<span class="help-block">{{ trans('pjtitle/vc::search/form.cwlid_help') }}</span>
					</div>
				</div>
			</div>
		</div>

		<div class="line line-dashed line-lg pull-in"></div>

		{{-- Date Created --}}
		<div class="form-group{{ ($errors->has('created.start') or $errors->has('created.end')) ? ' has-error' : ' no-errors' }}">
			<label class="col-sm-2 control-label" for="created">
				{{ trans('pjtitle/vc::search/form.created') }}
			</label>
			
			<div class="col-sm-10">
				<div class="input-range input-group">
					<input type="text" class="form-control strtotime" name="created[start]" id="created_start" value="{{ array_get($input, 'created.start', '') }}" placeholder="{{ trans('general.start') }}" parsley-americandate="true" />
					<span class="input-group-addon">to</span>
					<input type="text" class="form-control strtotime"  name="created[end]" id="created_end" value="{{ array_get($input, 'created.end', '') }}" placeholder="{{ trans('general.end') }}" parsley-afterdate="#created_start"/>
				</div>

				<span class="help-block">
				 	@if ($errors->has('created.start') or $errors->has('created.end'))
				 		Please make sure you entered a valid date.
				 	@else
				 		The date the instrument was added to Alfresco
				 	@endif

				 	&nbsp;<a href="javascript:void();" class="time-help-modal text-info"><span class="fa fa-lightbulb-o m-r-xs"></span> Helpful Tips for Searching Dates</a>
				 </span>
			</div>
		</div>

		<div class="line line-dashed line-lg pull-in"></div>

		{{-- Date Created --}}
		<div class="form-group{{ ($errors->has('modified.start') or $errors->has('modified.end')) ? ' has-error' : ' no-errors' }}">
			<label class="col-sm-2 control-label" for="modified">
				{{ trans('pjtitle/vc::search/form.modified') }}
			</label>
			
			<div class="col-sm-10">
				<div class="input-range input-group">
					<input type="text" class="form-control strtotime" name="modified[start]" id="modified_start" value="{{ array_get($input, 'modified.start', '') }}" placeholder="{{ trans('general.start') }}" parsley-americandate="true" />
					<span class="input-group-addon">to</span>
					<input type="text" class="form-control strtotime"  name="modified[end]" id="modified_end" value="{{ array_get($input, 'modified.end', '') }}" placeholder="{{ trans('general.end') }}" parsley-afterdate="#modified_start"/>
				</div>

				<span class="help-block">
				 	@if ($errors->has('modified.start') or $errors->has('modified.end'))
				 		Please make sure you entered a valid date.
				 	@else
				 		The date the instrument was last modified in Alfresco
				 	@endif

				 	&nbsp;<a href="javascript:void();" class="time-help-modal text-info"><span class="fa fa-lightbulb-o m-r-xs"></span> Helpful Tips for Searching Dates</a>
				 </span>
			</div>
		</div>

		<div class="line line-dashed line-lg pull-in"></div>

		{{-- Counties --}}
		<div  id="statusFormGroup" class="form-group m-b-n-xs{{ $errors->has('county') ? " has-error" : null }}">

			<label class="col-sm-2 control-label">
				{{ trans('pjtitle/vc::search/form.status') }}
			</label>

			<div class="col-sm-10">

				{{ Form::select(
					'status', 
					array("" => "Choose a document status...") + Config::get('pjtitle/vc::documentStatusOptions'), 
					array_get($input, 'status'),
					array(
						'class'                    => 'form-control',
						'data-placeholder'         => 'Choose at Document Status',
						'id'                       => 'cwlvcda-county'
					))
				}}

				@if($errors->has('county'))
				<span class="help-block">
					{{ $errors->first('county') }}
				</span>
				@endif
			</div>
		</div>
	</div>
</section>
