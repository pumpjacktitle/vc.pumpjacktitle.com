<section class="panel panel-default no-border">
	<header class="panel-heading font-bold">
		<span class="panel-title">
			<span class="fa fa-legal"></span>
			&nbsp; County

			<div class="pull-right">
				<small>
					<a href="#help-county" data-toggle="modal" data-target="#help-county" class="text-white">
						<span class="fa fa-question-circle"></span> County Search Tips
					</a>
				</small>
			</div>
		</span>
	</header>
	<div class="panel-body">

		{{-- Counties --}}
		<div  id="countyFormGroup" class="form-group m-b-n-xs{{ $errors->has('county') ? " has-error" : null }}">
			<div class="col-sm-12">

				{{ 
					Form::select(
						'county[]',
						$counties + array('' => 'Select a County'), 
						array_get($input, 'county'),
						[
							'multiple'         => 'multiple',
							'class'            => 'form-control selectize',
							'data-placeholder' => 'Choose at least one county',
							'id'               => 'county',
							'required'         => 'true'
						])
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
