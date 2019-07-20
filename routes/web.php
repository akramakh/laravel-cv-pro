<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Resources;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Skill;
use App\SkillUser;
use App\Language;
use App\LanguageUser;
use App\Education;


Route::get('/', 'HomeController@welcome');
Route::get('/add-data', 'HomeController@showAddData');

Route::get('/add-skill-user', 'HomeController@addSkillUser');
Route::post('/add-skill-user', 'HomeController@addSkillUser');
Route::post('/add-skill-user-ajax', 'HomeController@addSkillUserAjax');

Route::get('/add-lang-user', 'HomeController@addLangUser');
Route::post('/add-lang-user', 'HomeController@addLangUser');
Route::post('/add-language-user-ajax', 'HomeController@addLanguageUserAjax');

Route::get('/add-work-user', 'HomeController@addWorkUser');
Route::post('/add-work-user', 'HomeController@addWorkUser');

Route::get('/add-edu-user', 'HomeController@addEduUser');
Route::post('/add-edu-user', 'HomeController@addEduUser');
Route::post('/add-edu-user-ajax', 'HomeController@addEducationUserAjax');

Route::get('/add-course-user', 'HomeController@addCourseUser');
Route::post('/add-course-user', 'HomeController@addCourseUser');

Route::get('/add-social-user', 'HomeController@addSocialUser');
Route::post('/add-social-user', 'HomeController@addSocialUser');

Route::get('/add-interest-user', 'HomeController@addInterestUser');
Route::post('/add-interest-user', 'HomeController@addInterestUser');

Route::get('/add-personal-info', 'HomeController@addUserInfo');
Route::post('/add-personal-info', 'HomeController@addUserInfo');

Route::get('/add-personal-photo', 'HomeController@addPersonalPhoto');
Route::post('/add-personal-photo', 'HomeController@addPersonalPhoto');


Route::post('/create-skill-user', [
    'uses'=>'HomeController@addSkillUserAjax',
    'as'=>'addSkillUser'
]);

Route::get('/user-info/profile-photo',function(){
    return view('user-info.profile-photo');
});
Route::post('/upload-profile-photo','HomeController@uploadProfilePhoto');
Route::get('/profile-photo/{filename}',[
    'uses'=>'HomeController@getProfilePhoto',
    'as'=>'account.profile'
]);

Route::post('/update-personal-photo','HomeController@updatePersonalPhoto');
Route::get('/personal-photo/{filename}',[
    'uses'=>'HomeController@getPersonalPhoto',
    'as'=>'personal.photo'
]);

Route::post('/upload-intro-video','HomeController@uploadIntroVideo');
Route::get('/profile-intro-video/{filename}',[
    'uses'=>'HomeController@getIntroVideo',
    'as'=>'account.intro'
]);

Route::get('/create-user-info/{id}','HomeController@createUserInfo');

Route::post('/remove-user-skill','HomeController@removeUserSkill');
Route::post('/update-user-skill','HomeController@updateUserSkill');

Route::post('/remove-user-language','HomeController@removeUserLanguage');
Route::post('/update-user-language','HomeController@updateUserLanguage');

Route::post('/remove-user-edu','HomeController@removeUserEducation');
Route::post('/update-user-edu','HomeController@updateUserEducation');

Route::post('/settings/update-user-info','SettingsController@updateUserInfo');
Route::post('/settings/set-password','SettingsController@setPassword');

Route::get('/test',function(){
    $user = Auth::user();
    return view('test',compact('user'));
//	$user =User::find(1);
//	echo 'name: '.$user->first_name.'<br>';
//	foreach($user->workExperiences as $work){
//		echo 'work as '.$work->role.' at '.$work->company. '<br>';
//		echo 'from '.$work->start_date.' to '.$work->end_date. '<br>';
//		echo '--------------------------------------------------------<br>';
//	}

});

/*
*  Routes for load settings content
*/

Route::get('/get-test-file',function (){
    return view('files.test');
});

Route::post('/test',function(){
    return Response('successfully');

});

Route::get('/show-account-settings',function (){
    $user = Auth::user();
    return view('settings.showAccountInfo',compact('user'));
});

Route::get('/show-personal-settings',function(){
    $user = Auth::user();
    return view('settings.personalSettings',compact('user'));
});

Route::get('/show-password-settings',function(){
    $user = Auth::user();
    return view('settings.passwordSettings');
});

Route::get('/show-profile-settings',function(){
    $user = Auth::user();
    $skills = Skill::all();
    return view('settings.profileSettings',compact('user','skills'));
});


Route::get('/admin',function(){
    $user = Auth::user();
    return view('admin_2.index',compact('user'));
});


/*
*  Routes for load Madals content
*/

Route::get('/deactive-account-modal-content',function(){
    return view('modals.deactiveAccount');
});

// Skills Modals
Route::get('/modal/add-skill',function(){
    $skills = Skill::all();
    return view('modals.addSkill',compact('skills'));
});

Route::get('/modal/delete-skill/{id}',function($id){
    return view('modals.deleteSkill',compact('id'));
});

Route::get('/modal/edit-skill/{id}',function($id){
    $skillUser=SkillUser::find($id);
    $skillId=$skillUser->skill_id;
    $skill = Skill::find($skillId);
    $name=$skill->name;
    $score= $skillUser->score;
    
    return view('modals.editSkill',compact('id','name','score'));
});


// Languages Modals
Route::get('/modal/add-language',function(){
    $languages = Language::all();
    return view('modals.addLanguage',compact('languages'));
});

Route::get('/modal/delete-language/{id}',function($id){
    return view('modals.deleteLanguage',compact('id'));
});

Route::get('/modal/edit-language/{id}',function($id){
    $languageUser=LanguageUser::find($id);
    $languageId=$languageUser->language_id;
    $language = Language::find($languageId);
    $name=$language->name;
    $score= $languageUser->score;
    
    return view('modals.editSkill',compact('id','name','score'));
});



// Education Modals
Route::get('/modal/add-education',function(){
    return view('modals.addEducation');
});

Route::get('/modal/delete-education/{id}',function($id){
    $edu = Education::whereId($id)->first();
    return view('modals.deleteEducation',compact('edu'));
});

Route::get('/modal/edit-education/{id}',function($id){
    $edu=Education::whereId($id)->first();
    return view('modals.editEducation',compact('edu'));
});

/** */
Route::get('modal/upload-profile-photo',function(){
    return view('modals.uploadProfilePhoto');
});

Route::get('/modal/edit-personal-photo',function(){
    return view('modals.editPersonalPhoto');
});

// Admin Modals here
// Skills Modals
Route::get('admin/modal/add-skill','AdminController@createSkill');

Route::get('admin/modal/delete-skill/{id}','AdminController@deleteSkill');
Route::get('admin/modal/edit-skill/{id}','AdminController@editSkill');

// Languages Modals
Route::get('admin/modal/add-language','AdminController@createLanguage');

Route::get('admin/modal/delete-language/{id}','AdminController@deleteLanguage');
Route::get('admin/modal/edit-language/{id}','AdminController@editLanguage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/settings', 'HomeController@settings')->name('settings');
Route::get('/profile', 'HomeController@profile')->name('profile');


Route::resource('skills','SkillsController');
Route::resource('langs','LanguagesController');
Route::resource('work-expeirences','WorkExperiencesController');
Route::resource('educations','EducationsController');
Route::resource('courses','CoursesController');
Route::resource('social-medias','SocialMediasController');
Route::resource('interests','InterestsController');


/*
  Admin Routes
*/

Route::get('/admin',function(){
    $user = Auth::user();
    return view('admin_2.index',compact('user'));
});

Route::get('/dashboard_1',function(){
    $user = Auth::user();
    return view('admin_2.index',compact('user'));
})->name('admin.dashboard1');


Route::get('/dashboard_2',function(){
    $user = Auth::user();
    return view('admin_2.dashboard_2',compact('user'));
})->name('admin.dashboard2');


Route::get('/dashboard_3',function(){
    $user = Auth::user();
    return view('admin_2.dashboard_3',compact('user'));
})->name('admin.dashboard3');


Route::get('/manage','AdminController@manage');

Route::post('/admin/add-skill','AdminController@insertSkillAjax');
Route::post('admin/remove-skill','AdminController@removeSkill');
Route::post('admin/update-skill','AdminController@updateSkill');


Route::post('/admin/add-language','AdminController@insertLanguageAjax');
Route::post('admin/remove-language','AdminController@removeLanguage');
Route::post('admin/update-language','AdminController@updateLanguage');

/*
    Facebook Login Authintication Routes
*/
Route::get('auth/facebook',[
    'as'=>'auth/facebook',
    'uses'=>'Auth\LoginController@redirectToProvider'
]);
Route::get('auth/facebook/callback',[
    'as'=>'auth/facebook/callback',
    'uses'=>'Auth\LoginController@handleProviderCallback'
]);

