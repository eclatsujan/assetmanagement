<div class="wrap"><h2>Decode Asset List</h2>
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Item</a>
<?php $myListTable->prepare_items(); ?>
<?php $myListTable->display(); ?>
<div class="modal" tabindex="-1" role="dialog" id="exampleModal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo __("Add New Decode Asset","decode") ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="GET">
          <p><?php echo $form; ?></p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
