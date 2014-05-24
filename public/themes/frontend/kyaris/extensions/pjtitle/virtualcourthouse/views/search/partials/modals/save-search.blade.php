<!-- Modal -->
<div class="modal fade" id="save-search-modal" tabindex="-1" role="dialog" aria-labelledby="save-search-label" aria-hidden="true">
  <form action="remote.php" method="post" data-async>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" class="font-bold">Save This Search</h4>
      </div>

      <div class="modal-body">
          <div class="form-group">
            <label for="name" class="font-bold">Name Your Search</label>
            <input type="text" class="form-control" name="entries[]" id="entries" placeholder="Name your search">
          </div>
      </div>

      <div class="modal-footer">
        <button class="btn btn-primary" name="submit" id="button-save-search" type="submit">Save Search</button>
      </div>
    </div>
  </div>
  </form>
</div>
