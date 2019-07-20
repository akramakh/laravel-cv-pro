
    <div class="modal-content" style="width:auto;">
      <div class="modal-header">
          <h4 class="modal-title" style="margin:0;">Delete Education</h4>
        <button type="button" class="close" onclick="removeAlert()" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <div class="alert alert-success modal-alert" id="modal_alert" style="display:none;"></div>  
                {{-- Form Delete Post --}}
                <div class="form-group row col-sm-12">
            <label class="control-label col-sm-2"for="id">Degree</label>
              <input type="text" class="form-control col-sm-10" id="language_id_in" value="{{$edu->degree}}" disabled>
          </div>
          <div class="form-group row col-sm-12">
            <label class="control-label col-sm-2"for="id">Provider</label>
              <input type="text" class="form-control col-sm-10" id="language_id_in" value="{{$edu->provider}}" disabled>
          </div>

        <div class="deleteContent">
          Are You sure want to delete it <span class="title">?</span>
          <span class="hidden id"></span>
        </div>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-danger actionBtn" onclick="deleteEducation({{$edu->id}})">
          <span id="footer_action_button" class="glyphicon glyphicon-trash">Delete</span>
        </button>

        <button type="button" class="btn btn-warning" onclick="removeAlert()" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>close
        </button>

      </div>
    </div>