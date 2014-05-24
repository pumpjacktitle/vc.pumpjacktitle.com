<div class="form-group{{ $errors->first($attribute->slug, ' has-error') }}">
	<label for="{{ $attribute->slug }}" class="col-lg-2 control-label">{{{ $attribute->name }}}</label>

	<div class="col-lg-10">
		<select name="{{ $attribute->slug }}" id="{{ $attribute->slug }}" class="form-control">
			@foreach ($attribute->options as $key => $value)
				<option value="{{ $key }}" {{ Input::old($attribute->slug, $entity->exists ? $entity->{$attribute->slug} : null) == $key ? ' selected="selected"' : null }}>{{ $value }}</option>
			@endforeach
		</select>

		<span class="help-block">
			{{{ $errors->first('name', ':message') ?: $attribute->description }}}
		</span>
	</div>
</div>
