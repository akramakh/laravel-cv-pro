
<style>
    .personal-img{
        width: 100%;
        display: inline-block;
    }
    .personal-img .img-wraper{
        width: 100%;
        height: 50%;
        background: #111111b3;
        z-index: 999;
        display: block;
        position: absolute;
        bottom: 0;
        right: 0;
        font-size:1.2em;
        text-align: center;
        padding: 15px;
    }
    .personal-img .img-container{
        width: 200px;
        height: 200px;
        margin: 10px auto;
        display: block;
        float: none;
        position:relative;
        overflow:hidden;
        
    }
    
    .personal-img .img-wraper:hover{
        cursor:pointer;
        font-size:1.5em;
        padding: 11px;
    }
    .alert-content{
        width: fit-content;
        margin: 0;
    }
    .close-alert{
        height: 20px;
        width: 20px;
        text-align: center;
        position: absolute;
        top: 10px;
        right: 10px;
    }
    .close-alert:hover{
        cursor:pointer;
    }
</style>

<div id="containerAccountSettings ">
        <form>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h4 class=""><strong>Personal Photo</strong></h4>
            <div class="personal-img">
                <div class="img-container">
                    <div class="img-wraper" data-toggle="modal" data-target="#modal" onclick="loadModalContent('/modal/edit-personal-photo')">
                        <i class="fa fa-camera"></i>
                    </div>
                    <img src="{{$user->info != null ? asset('img/'.$user->info->personal_photo) : 'img/defualt_personal_photo.jpg' }}" />
                </div>
            </div>
            <h4 class=""><strong>Personal Information</strong></h4>
    <div class="alert alert-success s-p-info-alert" id="s_p_info_alert" style="display:none;">
    <p class="alert-content"></p>
    <span class="close-alert" onclick="removeSettingsAlert('s-p-info-alert')"><i class="fa fa-close"></i></span>
    </div>

                <div class="form-group row">
                    <label for="first_name" class="col-md-3">First Name</label>
                    <input type="text" class="col-md-8" id="first_name" name="first_name" value="{{$user->first_name}}">
                </div>


                <div class="form-group row">
                    <label for="last_name" class="col-md-3">Last Name</label>
                    <input type="text" class="col-md-8" id="last_name" name="last_name" value="{{$user->last_name}}">
                </div>

                @if($user->info != null)
                <div class="form-group row">
                    <label for="jop_title" class="col-md-3">Jop Title</label>
                    <input type="text" class="col-md-8" id="jop_title" name="jop_title" value="{{$user->info->jop_title}}">
                </div>
                <div class="form-group row">
                    <label for="address" class="col-md-3">Address</label>
                    <input type="text" class="col-md-8" id="address" name="address" value="{{$user->info->address}}">
                </div>
                <div class="form-group row">
                    <label for="phone_number" class="col-md-3">Phone NO.</label>
                    <input type="text" class="col-md-8" id="phone_number" name="phone_number" value="{{$user->info->phone_number}}">
                </div>
                @endif
                <input type="button" class="btn btn-primary" name="update" value="Update" onclick="updateUserInfo()">
        </form>
    
    <hr>

</div>

<script>

    function updateUserInfo(){
        
        var first_name = $("#first_name");
        var last_name = $("#last_name");
        var jop_title = $("#jop_title");
        var address = $("#address");
        var phone_number = $("#phone_number");
        $.ajax({
            method: 'POST',
            url: '/settings/update-user-info',
            dataType: 'html',
            data: {
                '_token': "{{ csrf_token() }}",
                'first_name': first_name.val(),
                'last_name': last_name.val(),
                'jop_title': jop_title.val(),
                'address': address.val(),
                'phone_number': phone_number.val()
            },
            success: function(data){
                $('.s-p-info-alert').show();
                $('.s-p-info-alert > .alert-content').text(data);
            }
        });
    }
    function removeSettingsAlert(class){
        $('.'+class).hide();
    }
</script>
