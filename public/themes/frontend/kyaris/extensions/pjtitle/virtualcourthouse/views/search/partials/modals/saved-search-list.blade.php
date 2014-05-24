<!-- Modal -->
<div class="modal fade" id="saved-searches-modal" tabindex="-1" role="dialog" aria-labelledby="saved-searchs-label" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" class="font-bold">Load a Saved Search</h4>
      </div>

      <div class="modal-body">
          <table class="table table-striped sieve sortable">
            <thead>
              <tr>
                <th>Search Name</th>
                <th>Criteria</th>
              </tr>
            </thead>

            <tbody>
              @foreach($savedSearches as $savedSearch)
              <tr>
                <td>
                  <a href="{{ URL::to("vc/search/{$savedSearch['_id']}/update") }}">{{ $savedSearch['savedName'] }}</a>
                </td>
                <td>{{ implode(", ", array_filter(array_flatten(array_except($savedSearch['input'], ['_token'])))) }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>

      <div class="modal-footer">
        <button class="btn btn-primary" name="submit" id="button-save-search" type="submit">Save Search</button>
      </div>
    </div>
  </div>
</div>
