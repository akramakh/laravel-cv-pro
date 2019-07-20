<div id="containerAccountSettings">
    <h4><strong>Account Settings</strong></h4>
    <form class="form-horizontal" action="#" method="post">
        
        <div class="row form-group form-group-lg">
            <label class="col-sm-3 control-label">First Name</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" id="first_name" name="first_name" value="{{$user->first_name}}" class="form-control" autocomplete="off" required="required" />
            </div>
        </div>
        
        <div class="row form-group form-group-lg">
            <label class="col-sm-3 control-label">Last Name</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" id="last_name" name="last_name" value="{{$user->last_name}}" class="form-control" autocomplete="off" required="required" />
            </div>
        </div>
      
        <!-- Start Email Field -->
        <div class="row form-group form-group-lg">
            <label class="col-sm-3 control-label">Email</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" id="email" name="email" class="form-control" autocomplete="off" value="{{ $user->email }}" required="required" />
            </div>
        </div>
        <!-- End Email Field -->
        <!-- Start Username Field -->
        <div class="row form-group form-group-lg">
            <label class="col-sm-3 col-md-3 control-label">Username</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" id="username" name="username" class="form-control" value="" autocomplete="off" required="required"/>
            </div>
        </div>
        <!-- End Username Field -->
        <!-- Start Password Field -->
        <div class="row form-group form-group-lg">
            <label class="col-sm-3 control-label">Phone Number</label>
            <div class="col-sm-10 col-md-9">
                <input type="tel" id="phone" name="phone" value="{{ $user->info->phone_number }}" class="form-control" placeholder="No Number yet" />
            </div>
        </div>
        <!-- End Password Field -->

        <!-- Start Submit Field -->
        <div class="row form-group">
            <div class="col-md-3"></div>
            <div class="col-sm-offset-2  col-sm-9 col-md-9">
                <input type="button" value="Update" id="updateBtn" class="btn btn-primary btn-lg "/>
            </div>
        </div>
        <!-- End Submit Field -->
    </form>

    <hr>
    
        <!-- Start Submit Field -->
        <div class="row form-group">
            <div class="col-md-3"></div>
            <div class="col-sm-offset-2  col-sm-9 col-md-9">
                <input type="button" value="Deactive Account" id="deactiveAccountBtn" onclick="loadModalContent('deactive-account-modal-content');" data-toggle="modal" data-target="#modal" class="btn btn-danger btn-lg "/>
            </div>
        </div>
        <!-- End Submit Field -->

</div>

<script>
    
    


    $("#updateBtn").click(function(){
        var username = $("#username").val();
        var phone = $("#phone").val();
        var password = null;
        var email = $("#email").val();
        var nationality = $("#nationality").val();
        var language = $("#language").val();

        $.ajax({
            type:'POST',
            url:'setAccountInfo.php',
            data:{
                username : username,
                phone : phone,
                email : email,
                nationality : nationality,
                language : language
            },
            success:function(){
                $("#containerAccountSettings").load("settings/showAccountInfo.php");
                alert('Update Done Successfuly');
            }
        });
    });
</script>
