    <div class="modal-content" style="width:auto;">
      <div class="modal-header">
          <h4 class="modal-title" style="margin:0;">Edit Education</h4>
        <button type="button" class="close" onclick="removeAlert()" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <div class="alert alert-success modal-alert" id="modal_alert" style="display:none;"></div>  
        <form class="form-horizontal" role="modal">

          <div class="form-group row col-md-12">
              <label for="degree" class="col-md-4">Degree</label>
              <input type="text" class="col-md-8" name="degree" id="degree" value="{{$edu->degree}}">
          </div>
          <div class="form-group row col-md-12">
              <label for="provider" class="col-md-4">Provider</label>
              <input type="text" class="col-md-8" id="provider" name="provider" value="{{$edu->provider}}">
          </div>
          <div class="form-group row col-md-12">
              <label for="from" class="col-md-4">From</label>
              <input type="date" class="col-md-8" name="from" id="from" value="{{$edu->start_date}}">
              
          </div>
          <div class="form-group row col-md-12">
              <label for="to" class="col-md-4">To</label>
              <input type="date" class="col-md-8" id="to" name="to" value="{{$edu->end_date}}">
          </div>
          <div class="form-group row col-md-12">
              <label for="details" class="col-md-4">Details</label>
              <textarea class="col-md-8" id="details" name="details"> {{$edu->more_info}}</textarea>
          </div>
        </form>
               
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary actionBtn" onclick="updateEducation({{$edu->id}} ,90 )">
          <span id="footer_action_button" class="glyphicon glyphicon-edit">Update</span>
        </button>

        <button type="button" class="btn btn-warning" onclick="removeAlert()" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>close
        </button>

      </div>
    </div>
<script>
</script>