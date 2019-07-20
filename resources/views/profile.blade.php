@extends('layouts.app')

@section('content')
<style>
    
</style>
  <link href="{{ asset('css/template.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/css/font-awesome/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/normalize.min.css') }}" rel="stylesheet">

      <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}" defer></script>

    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
<div class="container edit-page">
    <div class="row justify-content-center">

        <div class="content margin-top" style="max-width:1400px; margin: auto;">

            <!-- The Grid -->
            <div class="row-padding">

                <!-- Left Column -->
                <div class="third">

                    <div class="white text-grey card-4">
                        <div class="display-container">
                            <div class="edit-btn">
                                <a id="personalModal" data-toggle="modal" data-target="#modal" onclick="loadModalContent('modal/upload-profile-photo')"><i class="fa fa-edit"></i></a>
                            </div>
                            <img src="{{$user->info != null ? asset('img/'.$user->info->profile_photo) : 'img/defualt_profile_photo.jpg' }}" style="width:100%" alt="Avatar">
                            <div class="display-bottomleft container text-white">
                                <h2>{{ucfirst($user->first_name)." ".ucfirst($user->last_name)}}</h2>
                            </div>
                        </div>
                        <div class="container">
                            @if($user->info != null)
                            <div class=" personal-info">
                                <div class="edit-btn">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <p><i class="fa fa-briefcase fa-fw margin-right large text-teal"></i>{{$user->info->jop_title}}</p>
                                <p><i class="fa fa-home fa-fw margin-right large text-teal"></i>{{$user->info->address}}</p>
                                <p><i class="fa fa-envelope fa-fw margin-right large text-teal"></i>{{$user->email}}</p>
                                <p><i class="fa fa-phone fa-fw margin-right large text-teal"></i>{{$user->info->phone_number}}</p>
                            </div>
                            
                            
                            
                            @endif
                            <hr>

                            <div class="skills-container">
                                <div class="edit-btn">
                                    <i class="fa fa-plus" data-toggle="modal" data-target="#modal" onclick="loadModalContent('/modal/add-skill')"></i>
                                </div>
                                <p class="large"><b><i class="fa fa-asterisk fa-fw margin-right text-teal"></i>Skills</b></p>

                                <div class="skills-container row">
                                    @foreach($user->skills as $skill)

                                    <div class="light-grey round-xlarge small col-md-6" style="max-width:150px!important; margin:auto;text-align:center;padding:0;">
                                        <div class="box skill-item">
                                            <div>
                                                <div class="float-right">
                                                    <div class="remove-btn">
                                                        <i class="fa fa-trash" data-toggle="modal" data-target="#modal" onclick="loadModalContent('modal/delete-skill/{{$skill->pivot->id}}')"></i>
                                                    </div>
                                                </div>
                                                <div class="float-left">
                                                    <div class="edit-skill-btn">
                                                        <i class="fa fa-edit"  data-toggle="modal" data-target="#modal" onclick="loadModalContent('modal/edit-skill/{{$skill->pivot->id}}')"></i>
                                                    </div>
                                                </div>
                                                <svg width="150" height="150">
                                                    <circle cx="70" cy="70" r="50" class="defualt" stroke-dasharray="314,314"></circle>
                                                    <circle cx="70" cy="70" r="50" class="width-{{$skill->pivot->score}}" stroke-dasharray="{{$skill->pivot->score * 3.14}},314">
                                                        <p class="score">{{$skill->pivot->score}}</p>
                                                    </circle>

                                                </svg>
                                                <p>{{$skill->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                               
                            </div>
							<hr>
                            <div class="language-container">
                                <div class="edit-btn">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <p class="large text-theme"><b><i class="fa fa-globe fa-fw margin-right text-teal"></i>Languages</b></p>

                                @foreach($user->languages as $lang)
                                <p>{{$lang->name}}</p>
                                <div class="light-grey round-xlarge">
                                    <div class="container center round-xlarge skill-progress width-{{$lang->pivot->score}}" width="50%">{{$lang->pivot->score}}</div>
                                </div>
                                @endforeach
                            
                            </div>
                        </div>
                    </div><br>

                    <!-- End Left Column -->
                </div>

                <!-- Right Column -->
                <div class="twothird">

                    @if($user->info != null)
                    @if($user->info->intro_video != null)
                    <div class="card white margin-bottom">
                        <div class="edit-btn" style="z-index:999;">
                            <a id="personalModal" data-toggle="modal" data-target="#introModalCenter"><i class="fa fa-edit"></i></a>
                        </div>
                            <video class="intro-video" controls src="{{asset('img/'.$user->info->intro_video)}}" preload="auto"></video>

                    </div>


                        <!-- Upload Intro Video Modal -->
                        <div class="modal fade" id="introModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form method="post" action="/upload-intro-video" id="upload_form" accept-charset="UTF-8" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Introduction Video</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            {{csrf_field()}}
                                            <div class="form-group row">
                                                <label for="intro_video" class="col-md-2">Video</label>
                                                <div class="col-md-8 input-btn" id="intro_video">
                                                    <i class="fa fa-upload fa-fw"></i><strong> Upload Your Video</strong>
                                                <input type="file" name="intro_video" onchange="videoPreview(this);">
                                                </div>

                                                <div class="container" style="width:100%">
                                                    <video controls src="" id="video_intro"  style="display:none;width: 100%;object-fit: cover;object-position: center;"></video>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" id="add-video-btn" name="add" disabled ><i class="fa fa-plus fa-fw"></i>Add</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    @endif
                    @endif

                    @if(count($user->workExperiences) > 0)
                    <div class="container card white margin-bottom">
                        <h2 class="text-grey padding-16"><i class="fa fa-suitcase fa-fw margin-right xxlarge text-teal"></i>Work Experience</h2>
                        @foreach($user->workExperiences as $work)
                            <div class="container">
                                <h5 class="opacity"><b>{{$work->role}} / {{$work->company}}</b></h5>
                                <h6 class="text-teal"><i class="fa fa-calendar fa-fw margin-right"></i>{{$work->start_date}} - {{$work->end_date->diffForHumans()}}</h6>
                                <p>{{$work->more_info}}</p>
                                <hr>
                            </div>
				        @endforeach
                        
                        <div class="container">
                            <h5 class="opacity"><b>Web Developer / something.com</b></h5>
                            <h6 class="text-teal"><i class="fa fa-calendar fa-fw margin-right"></i>Mar 2012 - <span class="tag teal round">Current</span></h6>
                            <p>Consectetur adipisicing elit. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p>
                            <hr>
                        </div>
                        
                    </div>
                    @endif
                    
                    @if(count($user->educations) > 0)
                    <div class="container card white">
                        <h2 class="text-grey padding-16"><i class="fa fa-certificate fa-fw margin-right xxlarge text-teal"></i>Education</h2>
                        @foreach($user->educations as $edu)
                            <div class="container">
                                <h5 class="opacity"><b>{{$edu->provider}}</b></h5>
                                <h6 class="text-teal"><i class="fa fa-calendar fa-fw margin-right"></i>{{$edu->start_date}} - {{$edu->end_date}}</h6>
                                <h5><b>{{$edu->degree}}</b></h5>
                                <p>{{$edu->more_info}}</p>
                                <hr>
                            </div>
				        @endforeach
                        
                    </div>
                    @endif

                    <!-- Courses Area -->
                    @if(count($user->courses) > 0)
                            <div class="container card white margin-bottom">
                                <h2 class="text-grey padding-16"><i class="fa fa-suitcase fa-fw margin-right xxlarge text-teal"></i>Courses</h2>
                                @foreach($user->courses as $course)
                                    <div class="container">
                                        <h5 class="opacity"><b>{{$course->name}} / {{$course->provider}}</b></h5>
                                        <h6 class="text-teal"><i class="fa fa-calendar fa-fw margin-right"></i>{{$course->start_date}} - {{$course->end_date}}</h6>
                                        <p>{{$course->more_info}}</p>
                                        <hr>
                                    </div>
                                @endforeach

                            </div>
                        @endif

                    <!-- Social Media Area -->
                        @if(count($user->socialMedias) > 0)
                            <div class="container card white margin-bottom">
                                <h2 class="text-grey padding-16"><i class="fa fa-suitcase fa-fw margin-right xxlarge text-teal"></i>Social Media Accounts</h2>
                                @foreach($user->socialMedias as $social)
                                    <div class="container">
                                    <!--                                <h5 class="opacity"><b>{{$social->type}}</b></h5>-->
                                        <a href="https://{{$social->link}}" target="_blank" class="text-teal"><i class="fa fa-{{strtolower($social->type)}} fa-fw margin-right"></i> {{$social->link}}</a>
                                    </div>
                                @endforeach

                            </div>
                        @endif

                    <!-- Interests Area -->
                        @if(count($user->interests) > 0)
                            <div class="container card white margin-bottom">
                                <h2 class="text-grey padding-16"><i class="fa fa-suitcase fa-fw margin-right xxlarge text-teal"></i>Interests</h2>
                                @foreach($user->interests as $interest)
                                    <div class="container">
                                        <h5 class="opacity"><i class="fa fa-circle margin-right"></i><b>{{$interest->name}}</b></h5>
                                        <p>{{$interest->more_info}}</p>
                                    </div>
                                @endforeach

                            </div>
                    @endif





                    <!-- End Right Column -->
                </div>

                <!-- End Grid -->
            </div>

            <!-- End Page Container -->
        </div>
        
    </div>
</div>
<script>
    //demo 01



    function removeAlert(){
        $('.modal-alert').text('');
        $('.modal-alert').hide();
    }


    // function Edit POST
//    function editSkillModal(id, name, score ){
//        $('#footer_action_button').text(" Update");
//        $('#footer_action_button').addClass('glyphicon-check');
//        $('#footer_action_button').removeClass('glyphicon-trash');
//        $('.actionBtn').addClass('btn-success');
//        $('.actionBtn').removeClass('btn-danger');
//        $('.actionBtn').addClass('edit');
//        $('.actionBtn').attr('onclick','editSkill()');
//        $('.modal-title').text('Edit Skill');
//        $('.deleteContent').hide();
//        $('.form-horizontal').show();
//        console.log(id+' '+name+' '+score);
//        $('#skill_id_in').val(id);
//        $('#skill_name_in').val(name);
//        $('#skill_score_in').val(score);
////    $('#myModal').modal('show');
//    }

//    function editSkill() {
//        removeAlert();
//        $.ajax({
//            method: 'POST',
//            url: 'test',
//            dataType: 'html',
//            data: {
//                '_token': "{{ csrf_token() }}",
//                'id': $("#skill_id").val(),
//                'title': $('#skill_name').val(),
//                'body': $('#skill_score').val()
//            },
//            success: function(data) {
//                $('.modal-alert').show();
//                $('.modal-alert').text(data);
//
////    alert('edit success');
////      $('.post' + data.id).replaceWith(" "+
////      "<tr class='post" + data.id + "'>"+
////      "<td>" + data.id + "</td>"+
////      "<td>" + data.title + "</td>"+
////      "<td>" + data.body + "</td>"+
////      "<td>" + data.created_at + "</td>"+
//// "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-title='" + data.title + "' data-body='" + data.body + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
////      "</tr>");
//            }
//        });
//    }
//
//
//    function deleteSkillModal(e, id){
//        $('#footer_action_button').text(" Delete");
//        $('#footer_action_button').removeClass('glyphicon-check');
//        $('#footer_action_button').addClass('glyphicon-trash');
//        $('.actionBtn').removeClass('btn-success');
//        $('.actionBtn').addClass('btn-danger');
//        $('.actionBtn').addClass('delete');
//        $('.actionBtn').attr('onclick','deleteSkill('+id+')');
//        $('.modal-title').text('Delete');
//        $('.id').text($(this).data('id'));
//        console.log(id);
//        $('.deleteContent').show();
//        $('.form-horizontal').hide();
//        $('.title').html($(this).data('title'));
//        $('#myModal').modal('show');
//    }


</script>

@section('footer')
    <p>Find me on social media.</p>
    <a href="#"><i class="fa fa-facebook-official hover-opacity"></i></a>
    <a href="#"><i class="fa fa-instagram hover-opacity"></i></a>
    <a href="#"><i class="fa fa-snapchat hover-opacity"></i></a>
    <a href="#"><i class="fa fa-pinterest-p hover-opacity"></i></a>
    <a href="#"><i class="fa fa-twitter hover-opacity"></i></a>
    <a href="#"><i class="fa fa-linkedin hover-opacity"></i></a>
    <p>Powered by <a href="#" target="_blank">akram akh</a></p>

@endsection
@endsection
