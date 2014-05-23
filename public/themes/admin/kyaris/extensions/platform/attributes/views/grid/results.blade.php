<script type="text/template" data-grid="main" data-template="results">

	<% _.each(results, function(r) { %>

		<tr>
			<td><input type="checkbox" name="entries[]" value="<%= r.id %>"></td>
			<td><a href="{{ URL::toAdmin('attributes/<%= r.id %>/edit') }}"><%= r.name %></a></td>
			<td><%= r.namespace %></td>
			<td><%= r.slug %></td>
			<td>
				<% if (r.enabled == 1) { %>
					{{{ trans('general.enabled') }}}
				<% } else { %>
					{{{ trans('general.disabled') }}}
				<% } %>
			</td>
			<td>
				<a href="{{ URL::toAdmin('attributes/<%= r.id %>/edit') }}">
					<i class="fa fa-edit" data-toggle="tooltip" data-original-title="Edit"></i>
				</a>
			</td>
		</tr>

	<% }); %>

</script>
