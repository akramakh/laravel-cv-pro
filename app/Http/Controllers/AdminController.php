<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Skill;
use App\SkillUser;
use App\Language;
use App\LanguageUser;
class AdminController extends Controller
{
    //
    
    
    public function manage(){
        $user = Auth::user();
        $skills = Skill::all();
        $languages = Language::all();
        return view('admin.index',compact('user','skills','languages'));
    }
    
    public function createSkill(){
        return view('modals.admin.addSkill');
    }
    
    public function insertSkillAjax(Request $request)
    {
        $user = Auth::user();

        if($request->isMethod('post')) {
            
            $skill = Skill::whereName($request->skill_name)->first();
            
            if($skill == null) {
                $skill = Skill::create([
                    'name' => $request->skill_name,
                ]);
                return Response('Skill: '.$request->skill_name.' Added Successfully');
            }
            else{
                return 'this skill is already exists';
            }
        }
    }
    
    public function deleteSkill($id){
        $skill = Skill::whereId($id)->first();
        $count = SkillUser::whereSkillId($id)->count();
        return view('modals.admin.deleteSkill',compact('skill','count'));
    }
    
    public function removeSkill(Request $request)
    {
        $user = Auth::user();
        if($request->isMethod('post')) {
            $test = Skill::whereId($request->id)->delete();
            $testUser = SkillUser::whereSkillId($request->id)->delete();
            if ($test) {

                return response('Your Skill Deleted Successfully');
            } else {
                return 'this skill is not exists';
            }
        }
    }
    
    
    public function editSkill($id){
        $skill = Skill::whereId($id)->first();
        $count = SkillUser::whereSkillId($id)->count();
        return view('modals.admin.editSkill',compact('skill','count'));
    }
    
    public function updateSkill(Request $request)
    {
        $user = Auth::user();
        if($request->isMethod('post')) {
            $old_name = Skill::whereId($request->id)->first()->name;
            $test = Skill::whereId($request->id)->update([
                'name' => $request->name
            ]);
            if ($test) {

                return response('Your Skill updated from '.$old_name.' to '.$request->name.' Successfully');
            } else {
                return 'this skill is not exists';
            }
        }
    }
    
    /******* Language Manipulations *******/
    
    public function createLanguage(){
        return view('modals.admin.addLanguage');
    }
    
    public function insertLanguageAjax(Request $request)
    {
        $user = Auth::user();

        if($request->isMethod('post')) {
            
            $language = Language::whereName($request->language_name)->first();
            
            if($language == null) {
                $language = Language::create([
                    'name' => $request->language_name,
                ]);
                return Response('Language: '.$request->language_name.' Added Successfully');
            }
            else{
                return 'this Language is already exists';
            }
        }
    }
    
    public function deleteLanguage($id){
        $language = Language::whereId($id)->first();
        $count = LanguageUser::whereLanguageId($id)->count();
        return view('modals.admin.deleteLanguage',compact('language','count'));
    }
    
    public function removeLanguage(Request $request)
    {
        $user = Auth::user();
        if($request->isMethod('post')) {
            $test = Language::whereId($request->id)->delete();
            $testUser = LanguageUser::whereLanguageId($request->id)->delete();
            if ($test) {

                return response('Your Language Deleted Successfully');
            } else {
                return 'this Language is not exists';
            }
        }
    }
    
    
    public function editLanguage($id){
        $language = Language::whereId($id)->first();
        $count = LanguageUser::whereLanguageId($id)->count();
        return view('modals.admin.editLanguage',compact('language','count'));
    }
    
    public function updateLanguage(Request $request)
    {
        $user = Auth::user();
        if($request->isMethod('post')) {
            $old_name = Language::whereId($request->id)->first()->name;
            $test = Language::whereId($request->id)->update([
                'name' => $request->name
            ]);
            if ($test) {

                return response('Your Language updated from '.$old_name.' to '.$request->name.' Successfully');
            } else {
                return 'this Language is not exists';
            }
        }
    }
    
}
