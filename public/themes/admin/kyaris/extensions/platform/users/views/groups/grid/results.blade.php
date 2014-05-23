<script type="text/template" data-grid="main" data-template="results">

	<% _.each(results, function(r) { %>

		<tr>
			<td><input type="checkbox" name="entries[]" value="<%= r.id %>"></td>
			<td><a href="{{ URL::toAdmin('users/groups/<%= r.id %>/edit') }}"><%= r.name %></a></td>
			<td><%= r.slug %></td>
			<td><%= moment(r.created_at).format('MMM DD, YYYY') %></td>
			<td>
				<a href="{{ URL::toAdmin('users/groups/<%= r.id %>/edit') }}">
					<i class="fa fa-edit" data-toggle="tooltip" data-original-title="Edit"></i>
				</a>
			</td>
		</tr>

	<% }); %>

</script>
