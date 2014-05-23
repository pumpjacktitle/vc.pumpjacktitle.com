{{-- Name --}}
<div class="form-group{{ $errors->first('name', ' has-error') }}">
	<label for="name" class="col-lg-2 control-label">{{{ trans('pjtitle/virtualcourthouse::counties/form.name') }}}</label>
	<div class="col-lg-10">
		<input type="text" class="form-control" name="name" id="name" placeholder="{{{ trans('pjtitle/virtualcourthouse::counties/form.name') }}}" value="{{{ Input::old('name', $county->name) }}}" requried>

		<span class="help-block">
			{{{ $errors->first('name', ':message') ?: trans('pjtitle/virtualcourthouse::counties/form.name_help') }}}
		</span>
	</div>
</div>

{{-- State --}}
<div class="form-group{{ $errors->first('state', ' has-error') }}">
	<label for="state" class="col-lg-2 control-label">{{{ trans('pjtitle/virtualcourthouse::counties/form.state') }}}</label>
	<div class="col-lg-10">
		<input type="text" class="form-control" name="state" id="state" placeholder="{{{ trans('pjtitle/virtualcourthouse::counties/form.state') }}}" value="{{{ Input::old('state', $county->state) }}}" requried>

		<span class="help-block">
			{{{ $errors->first('state', ':message') ?: trans('pjtitle/virtualcourthouse::counties/form.state_help') }}}
		</span>
	</div>
</div>

{{-- Enabled --}}
<div class="form-group{{ $errors->first('enabled', ' has-error') }}">
	<label for="enabled" class="col-lg-2 control-label">{{{ trans('pjtitle/virtualcourthouse::counties/form.enabled') }}}</label>
	<div class="col-lg-10">
		<select class="form-control" name="enabled" id="enabled" required>
			<option value="1"{{ Input::old('enabled', ! empty($county->enabled) ? ' selected="selected"' : null ) }}>{{ trans('general.yes') }}</option>
			<option value="0"{{ Input::old('enabled',  empty($county->enabled) ? ' selected="selected"' : null ) }}>{{ trans('general.no') }}</option>
		</select>

		<span class="help-block">
			{{{ $errors->first('enabled', ':message') ?: trans('pjtitle/virtualcourthouse::counties/form.enabled_help') }}}
		</span>
	</div>
</div>
