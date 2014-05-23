{{-- Name --}}
<div class="form-group{{ $errors->first('name', ' has-error') }}">
	<label for="name" class="col-lg-2 control-label">{{{ trans('platform/users::groups/form.name') }}}</label>
	<div class="col-lg-10">
		<input type="text" class="form-control" name="name" id="name" placeholder="{{{ trans('platform/users::groups/form.name') }}}" value="{{{ Input::old('name', $group->name) }}}">

		<span class="help-block">
			{{{ $errors->first('name', ':message') ?: trans('platform/users::groups/form.name_help') }}}
		</span>
	</div>
</div>

{{-- Slug --}}
<div class="form-group{{ $errors->first('slug', ' has-error') }}">
	<label for="slug" class="col-lg-2 control-label">{{{ trans('platform/users::groups/form.slug') }}}</label>
	<div class="col-lg-10">
		<input type="text" class="form-control" name="slug" id="slug" placeholder="{{{ trans('platform/users::groups/form.slug') }}}" value="{{{ Input::old('slug', $group->slug) }}}">

		<span class="help-block">
			{{{ $errors->first('slug', ':message') ?: trans('platform/users::groups/form.slug_help') }}}
		</span>
	</div>
</div>
