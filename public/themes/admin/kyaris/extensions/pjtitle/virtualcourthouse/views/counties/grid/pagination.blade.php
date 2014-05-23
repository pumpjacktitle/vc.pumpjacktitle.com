<script type="text/template" data-grid="main" data-template="pagination">
	
	<% _.each(pagination, function(p) { %>

		<div class="col-sm-4 hidden-xs">
			<div class="btn-group dropup">

				<button id="actions" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" disabled>
					{{{ trans('general.bulk_actions') }}} <span class="caret"></span>
				</button>

				<ul class="dropdown-menu" role="menu">
					<li><a href="#" data-action="delete"><span class="text-danger">{{{ trans('button.bulk.delete') }}}</span></a></li>
				</ul>

			</div>
		</div>

		<div class="col-sm-4 text-center">
			<small class="text-muted inline m-t-sm m-b-sm">
				{{{ trans('general.showing') }}} <%= p.pageStart %> {{{ trans('general.to') }}} <%= p.pageLimit %> {{{ trans('general.of') }}} <span class="total"><%= p.filteredCount %></span>
			</small>
		</div>

		<div class="col-sm-4 text-right text-center-xs">                
			<ul class="pagination pagination-sm m-t-none m-b-none">
				<% if (p.prevPage !== null) { %>

					<li><a href="#" data-grid="main" data-page="1"><i class="fa fa-angle-double-left"></i></a></li>

					<li><a href="#" data-grid="main" data-page="<%= p.prevPage %>"><i class="fa fa-chevron-left"></i></a></li>

				<% } else { %>

					<li class="disabled"><span><i class="fa fa-angle-double-left"></i></span></li>

					<li class="disabled"><span><i class="fa fa-chevron-left"></i></span></li>

				<% } %>

				<%

				var numPages = 11,
					split    = numPages - 1,
					middle   = Math.floor(split / 2);

				var i = p.page - middle > 0 ? p.page - middle : 1,
					j = p.totalPages;

				j = p.page + middle > p.totalPages ? j : p.page + middle;

				i = j - i < split ? j - split : i;

				if (i < 1)
				{
					i = 1;
					j = p.totalPages > split ? split + 1 : p.totalPages;
				}

				%>

				<% for(i; i <= j; i++) { %>

					<% if (p.page === i) { %>

					<li class="active"><span><%= i %></span></li>

					<% } else { %>

					<li><a href="#" data-grid="main" data-page="<%= i %>"><%= i %></a></li>

					<% } %>

				<% } %>

				<% if (p.nextPage !== null) { %>

					<li><a href="#" data-grid="main" data-page="<%= p.nextPage %>"><i class="fa fa-chevron-right"></i></a></li>

					<li><a href="#" data-grid="main" data-page="<%= p.totalPages %>"><i class="fa fa-angle-double-right"></i></a></li>

				<% } else { %>

					<li class="disabled"><span><i class="fa fa-chevron-right"></i></span></li>

					<li class="disabled"><span><i class="fa fa-angle-double-right"></i></span></li>

				<% } %>
			</ul>
		</div>
	<% }); %>

</script>
