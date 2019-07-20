<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\User;
use App\Skill;
use App\Language;
use App\SkillUser;
use App\LanguageUser;
use App\WorkExperience;
use App\Education;
use App\Course;
use App\SocialMedia;
use App\Interest;
use App\PersonalInfo;

use function Sodium\compare;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('home',compact('user'));
    }
    public function welcome()
    {
        $user = Auth::user();
        return view('welcome',compact('user'));
    }

    public function settings()
    {
        $user = Auth::user();
        $skills = Skill::all();
        return view('settings',compact('user','skills'));
    }

    public function profile()
    {
        $user = Auth::user();
        $skills = Skill::all();
        return view('profile',compact('user','skills'));
    }


    public function showAddData()
    {
        $user = Auth::user();
        $skills = Skill::all();
        $languages = Language::all();
        return view('add-data',compact('skills','languages','user'));
    }


    public function addUserInfo(Request $request)
    {
        $user = Auth::user();

        if($request->isMethod('post')) {
            $user->info()->save(new PersonalInfo([
                'jop_title' => $request->jop_title,
                'address' => $request->address,
                'phone_number' => $request->phone_number
            ]));
            return redirect('/add-data');
        }
        return redirect('/add-data');
    }


    public function uploadProfilePhoto(Request $request){
        if($request->isMethod('post')) {
            $user = Auth::user();
            $file = $request->file('personal_photo');
            $filename = $user->id . '/profile.jpg';
            if ($file) {
                Storage::disk('akram')->put($filename, File::get($file));
                $info = PersonalInfo::whereUserId($user->id)->update([
                    'profile_photo' => $filename
                ]);
            }
            return redirect('/profile');
        }
    }

    /******* Not Used *********/
    public function getProfilePhoto($filename){
        $file = Storage::disk('local')->get($filename);

        return new Response($file, 200);
    }


    public function updatePersonalPhoto(Request $request){
        if($request->isMethod('post')) {
            $user = Auth::user();
            $file = $request->file('personal_photo');
            $filename = $user->id . '/personal.jpg';
            if ($file) {
                Storage::disk('akram')->put($filename, File::get($file));
                $info = PersonalInfo::whereUserId($user->id)->update([
                    'personal_photo' => $filename
                ]);
            }
            return redirect('/profile');
        }
    }
/******* Not Used *********/
    public function getPersonalPhoto($filename){
        $file = Storage::disk('local')->get($filename);

        return new Response($file, 200);
    }


    public function uploadIntroVideo(Request $request){

        if($request->isMethod('post')) {
            $user = Auth::user();
            $file = $request->file('intro_video');
            $filename = $user->id . '/intro.mp4';
            if ($file) {
                Storage::disk('akram')->put($filename, File::get($file));
                $info = PersonalInfo::whereUserId($user->id)->update([
                    'intro_video' => $filename
                ]);
                return redirect('/profile');
            }else{
                return redirect('/profile');
            }

        }
    }

//    public function getIntroVideo($filename){
//        $file = Storage::disk('local')->get($filename);
//
//        return new Response($file, 200);
//    }

////////////////////////////////////////////////////////////////////////////////
    public function addPersonalPhoto(Request $request){
        $user = Auth::user();

        if($request->isMethod('post')) {
            $file = $request->file('personal_photo');
//            $file = $request->personal_photo;
            return $file->getRealPath();
//            return view('add-data', compact('file','user'));
        }
        return 'from get method';
    }

    public function addSkillUser(Request $request)
    {
        $user = Auth::user();

        if($request->isMethod('post')) {
            $test = SkillUser::whereSkillId($request->skill_name)->whereUserId($user->id)->get();
            if($test->isEmpty()) {
//                $skill = Skill::whereId($request->skill_name)->get();
                SkillUser::create([
                    'user_id' => $user->id,
                    'skill_id' => $request->skill_name,
                    'score' => $request->score
                ]);
//                $user->skills()->attach($skill);
//                $user->skillRates()->save(new SkillRate([
////                    'user_id' => $user->id,
//                    'skill_id' => $request->skill_name,
//                    'score' => $request->score
//                ]));
                return redirect('/add-data')->with('skill_success_msg', 'Your Skill Added Successfuly');
            }
            else{
                return 'this skill is already exists';
            }
        }
    }

    public function removeUserSkill(Request $request)
    {
        $user = Auth::user();
        if($request->isMethod('post')) {
            $test = SkillUser::whereId($request->id)->whereUserId($user->id)->delete();
            if ($test) {

                return response('Your Skill Deleted Successfully');
            } else {
                return 'this skill is not exists';
            }
        }
    }

    public function updateUserSkill(Request $request)
        {
            $user = Auth::user();
            if($request->isMethod('post')) {
                $test = SkillUser::whereId($request->id)->whereUserId($user->id)->first();
                $skillId = $test->skill_id;
                if ($test) {
//                    $test->update([
//                        'score' => $request->score
//                    ]);
                    $user->skills()->updateExistingPivot( $skillId ,[ 'score' => $request->score]);
                    return response('Your Skill Updated Successfully'.$request->score );
                } else {
                    return 'this skill is not exists';
                }
            }
        }


    public function createUserInfo ($id)
    {
        $user = User::whereId($id);

                $skill = PersonalInfo::create([
                    'user_id' => $id,
                    'jop_title' => 'non',
                    'phone_number' => '+0000000000',
                    'address' => 'non',
                    'personal_photo' => 'defualt_personal_photo.jpg',
                    'profile_photo' => 'defualt_profile_photo.jpg'
                ]);
                return redirect('/profile');

    }

    public function addSkillUserAjax(Request $request)
    {
        $user = Auth::user();

        if($request->isMethod('post')) {
            $test = SkillUser::whereSkillId($request->skill_name)->whereUserId($user->id)->get();
            $sname = Skill::whereId($request->skill_name)->first();
            if($test->isEmpty()) {
//                $skill = Skill::whereId($request->skill_name)->get();
                $skill = SkillUser::create([
                    'user_id' => $user->id,
                    'skill_id' => $request->skill_name,
                    'score' => $request->score
                ]);
                return Response('Skill: '.$sname->name.' Added Successfully');
            }
            else{
                return 'this skill is already exists';
            }
        }
    }


    public function addLangUser(Request $request)
    {
        $user = Auth::user();

        if($request->isMethod('post')) {
            $test = LanguageUser::whereLanguageId($request->lang_name)->whereUserId($user->id)->get();
            if($test->isEmpty()) {
//            $lang = Language::whereId($request->lang_name)->get();
                LanguageUser::create([
                    'user_id' => $user->id,
                    'language_id' => $request->lang_name,
                    'score' => $request->score
                ]);
//            $user->languages()->attach($lang);
//            $user->langRates()->save(new LangRate([
////                    'user_id' => $user->id,
//                'language_id' => $request->lang_name,
//                'value' => $request->score
//            ]));
                return redirect('/add-data')->with('skill_success_msg', 'Your Skill Added Successfuly');
            }
            else{
                return 'this skill is already exists';
            }
        }
    }
    
    public function removeUserLanguage(Request $request)
    {
        $user = Auth::user();
        if($request->isMethod('post')) {
            $test = LanguageUser::whereId($request->id)->whereUserId($user->id)->delete();
            if ($test) {

                return response('Your Language Deleted Successfully');
            } else {
                return 'this Language is not exists';
            }
        }
    }

    public function updateUserLanguage(Request $request)
        {
            $user = Auth::user();
            if($request->isMethod('post')) {
                $test = LanguageUser::whereId($request->id)->whereUserId($user->id)->first();
                $slanguageId = $test->language_id;
                if ($test) {
//                    $test->update([
//                        'score' => $request->score
//                    ]);
                    $user->languages()->updateExistingPivot( $languageId ,[ 'score' => $request->score]);
                    return response('Your Language Updated Successfully'.$request->score );
                } else {
                    return 'this Language is not exists';
                }
            }
        }



    public function addLanguageUserAjax(Request $request)
    {
        $user = Auth::user();

        if($request->isMethod('post')) {
            $test = LanguageUser::whereLanguageId($request->language_name)->whereUserId($user->id)->get();
            $lname = Language::whereId($request->language_name)->first();
            if($test->isEmpty()) {
//                $skill = Skill::whereId($request->skill_name)->get();
                $lang = LanguageUser::create([
                    'user_id' => $user->id,
                    'language_id' => $request->language_name,
                    'score' => $request->score
                ]);
                return Response($lname->name.' Language Added Successfully');
            }
            else{
                return 'this Language is already exists';
            }
        }
    }



    public function addWorkUser(Request $request)
    {
        $user = Auth::user();

        if($request->isMethod('post')) {
            $user->workExperiences()->save(new WorkExperience([
//                    'user_id' => $user->id,
                'company' => $request->company,
                'role' => $request->role,
                'start_date' => $request->from,
                'end_date' => $request->to,
                'more_info' => $request->more_info
            ]));
            return redirect('/add-data')->with('skill_success_msg', 'Your Skill Added Successfuly');
        }
    }


    public function addEduUser(Request $request)
    {
        $user = Auth::user();

        if($request->isMethod('post')) {
            $user->educations()->save(new Education([
//                    'user_id' => $user->id,
                'provider' => $request->provider,
                'degree' => $request->degree,
                'start_date' => $request->from,
                'end_date' => $request->to,
                'more_info' => $request->more_info
            ]));
            return redirect('/add-data')->with('skill_success_msg', 'Your Skill Added Successfuly');
        }
    }

    public function addEducationUserAjax(Request $request)
    {
        $user = Auth::user();
        
        if($request->isMethod('post')) {
            $user->educations()->save(new Education([
                'provider' => $request->provider,
                'degree' => $request->degree,
                'start_date' => $request->from,
                'end_date' => $request->to,
                'more_info' => $request->details
            ]));
            return Response($request->provider.' Education Was Added Successfully');
        }
    }

    public function removeUserEducation(Request $request)
    {
        $user = Auth::user();
        if($request->isMethod('post')) {
            $test = Education::whereId($request->id)->whereUserId($user->id)->delete();
            if ($test) {

                return response('Your Education Item Deleted Successfully');
            } else {
                return 'this operation has an error !';
            }
        }
    }

    public function updateUserEducation(Request $request)
        {
            $user = Auth::user();
            if($request->isMethod('post')) {
                $test = Education::whereId($request->id)->whereUserId($user->id)->first();
                if ($test) {
                    $user->educations()->update( [
                        'provider' => $request->provider,
                        'degree' => $request->degree,
                        'start_date' => $request->from,
                        'end_date' => $request->to,
                        'more_info' => $request->details
                    ]);
                    return response('Your Education Updated Successfully' );
                } else {
                    return 'this operation has an error !';
                }
            }
        }


    public function addCourseUser(Request $request)
    {
        $user = Auth::user();

        if($request->isMethod('post')) {
            $user->courses()->save(new Course([
//                    'user_id' => $user->id,
                'provider' => $request->provider,
                'name' => $request->name,
                'start_date' => $request->from,
                'end_date' => $request->to,
                'more_info' => $request->more_info
            ]));
            return redirect('/add-data')->with('skill_success_msg', 'Your Skill Added Successfuly');
        }
    }


    public function addSocialUser(Request $request)
    {
        $user = Auth::user();

        if($request->isMethod('post')) {
            $user->socialMedias()->save(new SocialMedia([
//                    'user_id' => $user->id,
                'type' => $request->type,
                'link' => $request->link
            ]));
            return redirect('/add-data')->with('skill_success_msg', 'Your Skill Added Successfuly');
        }
    }


    public function addInterestUser(Request $request)
    {
        $user = Auth::user();

        if($request->isMethod('post')) {
            $user->interests()->save(new Interest([
//                    'user_id' => $user->id,
                'name' => $request->name,
                'more_info' => $request->more_info
            ]));
            return redirect('/add-data')->with('skill_success_msg', 'Your Skill Added Successfuly');
        }
    }


}
