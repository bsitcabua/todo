<!-- Modal -->
<div class="modal fade" id="update_item_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="delete_item_modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="delete_item_modalLabel">Update Todo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
            <input type="text" name="todo_id" id="update_todo_id" hidden>

            <div class="form-row">
                <div class="col-md-12 col-sm-12 mt-2">
                    <label class="my-1 mr-2">Todo name <b class="text-danger">*</b></label>
                    <input type="text" class="form-control input_control_update" name="name" id="update_name" placeholder="Todo name" required>
                </div>

                <div class="col-md-12 col-sm-12 mt-2">
                    <label class="my-1 mr-2">Due <b class="text-danger">*</b></label>
                    <div class="input-group">
                        <input type="date" class="form-control input_control_update" name="deadline_date" id="update_deadline_date" required>
                        <input type="time" class="form-control input_control_update" name="deadline_time" id="update_deadline_time" required>
                    </div>
                </div>
                {{-- <div class="col-md-6 col-sm-12 mt-2">
                    <label class="my-1 mr-2">Deadline date <b class="text-danger">*</b></label>
                    <input type="date" class="form-control input_control_update" name="deadline_date" id="update_deadline_date" required>
                </div>
                <div class="col-md-6 col-sm-12 mt-2">
                    <label class="my-1 mr-2">Deadline time <b class="text-danger">*</b></label>
                    <input type="time" class="form-control input_control_update" name="deadline_time" id="update_deadline_time" required>
                </div> --}}
                 
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="confirm_update_todo">Update</button>
        </div>
        </div>
    </div>
</div>