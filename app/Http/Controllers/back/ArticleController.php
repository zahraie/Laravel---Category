<?php

namespace App\Http\Controllers\back;
use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Http\Controllers\Controller ;
use Illuminate\Support\Facades\Hash;
use Exception;

class ArticleController extends Controller
{
    public function index()
    {
		$articles = Article::orderBy('id','DESC')->paginate(5); 	
		return view('back.articles.articles' , compact('articles'));
    }

    public function create()
    {
		$categories = Category::all()->pluck('name','id'); 	
		return view('back.articles.create' , compact('categories'));
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
		
		$article = new Article();
		try{
			$article = $article->create($request->all());
			$article->categories()->attach($request->categories());
		}catch(Exception $exception){
			switch  ($exception->getCode()){
			case 23000:
				$msg = "نام مستعار وارد شده تکراری است";
				break;
			}
			return redirect(route('admin.articles.create'))->with('warning',$msg);
		}
		$msg = "ذخیره ی  مطلب با موفقیت انجام شد";
		return redirect(route('admin.articles'))->with('success',$msg);
    }

    public function show($id)
    {
        //
    }

    public function edit(Article $article)
    {
		$categories = Category::pluck('name','id'); 
		return view('back.articles.edit',compact('article', 'categories'));
    }

    public function update(Request $request,Article $article)
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
		
		try{
			$article = $article->update($request->all());
			$article->categories()->sync($request->categories());
		}catch(Exception $exception){
			switch  ($exception->getCode()){
			case 23000:
				$msg = "نام مستعار وارد شده تکراری است";
				break;
			}
			return redirect(route('admin.articles.create'))->with('warning',$msg);
		}
		$msg = "ذخیره ی  مطلب با موفقیت انجام شد";
		return redirect(route('admin.articles'))->with('success',$msg);
    }	
	
    public function destroy($id)
    {
        //
    }
	
		public function updatestatus(Article $article)
    {
        if($article->status==1){
			$article->status = 0 ;
		} else {
			$article->status = 1;
		}
		$article -> save();
		$msg = "بروزرسانی با موفقیت انجام شد";
		return redirect(route('admin.articles'))->with('success',$msg);		
    }
}
