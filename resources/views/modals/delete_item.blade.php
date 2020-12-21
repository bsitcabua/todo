<!-- Modal -->
<div class="modal fade" id="delete_item_modal" tabindex="-1" role="dialog" aria-labelledby="delete_item_modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="delete_item_modalLabel">Delete Todo?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete <span id="todo_name">Item Name</span>?</p>
            <input type="text" name="todo_id" id="todo_id" hidden>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" id="confirm_delete_todo">Delete</button>
        </div>
        </div>
    </div>
</div>