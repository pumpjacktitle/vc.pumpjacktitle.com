<section class="panel panel-dark no-border">
	<header class="panel-heading font-bold">
		<span class="panel-title">
			<span class="fa fa-credit-card"></span>
			&nbsp; Client Billing Information
		</span>
	</header>
	<div class="panel-body">

		<div class="row">
			<div class="col-sm-6">
				{{-- Client --}}
				<div  id="countyFormGroup" class="form-group{{ $errors->has('billingClient') ? " has-error" : null }}">
					<label class="col-sm-2 control-label" for="billingClient">
						{{ Lang::get('pjtitle/virtualcourthouse::search/form.billingClient') }}
					</label>

					<div class="col-sm-10">

						{{ Form::select(
							'billingClient', 
							array("" => "Choose a Client to Bill...") + $clients, 
							array_get($input, 'billingClient'),
							array(
								'class'                    => 'form-control selectize',
								'data-placeholder'         => 'Choose a Client to Bill',
								'id'                       => 'billing-client'
							))
						}}

						@if($errors->has('billingClient'))
						<span class="help-block">
							{{ $errors->first('billingClient') }}
						</span>
						@endif
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				{{-- WBS Numbers --}}
				<div  id="countyFormGroup" class="form-group{{ $errors->has('job_number') ? " has-error" : null }}">
					<label class="col-sm-2 control-label" for="job_number">
						{{ Lang::get('pjtitle/virtualcourthouse::search/form.billingJobNumber') }}
					</label>

					<div class="col-sm-10">

						{{ Form::select(
							'job_number', 
							array("" => "Choose a Job Number...", "Beta Testing" => "Beta Testing", "Land Supervision" => "Land Supervision", "southwest atascosa" => "southwest atascosa") + $wbsNumbers, 
							array_get($input, 'job_number'),
							array(
								'class'                    => 'form-control selectize',
								'data-placeholder'         => 'Choose a Job Number',
								'id'                       => 'job_number'
							))
						}}

						@if($errors->has('job_number'))
						<span class="help-block">
							{{ $errors->first('job_number') }}
						</span>
						@endif
					</div>
			</div>
		</div>
	</div>
</section>
