<?php

namespace App\Http\Controllers;
Use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
    	return view('pages.admin.AdminLogin');
    }
    public function dashboard()
    {
    	return view('pages.admin.dashboard');
    }
    public function login_dashboard(Request $request)			//gui request laravel
    {

    	$admin_email = $request->admin_email;
    	$admin_password = $request->admin_password;

        $result = DB::table('tbl-admin')->where('admin_email', $admin_email)->where('admin_password',$admin_password)->first(); //first la lay 1 user 1 dong
        //$result = DB::table('tbl-admin')->first();

        if (isset($result)) 
        {
 
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);            
            return view('pages.admin.dashboard');
        }
        else
        {
            Session::put('message', 'Sai cmnr');            
           return Redirect::to('/admin/login');

        }

    	//return view('pages.admin.dashboard');
    }
    public function logout()
    {
            Session::put('admin_name', null);
            Session::put('admin_id', null);            
            return Redirect::to('/admin/login');
    }
    public function setting_information()
    {
        return view('pages.admin.SettingInformation');
    }
    public function add_setting_information(Request $request)
    {
        $check_email = DB::table('tbl-admin')->where('email', $request->admin_email)->first();

        //check email if duplicate 

        if (empty($check_email) == 1) 
        {
        $data_add_setting_information = array();
        $data_add_setting_information['admin_email'] = $request->admin_email;
        $data_add_setting_information['admin_password'] = $request->admin_password;
        $data_add_setting_information['admin_name'] = $request->admin_name;
        $data_add_setting_information['admin_phone'] = $request->admin_phone; 
        DB::table('tbl-admin')->insert($data_add_setting_information);
        Session::put('setting_message','Thêm thành công TK admin');            
        }
        else
        {
        Session::put('setting_message','Đã có email này rồi!');            
        }
        return view('pages.admin.SettingInformation');     
    }
    public function sample_data(Request $request)
    {
        $data_add_setting_information = array();
        $data_add_setting_information['admin_email'] = 'sampledata1@gmail.com';
        $data_add_setting_information['admin_password'] = '123456';
        $data_add_setting_information['admin_name'] = 'Phuc';
        $data_add_setting_information['admin_phone'] = '0364225633';
        $check_email = DB::table('tbl-admin')->where('admin_email', $data_add_setting_information['admin_email'])->first();

        //check email if duplicate 

        if (empty($check_email) == 1) 
        {
        DB::table('tbl-admin')->insert($data_add_setting_information);
        Session::put('message', 'Thêm tài khoản mẫu thành công!');
        }
        else
        {
        Session::put('message','Đã add TK mẫu rồi!');              
        }                
        return Redirect::to('/admin/login');          
    }
}

