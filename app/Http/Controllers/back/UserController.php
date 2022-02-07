<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller ;
use Exception;

class UserController extends Controller
{
    public function index()
    {
		$users = User::orderBy('id','DESC')->paginate(10);
        return view ('back.users.users',compact('users'));
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
		return view('back.users.profile',compact('pagetitle','user'));
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
		return redirect(route('admin.users'))->with('success',$msg);
	}	
	
    public function destroy(User $user)
    {
        $user->delete();
		$msg = "حذف با موفقیت انجام شد";
		return redirect(route('admin.users'))->with('success',$msg);
    }
	
	public function updatestatus(User $user)
    {
        if($user->status==1){
			$user->status = 0 ;
		} else {
			$user->status = 1;
		}
		$user -> save();
		$msg = "بروزرسانی با موفقیت انجام شد";
		return redirect(route('admin.users'))->with('success',$msg);		
    }
}
