<div id="containerAccountSettings">
    <form class="form-horizontal" action="#" method="post">
        <input type="hidden" name="userid" value="" />
        <!-- Start Email Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" id="email" name="email" class="form-control" autocomplete="off" value="" required="required" />
            </div>
        </div>
        <!-- End Email Field -->
        <!-- Start Username Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-10 col-md-2 control-label">Username</label>
            <div class="col-sm-10 col-md-9">
                <input type="text" id="username" name="username" class="form-control" value="" autocomplete="off" required="required"/>
            </div>
        </div>
        <!-- End Username Field -->
        <!-- Start Password Field -->
        <div class="form-group form-group-lg">
            <label class="col-sm-2 control-label">Phone Number</label>
            <div class="col-sm-10 col-md-9">
                <input type="tel" id="phone" name="phone" value="" class="form-control" placeholder="No Number yet" />
            </div>
        </div>
        <!-- End Password Field -->

        <!-- Start Submit Field -->
        <div class="form-group">
            <div class="col-sm-offset-2  col-sm-10 col-md-8">
                <input type="button" value="Deactive Account" id="deactiveAccountBtn"  href="#animatedModal" data-toggle="modal" data-target="#deactiveAccountModal" class="btn btn-danger btn-lg "/>
            </div>
        </div>
        <!-- End Submit Field -->
        <!-- Start Submit Field -->
        <div class="form-group">
            <div class="col-sm-offset-2  col-sm-10 col-md-8">
                <input type="button" value="Update" id="updateBtn" class="btn btn-primary btn-lg "/>
            </div>
        </div>
        <!-- End Submit Field -->
    </form>

    <!--DEMO01-->
    <div id="deactiveAccountModal" class="modal fade small" role="dialog">
        <!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID -->


        <div class="modal-content">
            <!--Your modal content goes here-->

            <form class="form-horizontal" action="#" method="post">
                <!-- Start Date of Birth Field -->
                <div class="row" style="margin:0;">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="setting-header ">
                            <div class="img-cont"><img src="#"/></div>
                            <div class="name-cont">
                                <a href="#" target="_blank" style=" " ></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
                <div class="row" style="margin:0 0 10px 0;">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <b class="col-lg-12 modal-para" style="text-align:center;">This Option will put your Account in unactive state AND You will NOT use any feature in this Application </b>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
                <div class="row" style="margin:0 0 10px 0;">
                    <div class="col-lg-1"></div>
                    <div class="form-group form-group-lg col-lg-11">
                        <label class="col-lg-5 control-label">Time for Deactivate</label>
                        <div class="col-sm-10 col-lg-6">

                        </div>
                    </div>

                </div>
                <div class="row" style="margin:10px 0;">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-11">
                        <div class="form-group form-group-lg col-lg-12">
                            <label class="col-lg-3 control-label">Password</label>
                            <div class="col-sm-10 col-lg-9">
                                <input type="hidden" id="oldpassword" value=""/>
                                <input type="password" id="password" name="password" class="form-control password" style="margin:0;" placeholder="Be carefull"/>
                                <div id="pass-alert" style="display:none; color:#F00;">Enter password</div>
                                <div id="err-pass-alert" style="display:none; color:#F00;">ERROR password</div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <div class="btn-modal-cont list-item">
            <button id="btn-continue-modal">Continue</button>
            <button id="btn-close-modal" class="close-animatedModal" data-dismiss="modal">Cancel</button>
        </div>
    </div>
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
                alert('Update Done Successfuly');
            }
        });
    });
</script>
