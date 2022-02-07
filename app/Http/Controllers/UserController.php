<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        $pagetitle = 'ویرایش پروفایل';
		return view('front.auth.profile',compact('pagetitle','user'));
    }

    public function update(Request $request,User $user)
    {
		$messages = [
			'name.required' => 'فیلد نام را وارد نمایید',
			'email.required' => 'فیلد ایمیل را وارد نمایید',
			'phone.required' => 'فیلد تلفن همراه را وارد نمایید',			
		];		
		if(!empty($request->password)){
			$validateData = $request->validate([
				'name'=>'required',
				'email'=>'required',
				'phone'=>'required',
				'password'=>'min:8',	
				'password_confirmation'=>'min:8'				
			],$messages);
			
			$password = Hash::make($request->password);
		    $user->password = $password;		
		}else{
		$validateData = $request->validate([
			'name'=>'required',
			'email'=>'required',
			'phone'=>'required',				
		],$messages);			
    }

	$user->name = $request->name;
	$user->email = $request->email;	
	$user->phone = $request->phone;	
	
			try{
			$user->save();
		}catch(Exception $exception){
			switch  ($exception->getCode()){ }
			return redirect()->back()->with('warning',$exception->getCode());
		}
		$msg = "ویرایش با موفقیت انجام شد";
		return redirect(route('login'))->with('success',$msg);
	}	
	
    public function destroy($id)
    {
        //
    }
}
