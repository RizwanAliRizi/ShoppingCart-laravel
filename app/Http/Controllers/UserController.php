<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    //

    public function getSignup(){
    	return view('user.signup');
    }

    public function postSignup(Request $request){
    	$this->validate($request,[
    		'name' => 'required',
    		'email' => 'required',
    		'password' => 'required|min:4'
    	]);

    	$user = new User([
    		'name' => $request->get('name'),
    		'email' => $request->get('email'),
    		'password' => bcrypt($request->get('password')) 
    	]);

    	$user->save();
    	Auth::login($user);

    	return redirect()->route('user.profile');
    }


    public function getSignin(){
    	return view('user.signin');
    }

    public function postSignin(Request $request){
    	$this->validate($request,[
    		'name' => 'required',
    		'email' => 'required',
    		'password' => 'required|min:4'
    	]);

    	if(Auth::attempt(['email'=>$request->get('email'), 'password'=> $request->get('password')])){
    		return redirect()->route('user.profile');
    	}
    	return redirect()->back();
    }

    public function getProfile(){
    	return view('user.profile');
    }

    public function getLogout(){
    	Auth::logout();
    	return redirect()->back();
    }
}
