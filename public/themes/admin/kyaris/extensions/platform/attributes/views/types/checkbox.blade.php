<div class="form-group{{ $errors->first($attribute->slug, ' has-error') }}">
	<label for="{{ $attribute->slug }}" class="col-lg-3 control-label">{{{ $attribute->name }}}</label>

	<div class="col-lg-9">
		<input type="hidden" name="{{ $attribute->slug }}" value="0">
		@foreach ($attribute->options as $key => $value)
		<label class="checkbox-inline">
			<input type="checkbox" name="{{ $attribute->slug }}[]" value="{{ $key }}"{{ in_array($key, $entity->exists ? (is_array($entity->{$attribute->slug}) ? $entity->{$attribute->slug} : array()) : array()) ? ' checked="checked"' : null }}> {{ $value }}
		</label>
		@endforeach

		<span class="help-block">
			{{{ $errors->first('name', ':message') ?: $attribute->description }}}
		</span>
	</div>
</div>
