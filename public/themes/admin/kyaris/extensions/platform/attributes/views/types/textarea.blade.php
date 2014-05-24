<div class="form-group{{ $errors->first($attribute->slug, ' has-error') }}">
	<label for="{{ $attribute->slug }}" class="col-lg-2 control-label">{{{ $attribute->name }}}</label>

	<div class="col-lg-10">
		<textarea class="form-control" name="{{ $attribute->slug }}" id="{{ $attribute->slug }}">{{{ Input::old($attribute->slug, ! empty($entity) ? $entity->{$attribute->slug} : null) }}}</textarea>

		<span class="help-block">
			{{{ $errors->first('name', ':message') ?: $attribute->description }}}
		</span>
	</div>
</div>
