<?php

namespace App\Http\Controllers;
Use App\usershop;
Use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class UsershopController extends Controller
{
    public $result = array();
    public function register(Request $request)
    {
    	//Register

    	$new_user = new usershop(); //function access to DB::Usershop
    	$new_user->user_email = $request->user_email;
    	$new_user->user_password = $request->user_password;
    	$new_user->user_name = $request->user_name;
    	$new_user->user_phone = $request->user_phone;

        $getdb_usershop = usershop::where('user_email', $request->user_email)->first();
        if (isset($getdb_usershop)) 
        {
        $result['register_fail'] = 'Email Registed!';
        }
        else
        {
        $new_user->save();     
        $result['register_success'] = 'success';            
        }
        return $result;

        //End Register
    }

    public function login_user(Request $request)
    {
        $check_login = usershop::where('user_email', $request->user_email)->where('user_password', $request->user_password)->first();
        if (isset($check_login)) 
        {
            $result['login_success'] = 'Login success';
            Session::put('user_name', $check_login->user_name);
            Session::put('user_id', $check_login->user_id);
        }
        else
        {
            $result['login_fail'] = 'Login Fail';
        }
        return $result;
        //var_dump(isset($check_login)); 
    }

    public function logout_user()
    {
        Session::put('user_name', null);
        Session::put('user_id', null);
        $result['logout'] = 'Logout Success!';
        $a = new BuyingInformationController;
        return $a->get_infor_goods(1);
        echo '<br>';
        // return $result;
    }
}
