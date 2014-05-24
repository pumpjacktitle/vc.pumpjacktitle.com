<section class="panel panel-default no-border" id="section-keyword">
	<header class="panel-heading font-bold">
		<span class="panel-title">
			<span class="fa fa-magic"></span>
			&nbsp; {{ trans('pjtitle/virtualcourthouse::search/form.sections.keyword') }}

			<div class="pull-right">
				<small>
					<a href="#help-keyword" data-toggle="modal" data-target="#help-keyword" class="text-white">
						<span class="fa fa-question-circle"></span> Keyword Search Tips
					</a>
				</small>
			</div>
		</span>
	</header>
	
	<div class="panel-body">

		{{-- Grantor --}}
		<div class="form-group m-b-n-xs" id="section-keyword" class="bg-white">
			<label class="col-sm-2 control-label">
				{{ trans('pjtitle/virtualcourthouse::search/form.keyword') }}
			</label>
			<div class="col-sm-10">
				<div class="row">
					<div class="col-sm-10">
						<input type="text" class="form-control tags" name="keyword" id="keyword" placeholder="text" data-defaultText="Add keywords here..." value="{{ array_get($input, 'keyword') }}">
						<span class="help-block">{{ trans('pjtitle/virtualcourthouse::search/form.keyword_help') }}</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
