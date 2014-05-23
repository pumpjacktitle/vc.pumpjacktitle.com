<div class="form-group{{ $errors->first($attribute->slug, ' has-error') }}">
	<label for="{{ $attribute->slug }}" class="col-lg-3 control-label">{{{ $attribute->name }}}</label>

	<div class="col-lg-9">
		@foreach ($attribute->options as $key => $value)
		<label class="radio-inline">
			<input type="radio" name="{{ $attribute->slug }}" value="{{ $key }}" {{ Input::old($attribute->slug, $entity->exists ? $entity->{$attribute->slug} : null) == $key ? ' checked="true"' : null }}> {{ $value }}
		</label>
		@endforeach

		<span class="help-block">
			{{{ $errors->first('name', ':message') ?: $attribute->description }}}
		</span>
	</div>
</div>
