<div class="form-group{{ $errors->first($attribute->slug, ' has-error') }}">
	<label for="{{ $attribute->slug }}" class="col-lg-2 control-label">{{{ $attribute->name }}}</label>

	<div class="col-lg-10">
		<input type="hidden" name="{{ $attribute->slug }}" value="">
		<select multiple="multiple" name="{{ $attribute->slug }}[]" id="{{ $attribute->slug }}" class="form-control">
			@foreach ($attribute->options as $key => $value)
				<option value="{{ $key }}"{{ in_array($key, $entity->exists ? (is_array($entity->{$attribute->slug}) ? $entity->{$attribute->slug} : array()) : array()) ? ' selected="selected"' : null }}>{{ $value }}</option>
			@endforeach
		</select>

		<span class="help-block">
			{{{ $errors->first('name', ':message') ?: $attribute->description }}}
		</span>
	</div>
</div>
