<style>
.form-group{
        display:contents;
    }
</style>
<div class="modal-content" style="width: auto;">
            <form>
                    {{ csrf_field() }}
                <div class="modal-header">
                    <h4 class="modal-title"  style="margin:0;">Add Skill</h4>
                    <button type="button" class="close" onclick="removeAlert()" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success modal-alert" id="modal_alert" style="display:none;"></div>
                    <div class="form-group row col-md-12">
                        <label for="skill_name" class="col-md-4">Skill Name</label>

                        <input type="text" class="col-md-8" name="skill_name" id="skill_name" />
                    </div>
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-success" id="add_skill" onclick="addSkill(this);">
                    <i class="fa fa-plus"></i> Add
                </button>
                <button type="button" class="btn btn-defualt" onclick="removeAlert()" data-dismiss="modal">
                    <i class="fa fa-remove"></i> Cancle
                </button>
            </div>
            </form>
        </div>