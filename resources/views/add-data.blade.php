@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="content margin-top" style="width:100%;max-width:1400px; margin: auto;">

            <!-- The Grid -->
            <div class="row-padding">

                <!-- Left Column -->
                <div class="third ">


                    <div class="white text-grey card-4  settings-area">
                        <div class="card">
                            <div class="card-header">
                                <div class="img-container">
                                    <img src="img/emp3.jpg" />
                                </div>
                                <p></p>
                            </div>
                            <div class="card-body settings-list">
                                <h2 class="text-center ">Settings Page</h2>
                                <ul>
                                    <li><button id="accountset_btn" onclick="accountset_fn();">Account Settings</button></li>
                                    <li><button id="personalset_btn">Personal Settings</button></li>
                                    <li><button id="passwordSetting_btn">Change Password</button></li>
                                    <li><button id="personalInfo_btn">Personal Info</button></li>
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
                        <div class="row">
                            <div id="container_settings" class="container col-lg-12" style="background-color: transparent;">

                            </div>
                        </div>

                    <div class="container">
                        
                    </div>
                    </div>
<!--

                    <div class="card">
                        <form method="post" action="/settings/update">
                            <div class="card-header">User Information</div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="first_name" class="col-md-2">First Name</label>
                                    <input type="text" class="col-md-8" id="first_name" name="first_name" value="">
                                </div>


                                <div class="form-group row">
                                    <label for="last_name" class="col-md-2">Last Name</label>
                                    <input type="text" class="col-md-8" id="last_name" name="last_name" value="">
                                </div>

                                <div class="form-group row">
                                    <label for="jop_title" class="col-md-2">Jop Title</label>
                                    <input type="text" class="col-md-8" id="jop_title" name="jop_title" value="">
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-md-2">Address</label>
                                    <input type="text" class="col-md-8" id="address" name="address" value="">
                                </div>
                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-2">Phone NO.</label>
                                    <input type="text" class="col-md-8" id="phone_number" name="phone_number" value="">
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" name="update" value="Update">
                            </div>
                        </form>
                    </div>
-->
                    <!-- Add Personal Info Section-->
                    @if($user->info == null)
                    
                    <div class="card">
                        <form method="post" action="/add-personal-info">
                            {{csrf_field()}}
                            <div class="card-header">User Information</div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="jop_title" class="col-md-2">Jop Title</label>
                                    <input type="text" class="col-md-8" id="jop_title" name="jop_title" value="">
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-md-2">Address</label>
                                    <input type="text" class="col-md-8" id="address" name="address" value="">
                                </div>
                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-2">Phone NO.</label>
                                    <input type="text" class="col-md-8" id="phone_number" name="phone_number" value="">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-plus fa-fw"></i>Add</button>
                            </div>
                        </form>
                    </div>
                    
                    
                    <div class="card">
                        <form method="post" action="/add-personal-photo" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-header">User Photo</div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="personal_photo" class="col-md-2">Jop Title</label>
                                    <input type="file" class="col-md-8" id="personal_photo" name="personal_photo">
                                    <div class="img-container" style="width:100%; hieght:200px">
                                        <img src="$file != null ? $file : #" />
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-plus fa-fw"></i>Add</button>
                            </div>
                        </form>
                    </div>
                    
                    @endif

                    
                    
                    <div class="card">
                        <form method="post" action="/add-personal-photo">
                            {{csrf_field()}}
                            <div class="card-header">User Photo</div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="personal_photo" class="col-md-2">Jop Title</label>
                                    <input type="file" class="col-md-8" id="personal_photo" name="personal_photo" value="">
                                    <div class="img-container" style="width:100%; hieght:200px">
                                        <img src="$file != null ? $file : #" />
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-plus fa-fw"></i>Add</button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Add Skill Section-->
                    <div class="card">
                        <form method="post" action="/add-skill-user">
                            {{csrf_field()}}
                            <div class="card-header">User skills</div>
                            <div class="card-body row">

                                <div class="form-group row col-md-8">
                                    <label for="skill_name" class="col-md-4">Skill Name</label>
<!--                                    <input type="text" class="col-md-6" id="skill_name" name="skill_name" value="Illustrator">-->

                                    <select id="skill_name" name="skill_name" class="col-md-8">
                                        @foreach($skills as $skill)
                                        <option value="{{$skill->id}}">{{$skill->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group row col-md-4">
                                    <label for="last_name" class="col-md-6">Score</label>
                                    <input type="number" class="col-md-6" id="score" name="score" value="75">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-plus fa-fw"></i>Add</button>
                            </div>
                        </form>
                    </div>

                    
                    
                    <!-- Add Language Section-->
                    <div class="card">
                        <form method="post" action="/add-lang-user">
                            {{csrf_field()}}
                            <div class="card-header">User Languages</div>
                            <div class="card-body row">

                                <div class="form-group row col-md-8">
                                    <label for="skill_name" class="col-md-4">Language</label>
                                    <select id="lang_name" name="lang_name" class="col-md-8">
                                        @foreach($languages as $lang)
                                        <option value="{{$lang->id}}">{{$lang->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group row col-md-4">
                                    <label for="last_name" class="col-md-6">Score</label>
                                    <input type="number" class="col-md-6" id="score" name="score" value="75">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-plus fa-fw"></i>Add</button>
                            </div>
                        </form>
                    </div>

                    
                    <!-- Add Work Experiemces Section-->
                    <div class="card">
                        <form method="post" action="/add-work-user">
                            {{csrf_field()}}
                            <div class="card-header">User Work Experiences</div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="company" class="col-md-2">Company</label>
                                    <input type="text" name="company" id="company" class="col-md-9" />
                                </div>
                                <div class="form-group row">
                                    <label for="role" class="col-md-2">Role</label>
                                    <input type="text" name="role" id="role" class="col-md-9" />
                                </div>
                                
                                <div class="form-group row">
                                    <label for="from" class="col-md-2">From</label>
                                    <input type="date" class="col-md-4" id="from" name="from">
                                    <div class=""></div>
                                    <label for="to" class="col-md-1">To</label>
                                    <input type="date" class="col-md-4" id="to" name="to">
                                </div>
                                <div class="form-group row">
                                    <label for="more_info" class="col-md-2">More Information</label>
                                    <textarea type="text" name="more_info" id="more_info" class="col-md-9" ></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-plus fa-fw"></i>Add</button>
                            </div>
                        </form>
                    </div>

                    <!-- Add Education Section-->
                    <div class="card">
                        <form method="post" action="/add-edu-user">
                            {{csrf_field()}}
                            <div class="card-header">User Education</div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="provider" class="col-md-2">Provider</label>
                                    <input type="text" name="provider" id="provider" class="col-md-9" />
                                </div>
                                <div class="form-group row">
                                    <label for="degree" class="col-md-2">Degree</label>
                                    <input type="text" name="degree" id="degree" class="col-md-9" />
                                </div>
                                
                                <div class="form-group row">
                                    <label for="from" class="col-md-2">From</label>
                                    <input type="date" class="col-md-4" id="from" name="from">
                                    <div class=""></div>
                                    <label for="to" class="col-md-1">To</label>
                                    <input type="date" class="col-md-4" id="to" name="to">
                                </div>
                                <div class="form-group row">
                                    <label for="more_info" class="col-md-2">More Information</label>
                                    <textarea type="text" name="more_info" id="more_info" class="col-md-9" ></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-plus fa-fw"></i>Add</button>
                            </div>
                        </form>
                    </div>

                    
                    <!-- Add Courses Section-->
                    <div class="card">
                        <form method="post" action="/add-course-user">
                            {{csrf_field()}}
                            <div class="card-header">User Courses</div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="provider" class="col-md-2">Provider</label>
                                    <input type="text" name="provider" id="provider" class="col-md-9" />
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-2">Field</label>
                                    <input type="text" name="name" id="name" class="col-md-9" />
                                </div>
                                
                                <div class="form-group row">
                                    <label for="from" class="col-md-2">From</label>
                                    <input type="date" class="col-md-4" id="from" name="from">
                                    <div class=""></div>
                                    <label for="to" class="col-md-1">To</label>
                                    <input type="date" class="col-md-4" id="to" name="to">
                                </div>
                                <div class="form-group row">
                                    <label for="more_info" class="col-md-2">More Information</label>
                                    <textarea type="text" name="more_info" id="more_info" class="col-md-9" ></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-plus fa-fw"></i>Add</button>
                            </div>
                        </form>
                    </div>

                    
                    <!-- Add Social Media Section-->
                    <div class="card">
                        <form method="post" action="/add-social-user">
                            {{csrf_field()}}
                            <div class="card-header">User Social Media Accounts</div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="type" class="col-md-2">Type</label>
                                    <input type="text" name="type" id="type" class="col-md-9" />
                                </div>
                                <div class="form-group row">
                                    <label for="link" class="col-md-2">Link</label>
                                    <input type="text" name="link" id="link" class="col-md-9" />
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-plus fa-fw"></i>Add</button>
                            </div>
                        </form>
                    </div>

                    
                    <!-- Add Interests Section-->
                    <div class="card">
                        <form method="post" action="/add-interest-user">
                            {{csrf_field()}}
                            <div class="card-header">User Interests</div>
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="name" class="col-md-2">Interest</label>
                                    <input type="text" name="name" id="name" class="col-md-9" />
                                </div>
                                <div class="form-group row">
                                    <label for="more_info" class="col-md-2">More Information</label>
                                    <textarea type="text" name="more_info" id="more_info" class="col-md-9" ></textarea>
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-plus fa-fw"></i>Add</button>
                            </div>
                        </form>
                    </div>

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
