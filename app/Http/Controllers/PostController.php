<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){
		$pagetitle = "صفحه ی خوش آمد گویی";
		$posts = DB::table('posts')->orderBy('id','DESC')->pageInate(1);
		$maxId = DB::table('posts')->max('id');
		$postCount = DB::table('posts')->count ();
		return view('posts',compact('pagetitle','posts','maxId','postCount'));
	}
}
