<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB; روش کویری بیلدر
use App\Order;

class OrderController extends Controller
{
    public function index(){
		$pagetitle = "لیست فاکتور های من";
//		$orders = DB::table('orders')->orderBy('id','DESC')->get(); روش کویری بیلدر
		$orders = Order::orderBy('id','DESC')->get();
		return view('orders',compact('pagetitle','orders'));
	}
}
