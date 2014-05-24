<script type="text/template" data-grid="main" data-template="results">

	<% _.each(results, function(r) { %>

		<tr>
			<td>
				<input type="checkbox" name="entries[]" value="<%= r.cwlId %>">
			</td>
			<td>
				<!-- Single button -->
				<div class="btn-group text-left">
				    <button type="button" class="btn btn-xs dropdown-toggle btn-default" data-toggle="dropdown">
				        <span class="fa fa-cogs"></span> <span class="caret"></span>
				    </button>

				    <ul class="dropdown-menu text-sm" role="menu">
				        <li><a href="#" target="_blank" class="action-view" data-cwlid="<%= r.cwlId %>">View Details</a></li>
				        <li><a href="#" target="_blank" class="action-preview" data-cwlid="<%= r.cwlId %>">Open in Preview</a></li>
				        <li><a href="#" class="action-download" data-cwlid="<%= r.cwlId %>">Download PDF</a></li>
				        <li><a href="#" class="action-exclude" data-cwlid="<%= r.cwlId %>"><span class="text-danger">Remove from Results</span></a></li>
				    </ul>
				</div>
			</td>
			<td>
				<%= r.county.toUpperCase() %>
			</td>
			<td>
				<%= r.recordType.toUpperCase() %>
			</td>
			<td>
				<%= r.instrumentType.toUpperCase() %>
			</td>
			<td>
				<%= r.instrumentNumber %>
			</td>
			<td>
				<%= r.volume %>
			</td>
			<td>
				<% if (r.page > 0) { %>
					<%= r.page %>
				<% } %>
			</td>
			<td>
				<%= r.instrumentDate %>
			</td>
			<td>
				<%= r.fileDate %>
			</td>
			<td>
				<% var grantors = r.grantor.split(",") %>
				<ul class="list-unstyled">
				<% _.each(grantors, function(grantor) {%>
					<li> <%= grantor.toUpperCase() %></li>
				<% }); %>
				</ul>
			</td>
			<td>
				<% var grantees = r.grantee.split(",") %>
				<ul class="list-unstyled">
				<% _.each(grantees, function(grantee) {%>
					<li> <%= grantee.toUpperCase() %></li>
				<% }); %>
				</ul>
			</td>
			<td>
				<% if( r.survey.length > 0 || Object.keys(r.survey).length) { %>
					<table class="surveySortable">
						<thead>
							<th width="13%">Abst</th>
							<th width="26%">Survey</th>
							<th width="16%" class="{sorter: 'digit'}">Survey #</th>
							<th width="14%">Sub</th>
							<th width="14%" class="{sorter: 'digit'}">Block</th>
							<th width="14%" class="{sorter: 'digit'}">Lot</th>
							<th width="3%" class="{sorter: 'digit'}">Ac</th>
						</thead>

						<tbody>
					<% _.each(r.survey, function(s) { %>
							<tr>
								<td><%= s.abstractNumber %></td>
								<td><%= s.surveyName %></td>
								<td><%= s.surveyNumber %></td>
								<td><%= s.subdivision %></td>
								<td><%= s.block %></td>
								<td><%= s.lot %></td>
								<td><%= s.acreage %></td>
							</tr>
					<% }); %>
						</tbody>
					</table>
				<% } else { %>
					<p class="font-bold">No information available.</p>
				<% } %>
			</td>
		</tr>

	<% }); %>

</script>
