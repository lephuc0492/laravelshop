<?php

namespace App\Http\Controllers;

Use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class SampleData extends Controller
{
    public function test(Request $request)
    {

    	return view('testbase64');
    }
    public function upload(Request $request)
    {
    	$file = $request->file('base64');
    	$file = file_get_contents($file);
    	$file = base64_encode($file);

    	echo '<img src="data:image/png;base64, '.$file.'">';
    	return view('testbase64')->with('file', $file);    	
    }
}
