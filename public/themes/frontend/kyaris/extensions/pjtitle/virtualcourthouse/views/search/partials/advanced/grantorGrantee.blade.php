<section class="panel panel-default no-border" id="section-grantorGrantee">
	<header class="panel-heading font-bold">
		<span class="panel-title">
			<span class="fa fa-group"></span>
			&nbsp; Grantees & Grantors

			<div class="pull-right visible-lg">
				<small>
					<a href="#help-grantor-grantee visible-lg" data-toggle="modal" data-target="#help-grantor-grantee" class="text-white">
						<span class="fa fa-question-circle"></span> Grantor/Grantee Search Tips
					</a>
				</small>
			</div>
		</span>
	</header>
	
	<div class="panel-body">

		{{-- Grantor --}}
		<div class="form-group" id="section-grantorGrantee-grantor" class="bg-white">
			<label class="col-sm-2 control-label">
				{{ trans('pjtitle/virtualcourthouse::search/form.grantor') }}
			</label>
			<div class="col-sm-10">
				<div class="row">
					<div class="col-sm-10">
						<input type="text" class="form-control tags" name="grantor" id="grantor" placeholder="text" data-defaultText="Add grantors here..." value="{{ array_get($input, 'grantor') }}" data-toggle="tooltip" data-original-title="A grantor is the person or entity who is transfering the interest, e.g. the seller.">
						<span class="help-block">{{ trans('pjtitle/virtualcourthouse::search/form.grantor_help') }}</span>
					</div>
					<div class="col-sm-2" id="section-grantorGrantee-grantor-matchall">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="grantor_match_all" value="match_all"{{ array_get($input, 'grantor_match_all') != 'match_all' ? null : ' checked' }}>
								{{ trans('pjtitle/virtualcourthouse::search/form.match_all_names') }}
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
				
		<div class="line line-dashed line-lg pull-in"></div>
				
		{{-- Grantee --}}
		<div class="form-group">
			<label class="col-sm-2 control-label">
				{{ trans('pjtitle/virtualcourthouse::search/form.grantee') }}
			</label>
			<div class="col-sm-10">
				<div class="row">
					<div class="col-sm-10">
						<input type="text" class="form-control tags" name="grantee" id="grantee" placeholder="text" data-defaultText="Add grantees here..." value="{{ array_get($input, 'grantee') }}">
						<span class="help-block">{{ trans('pjtitle/virtualcourthouse::search/form.grantee_help') }}</span>
					</div>
					<div class="col-sm-2">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="grantee_match_all" value="match_all"{{ array_get($input, 'grantee_match_all') != 'match_all' ? null : ' checked' }}>
								{{ trans('pjtitle/virtualcourthouse::search/form.match_all_names') }}
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="line line-dashed line-lg pull-in"></div>
			
		{{-- Grantor/Grantee --}}
		<div class="form-group m-b-n-xs">
			<label class="col-sm-2 control-label">
				{{ trans('pjtitle/virtualcourthouse::search/form.grantorGrantee') }}
			</label>
			<div class="col-sm-10">
				<div class="row">
					<div class="col-sm-10">
						<input type="text" class="form-control tags" name="grantor_and_grantee" id="grantor_and_grantee" placeholder="text" parsley-group="grantorGrantee_match_all" data-defaultText="Add grantors/grantees here..."  value="{{ array_get($input, 'grantor_and_grantee') }}">
						<span class="help-block">{{ trans('pjtitle/virtualcourthouse::search/form.grantorGrantee_help') }}</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
