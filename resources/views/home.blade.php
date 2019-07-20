@extends('layouts.app')

@section('content')

      <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}" defer></script>

    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
    
    <div class="container">
        <div class="row justify-content-center">

            <div class="content margin-top" style="max-width:1400px; margin: auto;">

                <!-- The Grid -->
                <div class="row-padding">

                    <!-- Left Column -->
                    <div class="third">

                        <div class="white text-grey card-4">
                            <div class="display-container">
                                <img src="{{$user->info != null ? asset('img/'.$user->info->profile_photo) : 'img/defualt_profile_photo.jpg' }}" style="width:100%" alt="Avatar">
                                <div class="display-bottomleft container text-white">
                                    <h2>{{ucfirst($user->first_name)." ".ucfirst($user->last_name)}}</h2>
                                </div>
                            </div>
                            <div class="container">
                                <p><i class="fa fa-envelope fa-fw margin-right large text-teal"></i>{{$user->email}}</p>
                                @if($user->info != null)
                                    <p><i class="fa fa-briefcase fa-fw margin-right large text-teal"></i>{{$user->info->jop_title}}</p>
                                    <p><i class="fa fa-home fa-fw margin-right large text-teal"></i>{{$user->info->address}}</p>
                                    <p><i class="fa fa-phone fa-fw margin-right large text-teal"></i>{{$user->info->phone_number}}</p>
                                @endif

                                <hr>

                                <!-- Skills Area -->
                                <p class="large"><b><i class="fa fa-asterisk fa-fw margin-right text-teal"></i>Skills</b></p>

                                @if(count($user->skills) > 0)
                                    @foreach($user->skills as $skill)
                                        <p>{{$skill->name}}</p>
                                        <div class="light-grey round-xlarge small">
                                            <div class="container center round-xlarge skill-progress width-{{$skill->pivot->score}}" width="50%">{{$skill->pivot->score}}</div>
                                        </div>
                                    @endforeach
                                @endif
                                <br>
                                <hr>

                                <!-- Languages Area -->
                                <p class="large text-theme"><b><i class="fa fa-globe fa-fw margin-right text-teal"></i>Languages</b></p>

                                @if(count($user->languages) > 0)
                                    @foreach($user->languages as $lang)
                                        <p>{{$lang->name}}</p>
                                        <div class="light-grey round-xlarge">
                                            <div class="container center round-xlarge skill-progress width-{{$lang->pivot->score}}" width="50%">{{$lang->pivot->score}}</div>
                                        </div>
                                    @endforeach
                                @endif

                                <br>


                            </div>
                        </div><br>

                        <!-- End Left Column -->
                    </div>

                    <!-- Right Column -->
                    <div class="twothird">

                        <!-- Work Experiences Area -->
                        @if(count($user->workExperiences) > 0)
                            <div class="container card white margin-bottom">
                                <h2 class="text-grey padding-16"><i class="fa fa-suitcase fa-fw margin-right xxlarge text-teal"></i>Work Experience</h2>
                                @foreach($user->workExperiences as $work)
                                    <div class="container">
                                        <h5 class="opacity"><b>{{$work->role}} / {{$work->company}}</b></h5>
                                        <h6 class="text-teal"><i class="fa fa-calendar fa-fw margin-right"></i>{{$work->start_date}} - {{$work->end_date}}</h6>
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

                    <!-- Education Area -->
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
