@extends('layouts.dashboard')

@section('content')
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                  
                    <h1 class="page-title"> Admin Dashboard 3
                        <small>statistics, charts, recent events and reports</small>
                    </h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Dashboard</span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a href="#">
                                            <i class="icon-bell"></i> Action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-shield"></i> Another action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-user"></i> Something else here</a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-bag"></i> Separated link</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row widget-row">
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">Current Balance</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-green icon-bulb"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">USD</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644">0</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">Weekly Sales</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-red icon-layers"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">USD</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="1,293">0</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">Biggest Purchase</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">USD</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="815">0</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                <h4 class="widget-thumb-heading">Average Monthly</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">USD</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="5,071">0</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-xs-12 col-sm-12">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject bold uppercase font-dark">Skills</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="#">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="#">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="#">
                                            <i class="icon-trash"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="dashboard_amchart_2" class="mapChart">
                                        <div>
                                            <table class="table">
                                                <tr>
                                                    <th>#</th>
                                                    <th>skill</th>
                                                    <th>created at</th>
                                                    <th>updated at</th>
                                                    <th class="text-center">
                                                        <button  id="create_skill_modal" class="create-skill-modal btn btn-primary btn-sm" data-toggle="modal" data-target="#modal" onclick="loadModalContent('admin/modal/add-skill')">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </th>
                                                </tr>
                                                @foreach($skills as $skill)
                                                <tr>
                                                    <td>{{$skill->id}}</td>
                                                    <td><b>{{$skill->name}}</b></td>
                                                    <td>{{$skill->created_at->diffForHumans()}}</td>
                                                    <td>{{$skill->updated_at}}</td>
                                                    <td class="text-center">
                                                        <button href="#" class="edit-skill-modal btn btn-warning btn-sm" data-toggle="modal" data-target="#modal" onclick="loadModalContent('admin/modal/edit-skill/{{$skill->id}}')" >
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                        <a href="#" class="delete-skill-modal btn btn-danger btn-sm" data-toggle="modal" data-target="#modal" onclick="loadModalContent('admin/modal/delete-skill/{{$skill->id}}')">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12 col-sm-12">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption ">
                                        <span class="caption-subject font-dark bold uppercase">Languages</span>
                                        <span class="caption-helper">distance stats...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Option 1</a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">Option 2</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Option 3</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Option 4</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="dashboard_amchart_4" class="CSSAnimationChart">
                                        <div>
                                            <table class="table">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Language</th>
                                                    <th>created at</th>
                                                    <th>updated at</th>
                                                    <th class="text-center">
                                                        <button  id="create_language_modal" class="create-language-modal btn btn-primary btn-sm" data-toggle="modal" data-target="#modal" onclick="loadModalContent('admin/modal/add-language')">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </th>
                                                </tr>
                                                @foreach($languages as $language)
                                                <tr>
                                                    <td>{{$language->id}}</td>
                                                    <td><b>{{$language->name}}</b></td>
                                                    <td>{{$language->created_at->diffForHumans()}}</td>
                                                    <td>{{$language->updated_at}}</td>
                                                    <td class="text-center">
                                                        <button href="#" class="edit-language-modal btn btn-warning btn-sm" data-toggle="modal" data-target="#modal" onclick="loadModalContent('admin/modal/edit-language/{{$language->id}}')" >
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                        <a href="#" class="delete-language-modal btn btn-danger btn-sm" data-toggle="modal" data-target="#modal" onclick="loadModalContent('admin/modal/delete-language/{{$language->id}}')">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-6 col-xs-12 col-sm-12">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-dark hide"></i>
                                        <span class="caption-subject font-hide bold uppercase">Recent Users</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Option 1</a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">Option 2</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Option 3</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Option 4</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!--begin: widget 1-1 -->
                                            <div class="mt-widget-1">
                                                <div class="mt-icon">
                                                    <a href="#">
                                                        <i class="icon-plus"></i>
                                                    </a>
                                                </div>
                                                <div class="mt-img">
                                                    <img src="Dashboard/assets/pages/media/users/avatar80_8.jpg"> </div>
                                                <div class="mt-body">
                                                    <h3 class="mt-username">Diana Ellison</h3>
                                                    <p class="mt-user-title"> Lorem Ipsum is simply dummy text. </p>
                                                    <div class="mt-stats">
                                                        <div class="btn-group btn-group btn-group-justified">
                                                            <a href="javascript:;" class="btn font-red">
                                                                <i class="icon-bubbles"></i> 1,7k </a>
                                                            <a href="javascript:;" class="btn font-green">
                                                                <i class="icon-social-twitter"></i> 2,6k </a>
                                                            <a href="javascript:;" class="btn font-yellow">
                                                                <i class="icon-emoticon-smile"></i> 3,7k </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end: widget 1-1 -->
                                        </div>
                                        <div class="col-md-4">
                                            <!--begin: widget 1-2 -->
                                            <div class="mt-widget-1">
                                                <div class="mt-icon">
                                                    <a href="#">
                                                        <i class="icon-plus"></i>
                                                    </a>
                                                </div>
                                                <div class="mt-img">
                                                    <img src="Dashboard/assets/pages/media/users/avatar80_7.jpg"> </div>
                                                <div class="mt-body">
                                                    <h3 class="mt-username">Jason Baker</h3>
                                                    <p class="mt-user-title"> Lorem Ipsum is simply dummy text. </p>
                                                    <div class="mt-stats">
                                                        <div class="btn-group btn-group btn-group-justified">
                                                            <a href="javascript:;" class="btn font-yellow">
                                                                <i class="icon-bubbles"></i> 1,7k </a>
                                                            <a href="javascript:;" class="btn font-blue">
                                                                <i class="icon-social-twitter"></i> 2,6k </a>
                                                            <a href="javascript:;" class="btn font-green">
                                                                <i class="icon-emoticon-smile"></i> 3,7k </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end: widget 1-2 -->
                                        </div>
                                        <div class="col-md-4">
                                            <!--begin: widget 1-3 -->
                                            <div class="mt-widget-1">
                                                <div class="mt-icon">
                                                    <a href="#">
                                                        <i class="icon-plus"></i>
                                                    </a>
                                                </div>
                                                <div class="mt-img">
                                                    <img src="Dashboard/assets/pages/media/users/avatar80_6.jpg"> </div>
                                                <div class="mt-body">
                                                    <h3 class="mt-username">Julia Berry</h3>
                                                    <p class="mt-user-title"> Lorem Ipsum is simply dummy text. </p>
                                                    <div class="mt-stats">
                                                        <div class="btn-group btn-group btn-group-justified">
                                                            <a href="javascript:;" class="btn font-yellow">
                                                                <i class="icon-bubbles"></i> 1,7k </a>
                                                            <a href="javascript:;" class="btn font-red">
                                                                <i class="icon-social-twitter"></i> 2,6k </a>
                                                            <a href="javascript:;" class="btn font-green">
                                                                <i class="icon-emoticon-smile"></i> 3,7k </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end: widget 1-3 -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-microphone font-dark hide"></i>
                                        <span class="caption-subject bold font-dark uppercase"> Recent Works</span>
                                        <span class="caption-helper">default option...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn red btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">Settings</label>
                                            <label class="btn  red btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Tools</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mt-widget-2">
                                                <div class="mt-head" style="background-image: url(Dashboard/assets/pages/img/background/32.jpg);">
                                                    <div class="mt-head-label">
                                                        <button type="button" class="btn btn-success">Manhattan</button>
                                                    </div>
                                                    <div class="mt-head-user">
                                                        <div class="mt-head-user-img">
                                                            <img src="Dashboard/assets/pages/img/avatars/team7.jpg"> </div>
                                                        <div class="mt-head-user-info">
                                                            <span class="mt-user-name">Chris Jagers</span>
                                                            <span class="mt-user-time">
                                                                <i class="icon-emoticon-smile"></i> 3 mins ago </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-body">
                                                    <h3 class="mt-body-title"> Thomas Clark </h3>
                                                    <p class="mt-body-description"> It is a long established fact that a reader will be distracted </p>
                                                    <ul class="mt-body-stats">
                                                        <li class="font-green">
                                                            <i class="icon-emoticon-smile"></i> 3,7k</li>
                                                        <li class="font-yellow">
                                                            <i class=" icon-social-twitter"></i> 3,7k</li>
                                                        <li class="font-red">
                                                            <i class="  icon-bubbles"></i> 3,7k</li>
                                                    </ul>
                                                    <div class="mt-body-actions">
                                                        <div class="btn-group btn-group btn-group-justified">
                                                            <a href="javascript:;" class="btn">
                                                                <i class="icon-bubbles"></i> Bookmark </a>
                                                            <a href="javascript:;" class="btn ">
                                                                <i class="icon-social-twitter"></i> Share </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mt-widget-2">
                                                <div class="mt-head" style="background-image: url(Dashboard/assets/pages/img/background/43.jpg);">
                                                    <div class="mt-head-label">
                                                        <button type="button" class="btn btn-danger">London</button>
                                                    </div>
                                                    <div class="mt-head-user">
                                                        <div class="mt-head-user-img">
                                                            <img src="Dashboard/assets/pages/img/avatars/team3.jpg"> </div>
                                                        <div class="mt-head-user-info">
                                                            <span class="mt-user-name">Harry Harris</span>
                                                            <span class="mt-user-time">
                                                                <i class="icon-user"></i> 3 mins ago </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-body">
                                                    <h3 class="mt-body-title"> Christian Davidson </h3>
                                                    <p class="mt-body-description"> It is a long established fact that a reader will be distracted </p>
                                                    <ul class="mt-body-stats">
                                                        <li class="font-green">
                                                            <i class="icon-emoticon-smile"></i> 3,7k</li>
                                                        <li class="font-yellow">
                                                            <i class=" icon-social-twitter"></i> 3,7k</li>
                                                        <li class="font-red">
                                                            <i class="  icon-bubbles"></i> 3,7k</li>
                                                    </ul>
                                                    <div class="mt-body-actions">
                                                        <div class="btn-group btn-group btn-group-justified">
                                                            <a href="javascript:;" class="btn ">
                                                                <i class="icon-bubbles"></i> Bookmark </a>
                                                            <a href="javascript:;" class="btn ">
                                                                <i class="icon-social-twitter"></i> Share </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-12 col-sm-12">
                            <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-microphone font-dark hide"></i>
                                        <span class="caption-subject bold font-dark uppercase"> Recent Projects</span>
                                        <span class="caption-helper">default option...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn blue btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                            <label class="btn  blue btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Tools</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mt-widget-4">
                                                <div class="mt-img-container">
                                                    <img src="Dashboard/assets/pages/img/background/34.jpg" /> </div>
                                                <div class="mt-container bg-purple-opacity">
                                                    <div class="mt-head-title"> Website Revamp & Deployment </div>
                                                    <div class="mt-body-icons">
                                                        <a href="#">
                                                            <i class=" icon-pencil"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class=" icon-map"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class=" icon-trash"></i>
                                                        </a>
                                                    </div>
                                                    <div class="mt-footer-button">
                                                        <button type="button" class="btn btn-circle btn-danger btn-sm">Dior</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mt-widget-4">
                                                <div class="mt-img-container">
                                                    <img src="Dashboard/assets/pages/img/background/46.jpg" /> </div>
                                                <div class="mt-container bg-green-opacity">
                                                    <div class="mt-head-title"> CRM Development & Deployment </div>
                                                    <div class="mt-body-icons">
                                                        <a href="#">
                                                            <i class=" icon-social-twitter"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class=" icon-bubbles"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class=" icon-bell"></i>
                                                        </a>
                                                    </div>
                                                    <div class="mt-footer-button">
                                                        <button type="button" class="btn btn-circle blue-ebonyclay btn-sm">Nike</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mt-widget-4">
                                                <div class="mt-img-container">
                                                    <img src="Dashboard/assets/pages/img/background/37.jpg" /> </div>
                                                <div class="mt-container bg-dark-opacity">
                                                    <div class="mt-head-title"> Marketing Campaigns </div>
                                                    <div class="mt-body-icons">
                                                        <a href="#">
                                                            <i class=" icon-bubbles"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class=" icon-map"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class=" icon-cup"></i>
                                                        </a>
                                                    </div>
                                                    <div class="mt-footer-button">
                                                        <button type="button" class="btn btn-circle btn-success btn-sm">Honda</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-microphone font-dark hide"></i>
                                        <span class="caption-subject bold font-dark uppercase"> Activities</span>
                                        <span class="caption-helper">default option...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn red btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Option 1</a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">Option 2</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Option 3</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Option 4</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mt-widget-3">
                                                <div class="mt-head bg-blue-hoki">
                                                    <div class="mt-head-icon">
                                                        <i class=" icon-social-twitter"></i>
                                                    </div>
                                                    <div class="mt-head-desc"> Lorem Ipsum is simply dummy text of the ... </div>
                                                    <span class="mt-head-date"> 25 Jan, 2015 </span>
                                                    <div class="mt-head-button">
                                                        <button type="button" class="btn btn-circle btn-outline white btn-sm">Add</button>
                                                    </div>
                                                </div>
                                                <div class="mt-body-actions-icons">
                                                    <div class="btn-group btn-group btn-group-justified">
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-align-justify"></i>
                                                            </span>RECORD </a>
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-camera"></i>
                                                            </span>PHOTO </a>
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-calendar"></i>
                                                            </span>DATE </a>
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-record"></i>
                                                            </span>RANC </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mt-widget-3">
                                                <div class="mt-head bg-red">
                                                    <div class="mt-head-icon">
                                                        <i class="icon-user"></i>
                                                    </div>
                                                    <div class="mt-head-desc"> Lorem Ipsum is simply dummy text of the ... </div>
                                                    <span class="mt-head-date"> 12 Feb, 2016 </span>
                                                    <div class="mt-head-button">
                                                        <button type="button" class="btn btn-circle btn-outline white btn-sm">Add</button>
                                                    </div>
                                                </div>
                                                <div class="mt-body-actions-icons">
                                                    <div class="btn-group btn-group btn-group-justified">
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-align-justify"></i>
                                                            </span>RECORD </a>
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-camera"></i>
                                                            </span>PHOTO </a>
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-calendar"></i>
                                                            </span>DATE </a>
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-record"></i>
                                                            </span>RANC </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mt-widget-3">
                                                <div class="mt-head bg-green">
                                                    <div class="mt-head-icon">
                                                        <i class=" icon-graduation"></i>
                                                    </div>
                                                    <div class="mt-head-desc"> Lorem Ipsum is simply dummy text of the ... </div>
                                                    <span class="mt-head-date"> 3 Mar, 2015 </span>
                                                    <div class="mt-head-button">
                                                        <button type="button" class="btn btn-circle btn-outline white btn-sm">Add</button>
                                                    </div>
                                                </div>
                                                <div class="mt-body-actions-icons">
                                                    <div class="btn-group btn-group btn-group-justified">
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-align-justify"></i>
                                                            </span>RECORD </a>
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-camera"></i>
                                                            </span>PHOTO </a>
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-calendar"></i>
                                                            </span>DATE </a>
                                                        <a href="javascript:;" class="btn ">
                                                            <span class="mt-icon">
                                                                <i class="glyphicon glyphicon-record"></i>
                                                            </span>RANC </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
 @endsection