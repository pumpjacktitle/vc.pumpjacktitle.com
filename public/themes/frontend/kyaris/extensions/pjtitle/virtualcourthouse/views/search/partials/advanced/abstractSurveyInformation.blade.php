<section class="panel panel-default no-border">
	<header class="panel-heading font-bold">
		<span class="panel-title">
			<span class="fa fa-globe"></span>
			&nbsp; Abstract/Survey

			<div class="pull-right">
				<span class="fa fa-question-circle"></span>
			</div>
		</span>
	</header>
	<div class="panel-body">

		{{-- Abstract Number/Survey/Survey Number --}}
		<div class="form-group">
			<label class="col-sm-2 control-label">
				{{ trans('pjtitle/virtualcourthouse::search/form.abstractSurveyInfo') }}
			</label>
			
			<div class="col-sm-10">
				<div class="row">
					<div class="col-sm-2">
						<input type="text" id="abstractNumber" name="abstractNumber" class="form-control" value="{{ array_get($input, 'abstractNumber') }}" placeholder="{{ Lang::get('pjtitle/virtualcourthouse::search/form.abstractNumber') }}" />
					</div>

					<div class="col-sm-8">
						<input type="text" id="survey" name="survey" class="form-control" value="{{ array_get($input, 'survey') }}" placeholder="{{ Lang::get('pjtitle/virtualcourthouse::search/form.surveyName') }}" />
					</div>

					<div class="col-sm-2">
						<input type="text" id="surveyNumber" name="surveyNumber" class="form-control" value="{{ array_get($input, 'surveyNumber') }}" placeholder="{{ Lang::get('pjtitle/virtualcourthouse::search/form.surveyNumber') }}" />
					</div>
				</div>
			</div>
		</div>

		<div class="line line-dashed line-lg pull-in"></div>

		{{-- surveyAcreage --}}
		<div class="form-group">
			<label class="col-sm-2 control-label">
				{{ trans('pjtitle/virtualcourthouse::search/form.surveyAcreage') }}
			</label>
							
			<div class="col-sm-3">
				<div class="input-range input-group">
					<input type="text" class="form-control" name="surveyAcreage[start]" id="surveyAcreage_start" value="{{ array_get($input, 'surveyAcreage.start') }}" placeholder="{{ Lang::get('pjtitle/virtualcourthouse::search/form.start') }}" />
					<span class="input-group-addon">to</span>
					<input type="text" class="form-control"  name="surveyAcreage[end]" id="surveyAcreage_end" value="{{ array_get($input, 'surveyAcreage.end') }}" placeholder="{{ Lang::get('pjtitle/virtualcourthouse::search/form.end') }}" />
				</div>
			</div>
		</div>
	</div>
</section>
