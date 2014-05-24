{{-- First name --}}
<div class="form-group{{ $errors->first('first_name', ' has-error') }}">
	<label for="first_name" class="col-lg-2 control-label">{{{ trans('platform/users::users/form.first_name') }}}</label>
	<div class="col-lg-10">
		<input type="text" class="form-control" name="first_name" id="first_name" placeholder="{{{ trans('platform/users::users/form.first_name') }}}" value="{{{ Input::old('first_name', ! empty($user) ? $user->first_name : null) }}}" required>

		<span class="help-block">
			{{{ $errors->first('first_name', ':message') ?: trans('platform/users::users/form.first_name_help') }}}
		</span>
	</div>
</div>

{{-- Last name --}}
<div class="form-group{{ $errors->first('last_name', ' has-error') }}">
	<label for="last_name" class="col-lg-2 control-label">{{{ trans('platform/users::users/form.last_name') }}}</label>
	<div class="col-lg-10">
		<input type="text" class="form-control" name="last_name" id="last_name" placeholder="{{{ trans('platform/users::users/form.last_name') }}}" value="{{{ Input::old('last_name', ! empty($user) ? $user->last_name : null) }}}" required>

		<span class="help-block">
			{{{ $errors->first('last_name', ':message') ?: trans('platform/users::users/form.last_name_help') }}}
		</span>
	</div>
</div>

{{-- Email --}}
<div class="form-group{{ $errors->first('email', ' has-error') }}">
	<label for="email" class="col-lg-2 control-label">{{{ trans('platform/users::users/form.email') }}}</label>
	<div class="col-lg-10">
		<input type="text" class="form-control" name="email" id="email" placeholder="{{{ trans('platform/users::users/form.email') }}}" value="{{{ Input::old('email', ! empty($user) ? $user->email : null) }}}" data-rule-email required>

		<span class="help-block">
			{{{ $errors->first('email', ':message') ?: trans('platform/users::users/form.email_help') }}}
		</span>
	</div>
</div>

{{-- Groups --}}
<div class="form-group{{ $errors->first('groups', ' has-error') }}">
	<label for="groups" class="col-lg-2 control-label">{{{ trans('platform/users::users/form.groups') }}}</label>
	<div class="col-lg-10">
		<select class="form-control" name="groups[]" id="groups[]" multiple="multiple">
			@foreach ($groups as $group)
			<option value="{{ $group->id }}"{{ array_key_exists($group->id, $userGroups) ? ' selected="selected"' : null }}>{{ $group->name }}</option>
			@endforeach
		</select>

		<span class="help-block">
			{{{ $errors->first('groups', ':message') ?: trans('platform/users::users/form.groups_help') }}}
		</span>
	</div>
</div>

{{-- Activation status --}}
<div class="form-group{{ $errors->first('activated', ' has-error') }}">
	<label for="activated" class="col-lg-2 control-label">{{{ trans('platform/users::users/form.activated') }}}</label>
	<div class="col-lg-10">
		<select class="form-control" name="activated" id="activated" required>
			<option value="1"{{ Input::old('activated', $isActivated) === true ? ' selected="selected"' : null }}>{{ trans('general.yes') }}</option>
			<option value="0"{{ Input::old('activated', $isActivated) === false ? ' selected="selected"' : null }}>{{ trans('general.no') }}</option>
		</select>

		<span class="help-block">
			{{{ $errors->first('activated', ':message') ?: trans('platform/users::users/form.activated_help') }}}
		</span>
	</div>
</div>

{{-- Password --}}
<div class="form-group{{ $errors->first('password', ' has-error') }}">
	<label for="password" class="col-lg-2 control-label">{{{ trans("platform/users::users/form.{$mode}.password") }}}</label>
	<div class="col-lg-10">
		<input type="password" class="form-control" name="password" id="password" placeholder="{{{ trans("platform/users::users/form.{$mode}.password") }}}"{{ empty($user) ? ' required' : null }}>

		<span class="help-block">
			{{{ $errors->first('password', ':message') ?: trans("platform/users::users/form.{$mode}.password_help") }}}
		</span>
	</div>
</div>
