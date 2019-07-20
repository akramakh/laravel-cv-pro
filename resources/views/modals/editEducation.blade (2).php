<div class="modal-content" style="width: auto;">
            <form>
                    {{ csrf_field() }}
                <div class="modal-header">
                    <h4 class="modal-title"  style="margin:0;">Add Education</h4>
                    <button type="button" class="close" onclick="removeAlert()" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success modal-alert" id="modal_alert" style="display:none;"></div>
                    <div class="form-group row col-md-12">
                        <label for="degree" class="col-md-4">Degree</label>
                        <input type="text" class="col-md-8" name="degree" id="degree">
                        
                    </div>
                    <div class="form-group row col-md-12">
                        <label for="provider" class="col-md-4">Provider</label>
                        <input type="text" class="col-md-8" id="provider" name="provider">
                    </div>
                    <div class="form-group row col-md-12">
                        <label for="from" class="col-md-4">From</label>
                        <input type="date" class="col-md-8" name="from" id="from">
                        
                    </div>
                    <div class="form-group row col-md-12">
                        <label for="to" class="col-md-4">To</label>
                        <input type="date" class="col-md-8" id="to" name="to">
                    </div>
                    <div class="form-group row col-md-12">
                        <label for="details" class="col-md-4">Details</label>
                        <textarea class="col-md-8" id="details" name="details"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-success" id="add_education" onclick="addEducation(this);">
                    <i class="fa fa-plus"></i> Add
                </button>
                <button type="button" class="btn btn-defualt" onclick="removeAlert()" data-dismiss="modal">
                    <i class="fa fa-remove"></i> Cancle
                </button>
            </div>
            </form>
        </div>