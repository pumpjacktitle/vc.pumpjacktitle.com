<script type="text/template" data-grid="main" data-template="results">

	<% _.each(results, function(r) { %>

		<tr>
			<td>
				<input<%= (r.id == {{ Sentry::getUser()->id }}) ? ' disabled' : '' %> type="checkbox" name="entries[]" value="<%= r.id %>">
			</td>
			<td>
				<a href="{{ URL::toAdmin('users/<%= r.id %>/edit') }}">
					<% if (r.first_name || r.last_name) { %>
					<%= r.first_name %> <%= r.last_name %>
					<% } else { %>
					N/A
					<% } %>
				</a>
			</td>
			<td><a href="mailto:<%= r.email %>"><%= r.email %></a></td>
			<td>
				<% if (r.activated == 1) { %>
					{{ trans('general.yes') }}
				<% } else { %>
					{{ trans('general.no') }}
				<% } %>
			</td>
			<td><%= moment(r.created_at).format('MMM DD, YYYY') %></td>
			<td>
				<a href="{{ URL::toAdmin('users/<%= r.id %>/edit') }}">
					<i class="fa fa-edit" data-toggle="tooltip" data-original-title="Edit"></i>
				</a>
			</td>
		</tr>

	<% }); %>

</script>
