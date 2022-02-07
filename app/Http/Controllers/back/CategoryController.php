<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller ;
use Exception;


class CategoryController extends Controller
{
    public function index(){
		$pagetitle = "مدیریت دسته بندی ها";
		$categories = Category::orderBy('id','DESC')->paginate(5); 	
		return view('back.categories.categories' , compact('pagetitle' , 'categories'));
	}

    public function create()
    {
        return view('back.categories.create');
    }

    public function store(Request $request)
    {
		$messages = [
			'name.required' => 'فیلدعنوان را وارد نمایید',
			'slug.unique' => 'فیلدعنوان الزامی است،عنوان را عوض کنید',
			'slug.required' => 'فیلد نام مستعار اجباری است',
		];
		$validateData = $request->validate([
			'name'=>'required',
			'slug'=>'required|unique:categories',
		],$messages);
		
		$category = new Category();
		try{
			$category->create($request->all());
		}catch(Exception $exception){
			switch  ($exception->getCode()){
			case 23000:
				$msg = "نام مستعار وارد شده تکراری است";
				break;
			}
			return redirect(route('admin.categories.create'))->with('warning',$msg);
		}
		$msg = "ذخیره ی  دسته بندی جدید با موفقیت انجام شد";
		return redirect(route('admin.categories'))->with('success',$msg);
    }


    public function edit(Category $category)
    {
		return view('back.categories.edit',compact('category'));
    }


    public function update(Request $request, Category $category)
    {
		$messages = [
			'name.required' => 'فیلدعنوان را وارد نمایید',
			'slug.unique' => 'فیلدعنوان الزامی است،عنوان را عوض کنید',
			'slug.required' => 'فیلد نام مستعار اجباری است',
		];
		$validateData = $request->validate([
			'name'=>'required',
			'slug'=>'required|unique:categories',
		],$messages);
		
		$category->name = $request->name;
		$category->slug = $request->slug;
		try{
			$category->update($request->all());
			
		}catch(Exception $exception){
			switch  ($exception->getCode()){
			case 23000:
				$msg = "نام مستعار وارد شده تکراری است";
				break;
			}
			return redirect(route('admin.categories.edit'))->with('warning',$msg);
		}
		$msg = "ذخیره ی  دسته بندی جدید با موفقیت انجام شد";
		return redirect(route('admin.categories'))->with('success',$msg);
    }

    public function destroy(Category $category)
    {
		try{
			$category->delete();			
		}catch(Exception $exception){
			return redirect(route('admin.categories'))->with('warning',$msg);
		}		
        $category->delete();
		$msg="آیتم مورد نظر حذف گردید";
		return redirect(route('admin.categories'))->with('success',$msg);
    }
}
