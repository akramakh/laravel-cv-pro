<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModalContentController extends Controller
{
    use App\User;
    use App\Skill;
    use App\SkillUser;
    //
    
    public function deactiveAccount(){
        return view('modals.deactiveAccount');
    }
    
    public function addSkill()
    {
        $skills = Skill::all();
        return view('modals.addSkill',compact('skills'));
    }
    
    public function editSkill($id)
    {
        $skillUser=SkillUser::find($id);
        $skillId=$skillUser->skill_id;
        $skill = Skill::find($skillId);
        $name=$skill->name;
        $score= $skillUser->score;

        return view('modals.editSkill',compact('id','name','score'));
    }
    
    public function deleteSkill($id)
    {
        return view('modals.deleteSkill',compact('id'));
    }
}
