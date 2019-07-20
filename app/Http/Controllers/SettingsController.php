<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\User;

class SettingsController extends Controller
{
    //
    public function updateUserInfo(Request $r)
    {
        $user = Auth::user();
        $user->update([
            "first_name"=>$r->first_name,
            "last_name"=>$r->last_name
        ]);
        $info = $user->info();
        $info->update([
            "jop_title" => $r->jop_title,
            "phone_number" => $r->phone_number,
            "address" => $r->address,
        ]);
        return response("updating done successfully ");
    }
    public function setPassword(Request $r)
    {
        $user = Auth::user();
        $oldPass =  Hash::make($r->oldpassword);
        $newPass =  Hash::make($r->newpassword);
        if($oldPass == $user->password){
            // $user->update([
            //     "password" => $newPass
            // ]);
            return response("Your Password Changed");
        }else{
            return response("wrong Password");
        }
    }
}
