<script type="text/template" data-grid="main" data-template="results">

	<% _.each(results, function(r) { %>

		<tr>
			<td>
				<a href="{{ URL::toAdmin('operations/extensions/<%= r.slug %>/manage') }}"><%= r.name %></a>

				<span class="pull-right">
					<% if (r.installed) { %>
						<% if (r.enabled) { %>
						<span class="label label-success">{{{ trans('general.enabled') }}}</span>
						<% } else{ %>
						<span class="label label-warning">{{{ trans('general.disabled') }}}</span>
						<% } %>

						<span class="label label-success">{{{ trans('general.installed') }}}</span>
					<% } else{ %>
					<span class="label label-danger">{{{ trans('general.uninstalled') }}}</span>
					<% } %>
				</span>
			</td>
			<td><%= r.slug %></td>
			<td><%= r.version %></td>
		</tr>

	<% }); %>

</script>
