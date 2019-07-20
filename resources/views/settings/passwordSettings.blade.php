<style>
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

<div id="containerPasswordSettings">
    <h4><strong>Password Settings</strong></h4>
    <form class="form-horizontal" >
    <!-- Start Date of Birth Field -->
    <div class="alert alert-success s-p-pass-alert" id="s_p_pass_alert" style="display:none;">
        <p class="alert-content"></p>
        <span class="close-alert" onclick="removeSettingsAlert('s-p-pass-alert')"><i class="fa fa-close"></i></span>
    </div>
    <div class="row form-group form-group-lg">
        <label class="col-sm-3 control-label">Old Password</label>
        <div class="col-sm-9 col-md-9">
            <input type="password" id="oldpassword" class="form-control password" autocomplete="off" placeholder="Be carefull"/>
        </div>
    </div>
    
    <div class="row form-group form-group-lg">
        <label class="col-sm-3 control-label">New Password</label>
        <div class="col-sm-9 col-md-9">
            <input type="password" id="newpassword" class="form-control password" autocomplete="off" placeholder="Make it Strong"/>
        </div>
    </div>
    
    <div class="row form-group form-group-lg">
        <label class="col-sm-3 control-label">Confirm New Password</label>
        <div class="col-sm-9 col-md-9">
            <input type="password" id="confpassword" class="form-control password" autocomplete="off" placeholder="Make it Correct"/>
        </div>
        <div id="pass-alert" style="display:none; color:#F00;">Please Fill All Fields</div>
         <div id="err-pass-alert" style="display:none; color:#F00;">ERROR password</div>
         <div id="match-pass-alert" style="display:none; color:#F00;">The Two Passwords are not Matches</div>
    </div>
    <!-- End password Field -->

    <!-- Start Submit Field -->
    <div class="row form-group">
        <div class="col-md-3"></div>
        <div class="col-sm-offset-3  col-sm-9 col-md-9">
        <input type="button" id="updateBtn" value="Change Password" class="btn btn-primary btn-lg "/>
        </div>
    </div>
    <!-- End Submit Field -->

    
</div>

<script>
    $("#updateBtn").click(function(){
        var oldpassword = $("#oldpassword").val();
        var newpassword = $("#newpassword").val();
        var confpassword = $("#confpassword").val();
        
        if(oldpassword != "" && newpassword != "" && confpassword != ""){
            if(newpassword == confpassword){
                $("#match-pass-alert").hide("fast");
                $.ajax({
                    type:'POST',
                    url: '/settings/update-user-info',
                    url:'/settings/set-password',
                    data:{
                        '_token': "{{ csrf_token() }}",
                        oldpassword : oldpassword,
                        newpassword : newpassword
                            },
                    success: function(data){
                        $('.s-p-pass-alert').show();
                        $('.s-p-pass-alert > .alert-content').text(data);
                    }
                });
            }else{
                $("#match-pass-alert").show("fast");
            }    
        }else{
            $("#pass-alert").show("fast");
        }
        
                
    });

        function removeSettingsAlert(class){
        $('.'+class).hide();
    }
</script>
