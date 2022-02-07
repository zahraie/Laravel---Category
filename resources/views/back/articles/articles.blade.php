@extends('back.index')

@section('title')
پنل مدیریت - مدیریت مطالب
@endsection
@section('content')
<div class="main-panel">
<div class="content-wrapper">
  <div class="row page-title-header">
	<div class="col-12">
	  <div class="page-header">
		<h4 class="page-title">مدیریت  مطالب</h4>
	  </div>
	</div>
  </div>
	<div class="card-body">
	@include('back.messages')
	<a href="{{route('admin.articles.create')}}" class="btn btn-success">مطلب جدید</a><br><br>	
		<table class="table table-striped">
		  <thead>
			<tr>
			  <th> نام </th>
			  <th> نام مستعار - slug </th>
			  <th> نویسنده </th>
			  <th> دسته بندی </th>
			  <th> بازدید </th>
			  <th> وضعیت </th>
			  <th> مدیریت </th>
			</tr>
		  </thead>
		  <tbody>
			@foreach($articles as $article)
			
			@switch($article -> status)
			@case(1)
			@php 
			$url = route('admin.articles.status',$article->id);
			$status = '<a href="'.$url.'" class="badge badge-success">فعال</a>' 
			@endphp
			@break
			@case(0)
			@php 
			$url = route('admin.articles.status',$article->id);
			$status = '<a href="'.$url.'" class="badge badge-warning">غیرفعال</a>' 
			@endphp
			@break
			@default
			@endswitch			
				<tr>
				  <td> {{$article->name}} </td>
				  <td> {{$article->slug}} </td>
				  <td> {{$article->user->name}} </td>
				  <td> 
					@foreach($article->categories()->pluck('name') as $category)
					<span class="badge badge-warning">{{$category}}</span>
					@endforeach
				  </td>
				  <td> {{$article->hit}} </td>
				  <td> {!!$status!!} </td>
				  <td> 
					<a href="{{route('admin.articles.edit',$article->id)}}" class="badge badge-success">ویرایش</a>
					<a href="{{route('admin.articles.destroy',$article->id)}}" onclick="return confirm('آیا آیتم موردنظر حذف شود ؟')" class="badge badge-danger">حذف</a>
				  </td>			  
				</tr>				
			</tbody>
			@endforeach
		</table>
	</div>
</div>
@include('back.footer')
</div>

@endsection