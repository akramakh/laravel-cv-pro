
<div id="containerProfileSettings">
    <h4><strong>Profile Settings</strong></h4>
    <div class="container">
        <div class="row">
            

        <div class="container">
            <p class="large"><b><i class="fa fa-asterisk fa-fw margin-right text-teal"></i>Skills</b></p>
            <div class="table table-responsive">
                <table class="table table-borderd" id="skill-table">
                    <tr>
                        <th>#</th>
                        <th>Skill Name</th>
                        <th>Skill Score</th>
                        <th>created at</th>
                        <th class="text-center">
                            <button  id="create_skill_modal" class="create-skill-modal btn btn-primary btn-sm" data-toggle="modal" data-target="#modal" onclick="loadModalContent('/modal/add-skill')">
                                <i class="fa fa-plus"></i>
                            </button>
                        </th>
                    </tr>
                    @foreach($user->skills as $skill)
                    <tr>
                        <td>{{$skill->pivot->id}}</td>
                        <td>{{$skill->name}}</td>
                        <td>{{$skill->pivot->score}}</td>
                        <td>{{$skill->pivot->created_at->diffForHumans()}}</td>
                        <td class="text-center">
                            <button href="#" class="edit-skill-modal btn btn-warning btn-sm" data-toggle="modal" data-target="#modal" onclick="loadModalContent('modal/edit-skill/{{$skill->pivot->id}}')" >
                                <i class="fa fa-pencil"></i>
                            </button>
                            <a href="#" class="delete-skill-modal btn btn-danger btn-sm" data-toggle="modal" data-target="#modal" onclick="loadModalContent('modal/delete-skill/{{$skill->pivot->id}}')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>

            </div>

            <hr width="100%">
            
            <div class="container">
                <p class="large text-theme"><b><i class="fa fa-globe fa-fw margin-right text-teal"></i>Languages</b></p>
                <div class="table table-responsive">
                <table class="table table-borderd" id="skill-table">
                    <tr>
                        <th>#</th>
                        <th>Language</th>
                        <th>Score</th>
                        <th>created at</th>
                        <th class="text-center">
                            <button  id="create_language_modal" class="create-language-modal btn btn-primary btn-sm" data-toggle="modal" data-target="#modal" onclick="loadModalContent('/modal/add-language')">
                                <i class="fa fa-plus"></i>
                            </button>
                        </th>
                    </tr>
                    @foreach($user->languages as $lang)
                    <tr>
                        <td>{{$lang->pivot->id}}</td>
                        <td>{{$lang->name}}</td>
                        <td>{{$lang->pivot->score}}</td>
                        <td>{{$lang->pivot->created_at->diffForHumans()}}</td>
                        <td class="text-center">
                            <button href="#" class="edit-language-modal btn btn-warning btn-sm" data-toggle="modal" data-target="#modal" onclick="loadModalContent('modal/edit-language/{{$lang->pivot->id}}')" >
                                <i class="fa fa-pencil"></i>
                            </button>
                            <a href="#" class="delete-language-modal btn btn-danger btn-sm" data-toggle="modal" data-target="#modal" onclick="loadModalContent('modal/delete-language/{{$lang->pivot->id}}')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            
            <hr width="100%">
            @if(count($user->workExperiences) > 0)
            <div class="container">
                <p class="large text-theme"><b><i class="fa fa-globe fa-fw margin-right text-teal"></i>Work Experiences</b></p>
                <div class="table table-responsive">
                <table class="table table-borderd" id="work-table">
                    <tr>
                        <th>Role</th>
                        <th>Company</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th class="text-center">
                            <button  id="create_language_modal" class="create-language-modal btn btn-primary btn-sm" data-toggle="modal" data-target="#modal" onclick="loadModalContent('/modal/add-language')">
                                <i class="fa fa-plus"></i>
                            </button>
                        </th>
                    </tr>
                    @foreach($user->workExperiences as $work)
                    <tr>
                        <td>{{$work->role}}</td>
                        <td>{{$work->company}}</td>
                        <td>{{$work->start_date->diffForHumans()}}</td>
                        <td>{{$work->end_date->diffForHumans()}}</td>
                        <td class="text-center">
                            <button href="#" class="edit-language-modal btn btn-warning btn-sm" data-toggle="modal" data-target="#modal" onclick="loadModalContent('modal/edit-language/{{$lang->pivot->id}}')" >
                                <i class="fa fa-pencil"></i>
                            </button>
                            <a href="#" class="delete-language-modal btn btn-danger btn-sm" data-toggle="modal" data-target="#modal" onclick="loadModalContent('modal/delete-language/{{$lang->pivot->id}}')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
             @endif 
             
            <hr width="100%">
            @if(count($user->educations) > 0)
            <div class="container">
                <p class="large text-theme"><b><i class="fa fa-globe fa-fw margin-right text-teal"></i>Educations</b></p>
                <div class="table table-responsive">
                <table class="table table-borderd" id="work-table">
                    <tr>
                        <th>Degree</th>
                        <th>Provider</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th class="text-center">
                            <button  id="create_education_modal" class="create-education-modal btn btn-primary btn-sm" data-toggle="modal" data-target="#modal" onclick="loadModalContent('/modal/add-education')">
                                <i class="fa fa-plus"></i>
                            </button>
                        </th>
                    </tr>
                    @foreach($user->educations as $edu)
                    <tr>
                        <td>{{$edu->degree}}</td>
                        <td>{{$edu->provider}}</td>
                        <td>{{$edu->start_date->diffForHumans()}}</td>
                        <td>{{$edu->end_date->diffForHumans()}}</td>
                        <td class="text-center">
                            <button href="#" class="edit-education-modal btn btn-warning btn-sm" data-toggle="modal" data-target="#modal" onclick="loadModalContent('modal/edit-education/{{$edu->id}}')" >
                                <i class="fa fa-pencil"></i>
                            </button>
                            <a href="#" class="delete-education-modal btn btn-danger btn-sm" data-toggle="modal" data-target="#modal" onclick="loadModalContent('modal/delete-education/{{$edu->id}}')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
             @endif  

            </div>
    </div>
    </div>

   
</div>
<script>
    $("#updateBtn").click(function(){
        var university = $("#university").val();
        var factualy = $("#factualy").val();
        var department = $("#department").val();
        var moreInfo = $("#moreInfo").val();
        var startEdu = $("#startEdu").val();
        var endEdu = $("#endEdu").val();
        var pob = $("#pob").val();
        var city = $("#city").val();
        
        $.ajax({
            type:'POST',
            url:'setProfileInfo.php',
            data:{
                university : university,
                factualy : factualy,
                department : department,
                moreInfo : moreInfo,
                startEdu : startEdu,
                endEdu : endEdu,
                pob : pob,
                city : city
                 },
            success:function(){
                $("#containerProfileSettings").load("showProfileInfo.php");
                $("#container_settings").load("showProfileInfo.php");
            }
        });
    });

        
</script>
<script>
    
//function removeAlert(){
//    $('.modal-alert').text('');
//    $('.modal-alert').hide();
//}
//$('.table').find('.create-skill-modal').on('click',function () {
//    $('#create_skill').modal();
//});
function addSkillModal(e){
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


</script> 