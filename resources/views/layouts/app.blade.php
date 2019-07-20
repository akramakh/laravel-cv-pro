<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CV Pro') }}</title>


    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"> -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/template.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/normalize.min.css') }}" rel="stylesheet">

      <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}" defer></script>

    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{URL::to('js/app.js')}}" ></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                @auth
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ strtoupper(Auth::user()->first_name) }}
                </a>
                @else
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'CV Pro')}}
                </a>
                @endauth
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                    </ul>
                    @endauth

                    <div class="search-area">
                        <form method="get" action="#">
                            <input type="search" name="search" id="search" placeholder="search ..."/><i class="fa fa-search"></i>
<!--                            <button type="submit" class="btn btn-defualt" >search</button>    -->
                        </form>
                    </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                             </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ url('/profile') }}" >
                                    <div class="img-container">
                                        <img src="{{$user->info != null ? asset('img/'.$user->info->personal_photo) : 'img/defualt_personal_photo.jpg' }}" />
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
<!--                                    <span class="caret"></span>-->
                                    <i class="fa fa-caret-down"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->isAdmin() != null)
                                    <a class="dropdown-item" href="{{ url('/manage') }}">
                                        Dashboard
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ url('/add-data') }}">
                                        Add Data
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/settings') }}">
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 mt-10" style="padding-top: 5rem!important;">
            @yield('content')
                <!--DEMO01-->
                <div id="modal" class="modal fade small" role="dialog">
                    <div class="modal-dialog">

                    </div>
                </div>
        </main>
    </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   


    <footer class="container center margin-top" style="background: #009688; width: 100%;">
        @yield('footer')
    </footer>
    <script>
        function removeAlert(){
            $('.modal-alert').text('');
            $('.modal-alert').hide();
        }
        
        /*************************************************************************/
        
    function imagePreview(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#profile_img').attr('src',e.target.result);
                $('#profile_img').show();
            }
            reader.readAsDataURL(input.files[0]);
            $('#add-photo-btn').removeAttr('disabled');
        }
    }

    function videoPreview(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#video_intro').attr('src',e.target.result);
                $('#video_intro').show();
            }
            reader.readAsDataURL(input.files[0]);
            $('#add-video-btn').removeAttr('disabled');
        }
    }
        /********************************************************************/

        function loadModalContent(url){
        jQuery.get(url, function (data) {
            $("#modal > .modal-dialog").html(data);
        });
    }
        
    function addSkill(e){
        removeAlert();
        var skill_name = $('#skill_name');
        var score = $('#score');
//    alert('111');
        $.ajax({
            method:'POST',
            url:'add-skill-user-ajax',
            dataType:'html',
            data:{
                '_token': "{{ csrf_token() }}",
                'skill_name':skill_name.val(),
                'score':score.val()
            },
            success:function (data) {
                $('.modal-alert').show();
                $('.modal-alert').text(data);
            }
        });
    }    
        
    function deleteSkill(id){
        removeAlert();
        $.ajax({
            method: 'POST',
            url: 'remove-user-skill/',
            dataType: 'html',
            data: {
                '_token': "{{ csrf_token() }}",
                'id': id
            },
            success: function(data){
                $('.modal-alert').show();
                $('.modal-alert').text(data);
//       $('.post' + $('.id').text()).remove();
            }
        });
    }    
        
    function updateSkill(id, score){
        removeAlert();
        $.ajax({
            method: 'POST',
            url: 'update-user-skill/',
            dataType: 'html',
            data: {
                '_token': "{{ csrf_token() }}",
                'id': id,
                'score': score
            },
            success: function(data){
                $('.modal-alert').show();
                $('.modal-alert').text(data);
//       $('.post' + $('.id').text()).remove();
            }
        });
    }
        
        /*****************************************************/
        function addLanguage(e){
        removeAlert();
        var language_name = $('#Language_name');
        var score = $('#score');
            
        $.ajax({
            method:'POST',
            url:'add-language-user-ajax',
            dataType:'html',
            data:{
                '_token': "{{ csrf_token() }}",
                'language_name':language_name.val(),
                'score':score.val()
            },
            success:function (data) {
                $('.modal-alert').show();
                $('.modal-alert').text(data);
            }
        });
    }
    
    function deleteLanguage(id){
        removeAlert();
        $.ajax({
            method: 'POST',
            url: 'remove-user-language/',
            dataType: 'html',
            data: {
                '_token': "{{ csrf_token() }}",
                'id': id
            },
            success: function(data){
                $('.modal-alert').show();
                $('.modal-alert').text(data);
//       $('.post' + $('.id').text()).remove();
            }
        });
    }    
        
    function updateLanguage(id, score){
        removeAlert();
        $.ajax({
            method: 'POST',
            url: 'update-user-language/',
            dataType: 'html',
            data: {
                '_token': "{{ csrf_token() }}",
                'id': id,
                'score': score
            },
            success: function(data){
                $('.modal-alert').show();
                $('.modal-alert').text(data);
//       $('.post' + $('.id').text()).remove();
            }
        });
    }


       /*****************************************************/
       function addEducation(e){
        removeAlert();
        var degree = $('#degree');
        var provider = $('#provider');
        var from = $('#from');
        var to = $('#to');
        var details = $('#details');
            
        $.ajax({
            method:'POST',
            url:'add-edu-user-ajax',
            dataType:'html',
            data:{
                '_token': "{{ csrf_token() }}",
                'degree':degree.val(),
                'provider':provider.val(),
                'from':from.val(),
                'to':to.val(),
                'details':details.val()
            },
            success:function (data) {
                $('.modal-alert').show();
                $('.modal-alert').text(data);
            }
        });
    }
    
    function deleteEducation(id){
        removeAlert();
        $.ajax({
            method: 'POST',
            url: 'remove-user-edu/',
            dataType: 'html',
            data: {
                '_token': "{{ csrf_token() }}",
                'id': id
            },
            success: function(data){
                $('.modal-alert').show();
                $('.modal-alert').text(data);
//       $('.post' + $('.id').text()).remove();
            }
        });
    }    
        
    function updateEducation(id){
        removeAlert();
        var degree = $('#degree');
        var provider = $('#provider');
        var from = $('#from');
        var to = $('#to');
        var details = $('#details');
        $.ajax({
            method: 'POST',
            url: 'update-user-edu/',
            dataType: 'html',
            data: {
                '_token': "{{ csrf_token() }}",
                'id': id,
                'degree':degree.val(),
                'provider':provider.val(),
                'from':from.val(),
                'to':to.val(),
                'details':details.val()
            },
            success: function(data){
                $('.modal-alert').show();
                $('.modal-alert').text(data);
//       $('.post' + $('.id').text()).remove();
            }
        });
    }


    /*  
    *** Settings Page Manipulation
    */
    
       
    </script>
</body>
</html>
