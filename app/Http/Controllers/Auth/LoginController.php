<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;
use App\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /**
     * Redirect the user to Facebook authintication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    
    
    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try{
        $user = Socialite::driver('facebook')->user();
            dd($user);
        }catch(Exception $e){
            return redirect('auth/facebook');
        }
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser,true);
        return redirect()->route('home');
    }
    
    public function findOrCreateUser($facebookUser){
        $authUser = User::where('facebook_id',$facebookUser->id)->first();
        if($authUser){
            return $authUser;
        }else{
            return User::create([
            'first_name' => $facebookUser->name,
            'last_name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'facebook_id' => $facebookUser->id,
//            'avatar' => $facebookUser->avatar,
            
        ]);
        }
    }
    
}
