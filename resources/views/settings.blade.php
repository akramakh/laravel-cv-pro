@extends('layouts.app')

@section('content')
<!-- <link href="{{ asset('css/template.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/font-awesome/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/normalize.min.css') }}" rel="stylesheet"> -->

      <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}" defer></script>

    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>

<div class="container">
    <div class="row justify-content-center" style="display: contents;">

        <div class="content margin-top" style="max-width:1400px; margin: auto;">

            <!-- The Grid -->
            <div class="row-padding">

                <!-- Left Column -->
                <div class="third col-md-4" style="height: 100%; position: relative; min-height: 500px;">


                    <div class="white text-grey card-4  settings-area">
                        <div class="card">
                            <div class="card-header">
                                <div class="img-container">
                                    <img src="{{$user->info != null ? asset('img/'.$user->info->personal_photo) : 'img/defualt_personal_photo.jpg' }}" />
                                </div>
                                <p>{{$user->first_name}}</p>
                            </div>
                            <div class="card-body settings-list">
                                <h2 class="text-center ">Settings Page</h2>
                                <ul>
                                    <li><button id="accountset_btn" class="active" onclick="accountset_fn('show-account-settings');">Account Settings</button></li>
                                    <li><button id="personalset_btn" onclick="accountset_fn('show-personal-settings');">Personal Settings</button></li>
                                    <li><button id="passwordSetting_btn" onclick="accountset_fn('show-password-settings');">Change Password</button></li>
                                    <li><button id="profileInfo_btn" onclick="accountset_fn('show-profile-settings');">Profile Settings</button></li>
                                    <li><button id="removeAccount_btn">Remove Account</button></li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-danger" name="Remove my account" value="removeAccount">
                            </div>
                        </div>
                    </div>

                    <!-- End Left Column -->
                </div>

                <!-- Right Column -->
                <div class="twothird">

                    
                    <div class="white text-grey card-4">
                        
                        <div class="row" style="margin:0;">
                            <div id="container_settings" class="container col-lg-12" >

                            </div>
                        </div>

                    <!-- End Right Column -->
                </div>

                <!-- End Grid -->
            </div>

            <!-- End Page Container -->
        </div>

    </div>
</div>

    
    
</div>

@endsection
@section('footer')
    <p>Find me on social media.</p>
    <a href="#"><i class="fa fa-facebook-official hover-opacity"></i></a>
    <a href="#"><i class="fa fa-instagram hover-opacity"></i></a>
    <a href="#"><i class="fa fa-snapchat hover-opacity"></i></a>
    <a href="#"><i class="fa fa-pinterest-p hover-opacity"></i></a>
    <a href="#"><i class="fa fa-twitter hover-opacity"></i></a>
    <a href="#"><i class="fa fa-linkedin hover-opacity"></i></a>
    <p>Powered by <a href="#" target="_blank">akram akh</a></p>



<script>
    
//    function clearModal(){
////        alert();
//        $("#modal").hide();
//        $("#modal").css('display' , 'none');
//        $("#modal").removeClass('in show');
//        $(".modal-backdrop").remove();
//        
//    }
    
    
    var container_settings = getElementById('container_settings');
    function startLoader(){
        $("#container_settings").html('<div class="overlay "><div id="loader"></div></div>');
    }
    function stopLoader(){
        $("#container_settings").remove('<div class="overlay "><div id="loader"></div></div>');
    }
    
    
    function loadFile(url) {

        jQuery.get(url, function (data) {
            $("#container_settings").html(data);
        });
//        alert();
    }
    
    function accountset_fn(url) {
        startLoader();
        $("#personalset_btn").removeClass("active");
        $("#passwordSetting_btn").removeClass("active");
        $("#profileInfo_btn").removeClass("active");
        $("#removeAccount_btn").removeClass("active");
        $(this).siblings().removeClass("active");
        $(this).addClass("active");
        loadFile(url);
        stopLoader();
    }

    /* $("#accountset_btn").click(function(){
     $("#personalset_btn").removeClass("btn-visited");
     $("#passwordSetting_btn").removeClass("btn-visited");
     $("#personalInfo_btn").removeClass("btn-visited");
     $("#removeAccount_btn").removeClass("btn-visited");
     $(this).addClass("btn-visited");
     $("#container_settings").load("settings/accountSettings.blade.php");
     });
     $("#personalset_btn").click(function(){
     $("#accountset_btn").removeClass("btn-visited");
     $("#passwordSetting_btn").removeClass("btn-visited");
     $("#personalInfo_btn").removeClass("btn-visited");
     $("#removeAccount_btn").removeClass("btn-visited");
     $(this).addClass("btn-visited");
     $("#container_settings").load("personalSettings.php");
     });
     $("#passwordSetting_btn").click(function(){
     $("#accountset_btn").removeClass("btn-visited");
     $("#personalset_btn").removeClass("btn-visited");
     $("#personalInfo_btn").removeClass("btn-visited");
     $("#removeAccount_btn").removeClass("btn-visited");
     $(this).addClass("btn-visited");
     $("#container_settings").load("passwordSettings.php");
     });
     $("#personalInfo_btn").click(function(){
     $("#accountset_btn").removeClass("btn-visited");
     $("#personalset_btn").removeClass("btn-visited");
     $("#passwordSetting_btn").removeClass("btn-visited");
     $("#removeAccount_btn").removeClass("btn-visited");
     $(this).addClass("btn-visited");
     $("#container_settings").load("showProfileInfo.php");
     });
     $("#removeAccount_btn").click(function(){
     $("#accountset_btn").removeClass("btn-visited");
     $("#personalset_btn").removeClass("btn-visited");
     $("#passwordSetting_btn").removeClass("btn-visited");
     $("#personalInfo_btn").removeClass("btn-visited");
     $(this).addClass("btn-visited");
     $("#container_settings").load("removeAccountSettings.php");
     });


     $(document).ready(function(){
     $("#container_settings").load("accountSettings.php");
     });*/

</script>
<script>

    loadFile('show-account-settings');
</script>
@endsection
