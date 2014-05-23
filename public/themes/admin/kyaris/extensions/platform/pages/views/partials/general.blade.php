<div class="row">
	<div class="col-md-8">
		
		<div class="row">
			<div class="col-md-8">

				{{-- Name --}}
				<div class="form-group{{ $errors->first('name', ' has-error') }}">
					<label for="name" class="control-label">{{{ trans('platform/pages::form.name') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/pages::form.name_help') }}}"></i></label>
					<input type="text" class="form-control" name="name" id="name" placeholder="{{{ trans('platform/pages::form.name') }}}" value="{{{ Input::old('name', $page->name) }}}" required>
					<span class="help-block">{{{ $errors->first('name', ':message') }}}</span>
				</div>
			</div>

			<div class="col-md-4">
				{{-- Slug --}}
				<div class="form-group{{ $errors->first('slug', ' has-error') }}">
					<label for="slug" class="control-label">{{{ trans('platform/pages::form.slug') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/pages::form.slug_help') }}}"></i></label>
					<input type="text" class="form-control" name="slug" id="slug" placeholder="{{{ trans('platform/pages::form.slug') }}}" value="{{{ Input::old('slug', $page->slug) }}}" required>
					<span class="help-block">{{{ $errors->first('slug', ':message') }}}</span>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8">
				{{-- Uri --}}
				<div class="form-group{{ $errors->first('uri', ' has-error') }}">
					<label for="uri" class="control-label">{{{ trans('platform/pages::form.uri') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/pages::form.uri_help') }}}"></i></label>
					<input type="text" class="form-control" name="uri" id="uri" placeholder="{{{ trans('platform/pages::form.uri') }}}" value="{{{ Input::old('uri', $page->uri) }}}" required>
					<span class="help-block">{{{ $errors->first('uri', ':message') }}}</span>
				</div>
			</div>

			<div class="col-md-4">
				{{-- Enabled --}}
				<div class="form-group{{ $errors->first('enabled', ' has-error') }}">
					<label for="enabled" class="control-label">{{{ trans('platform/pages::form.enabled') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/pages::form.enabled_help') }}}"></i></label>
					<div class="xcol-lg-4">
						<select class="form-control" name="enabled" id="enabled" required>
							<option value="1"{{ Input::old('enabled', $page->enabled) == 1 ? ' selected="selected"' : null }}>{{{ trans('general.enabled') }}}</option>
							<option value="0"{{ Input::old('enabled', $page->enabled) == 0 ? ' selected="selected"' : null }}>{{{ trans('general.disabled') }}}</option>
						</select>

						<span class="help-block">{{{ $errors->first('enabled', ':message') }}}</span>
					</div>
				</div>
			</div>
		</div>

		<div class="row">

			<div class="col-md-6">
				{{-- Type --}}
				<div class="form-group{{ $errors->first('type', ' has-error') }}">
					<label for="type" class="control-label">{{{ trans('platform/pages::form.type') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/pages::form.type_help') }}}"></i></label>
					<select class="form-control" name="type" id="type" required>
						<option value="database"{{ Input::old('type', $page->type) == 'database' ? ' selected="selected"' : null }}>{{{ trans('platform/content::form.database') }}}</option>
						<option value="filesystem"{{ Input::old('type', $page->type) == 'filesystem' ? ' selected="selected"' : null }}>{{{ trans('platform/content::form.filesystem') }}}</option>
					</select>
					<span class="help-block">{{{ $errors->first('type', ':message') }}}</span>
				</div>
			</div>

			<div class="col-md-6">
				{{-- Type : Database --}}
				<div data-type="database" class="{{ Input::old('type', $page->type) != 'database' ? ' hide' : null }}">
					{{-- Template --}}
					<div class="form-group{{ $errors->first('template', ' error') }}">
						<label for="template" class="control-label">{{{ trans('platform/pages::form.template') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/pages::form.template_help') }}}"></i></label>

						<select class="form-control" name="template" id="template"{{ Input::old('type', $page->type) == 'database' ? ' required' : null }}>
						@foreach ($templates as $value => $name)
							<option value="{{ $value }}"{{ Input::old('template', $page->template) == $value ? ' selected="selected"' : null}}>{{ $name }}</option>
						@endforeach
						</select>

						<span class="help-block">{{{ $errors->first('template', ':message') }}}</span>
					</div>
				</div>

				{{-- Type : Filesystem --}}
				<div data-type="filesystem" class="{{ Input::old('type', $page->type) != 'filesystem' ? ' hide' : null }}">
					{{-- File --}}
					<div class="form-group{{ $errors->first('file', ' error') }}">
					<label for="file" class="control-label">{{{ trans('platform/pages::form.file') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/pages::form.file_help') }}}"></i></label>
						<select class="form-control" name="file" id="file"{{ Input::old('type', $page->type) == 'filesystem' ? ' required' : null }}>
						@foreach ($files as $value => $name)
							<option value="{{ $value }}"{{ Input::old('file', $page->file) == $value ? ' selected="selected"' : null}}>{{ $name }}</option>
						@endforeach
						</select>

						<span class="help-block">{{{ $errors->first('file', ':message') }}}</span>
					</div>
				</div>
			</div>
		</div>

		{{-- Type : Database --}}
		<div data-type="database" class="{{ Input::old('type', $page->type) != 'database' ? ' hide' : null }}">

			{{-- Section --}}
			<div class="form-group{{ $errors->first('section', ' has-error') }}">
				<label for="section" class="control-label">{{{ trans('platform/pages::form.section') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/pages::form.section_help') }}}"></i></label>
				<div class="input-group">
						<span class="input-group-addon">@</span>
					<input type="text" class="form-control" name="section" id="section" placeholder="{{{ trans('platform/pages::form.section') }}}" value="{{{ Input::old('section', $page->section) }}}">
				</div>
				<span class="help-block">{{{ $errors->first('section', ':message') }}}</span>
			</div>

			{{-- Value --}}
			<div class="form-group{{ $errors->first('value', ' has-error') }}">
				<label for="value" class="control-label">{{{ trans('platform/pages::form.value') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/pages::form.value_help') }}}"></i></label>
				<textarea class="form-control redactor" name="value" id="value">{{{ Input::old('value', $page->value) }}}</textarea>
				<span class="help-block">{{{ $errors->first('value', ':message') }}}</span>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		
		{{-- Visibility --}}
		<div class="well well-borderless">
			<fieldset>
				<legend>{{{ trans('platform/pages::form.visibility.legend') }}}</legend>
				<div class="form-group{{ $errors->first('visibility', ' has-error') }}">
					<label for="visibility" class="control-label">{{{ trans('platform/pages::form.visibility.legend') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/pages::form.visibility_help') }}}"></i></label>

					<select class="form-control" name="visibility" id="visibility" required>
						<option value="always"{{ Input::old('visibility', $page->visibility) == 'always' ? ' selected="selected"' : null }}>{{{ trans('platform/pages::form.visibility.always') }}}</option>
						<option value="logged_in"{{ Input::old('visibility', $page->visibility) == 'logged_in' ? ' selected="selected"' : null }}>{{{ trans('platform/pages::form.visibility.logged_in') }}}</option>
						<option value="admin"{{ Input::old('visibility', $page->visibility) == 'admin' ? ' selected="selected"' : null }}>{{{ trans('platform/pages::form.visibility.admin') }}}</option>
					</select>

					<span class="help-block">
						{{{ $errors->first('visibility', ':message') }}}
					</span>
				</div>

				<div class="form-group{{ $errors->first('groups', ' has-error') }}">
					<label for="groups" class="control-label">{{{ trans('platform/pages::form.groups') }}} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-container="body" data-original-title="{{{ trans('platform/pages::form.groups_help') }}}"></i></label>

					<select class="form-control" name="groups[]" id="groups" multiple="multiple"{{ Input::old('visibility', $page->visibility) == 'always' ? ' disabled="disabled"' : null }}>
					@foreach ($groups as $group)
						<option value="{{ $group->id }}"{{ in_array($group->id, Input::get('groups', $page->groups)) ? ' selected="selected"' : null }}>{{ $group->name }}</option>
					@endforeach
					</select>

					<span class="help-block">
						{{{ $errors->first('groups', ':message') }}}
					</span>
				</div>
			</fieldset>
		</div>

		<div class="well well-borderless">

			<fieldset>
				<legend>{{{ trans('platform/pages::form.navigation.legend') }}}</legend>
				<p>{{{ trans('platform/pages::form.navigation_help') }}}</p>
				<div class="form-group{{ $errors->first('menu', ' has-error') }}">
					<label for="menu" class="control-label">{{{ trans('platform/pages::form.navigation.menu') }}}</label>

					<select class="form-control" name="menu" id="menu">
					<option value="-">{{{ trans('platform/pages::form.navigation.select_menu') }}}</option>
					@foreach ($menus as $item)
						<option value="{{ $item->menu }}"{{ ( ! empty($menu) and $menu->menu == $item->menu) ? ' selected="selected"' : null }}>{{ $item->name }}</option>
					@endforeach
					</select>
				</div>

				@foreach ($menus as $item)
				<div{{ ( ! empty($menu) and $menu->menu == $item->menu) ? null : ' class="hide"' }} data-menu-parent="{{{ $item->menu }}}">
					@widget('platform/menus::dropdown.show', [$item->slug, 0, $menu->exists ? $menu->getParent()->id : null, ['id' => 'parent_id', 'name' => "parent[{$item->menu}]", 'class' => 'form-control'], ['0' => trans('platform/pages::form.navigation.top_level')]])
				</div>
				@endforeach
			</fieldset>
		</div>
	</div>
</div>
