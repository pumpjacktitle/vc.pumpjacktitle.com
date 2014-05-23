<section class="panel panel-dark no-border">
	<header class="panel-heading font-bold">
		<span class="panel-title">
			<span class="fa fa-legal"></span>
			&nbsp; County

			<div class="pull-right">
				<small>
					<a href="{{ URL::to('vc/help/searching-counties') }}" data-toggle="modal" data-target="#modal-help" class="text-white">
						<span class="fa fa-question-circle"></span> County Search Tips
					</a>
				</small>
			</div>
		</span>
	</header>
	<div class="panel-body">

		<p>Choose the county that you would like to search in. You can select multiple counties, but at least one county is required.</p>

		{{-- Counties --}}
		<div class="form-group m-b-n-xs{{ $errors->has('county') ? " has-error" : null }}">
			<div class="col-sm-12">

				{{ Form::select(
					'county', 
					array("" => "Choose a county to search...") + $counties, 
					array_get($input, 'county'),
					array(
						'multiple'                 => 'multiple',
						'class'                    => 'form-control multiple',
						'data-placeholder'         => 'Choose at least one county',
						'id'                       => 'cwlvcda-county',
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
