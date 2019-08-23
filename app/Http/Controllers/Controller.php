<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function insert(Request $req){
    	$tweet_text = $req->input('tweet_text');
    	$user = Auth::user();

    	$data = array('json'=>'[]',
    		'tweet_text'=>$tweet_text,
    		'approved'=>'0',
    		'user_id'=> $user->id,
    		'user_screen_name'=>$user->name);

    	DB::table('tweets')->insert($data);
        return redirect('/home');
    }
    
    function delete($id)
    {
    	// Tweet::where('id',$id)->delete();
    	DB::table('tweets')->where('id',$id)->delete();
    	  return redirect('/home');	
    }
}
