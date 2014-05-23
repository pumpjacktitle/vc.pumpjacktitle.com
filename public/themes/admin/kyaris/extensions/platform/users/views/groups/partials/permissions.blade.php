<div class="panel-group" id="accordion">

	@foreach ($permissions as $extension => $_permissions)
	<div class="panel panel-default">

		<div class="panel-heading">
			<h4 class="panel-title">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel-{{{ Str::slug($extension) }}}">
					{{{ $extension }}}
				</a>
			</h4>
		</div>

		<div id="panel-{{{ Str::slug($extension) }}}" class="panel-collapse collapse">

			<div class="panel-body">

				@foreach ($_permissions as $permission)
				<div class="form-group">

					<label class="col-lg-3 control-label">{{ $permission['label'] }}</label>

					<div class="col-lg-9">

						<label class="radio-inline" for="{{ $permission['permission'] }}_allow">
							<input type="radio" value="1" id="{{ $permission['permission'] }}_allow" name="permissions[{{ $permission['permission'] }}]"{{ (array_get($groupPermissions, $permission['permission']) == 1 ? ' checked="checked"' : null) }}>
							{{{ trans('platform/users::permissions.allow') }}}
						</label>

						<label class="radio-inline" for="{{ $permission['permission'] }}_deny">
							<input type="radio" value="0" id="{{ $permission['permission'] }}_deny" name="permissions[{{ $permission['permission'] }}]"{{ (array_get($groupPermissions, $permission['permission']) == 0 ? ' checked="checked"' : null) }}>
							{{{ trans('platform/users::permissions.deny') }}}
						</label>


					</div>

				</div>
				@endforeach

			</div>

		</div>

	</div>
	@endforeach

</div>
