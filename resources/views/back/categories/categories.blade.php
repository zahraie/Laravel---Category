@extends('back.index')

@section('title')
پنل مدیریت - مدیریت دسته بندی ها
@endsection
@section('content')
<div class="main-panel">
<div class="content-wrapper">
  <div class="row page-title-header">
	<div class="col-12">
	  <div class="page-header">
		<h4 class="page-title">مدیریت  دسته بندی ها</h4>
	  </div>
	</div>
  </div>
	<div class="card-body">
	@include('back.messages')
	<a href="{{route('admin.categories.create')}}" class="btn btn-success">دسته بندی جدید</a><br><br>	
		<table class="table table-striped">
		  <thead>
			<tr>
			  <th> نام </th>
			  <th> نام مستعار - slug </th>
			  <th> مدیریت </th>			  
			</tr>
		  </thead>
		  @php($categories=\App\Category::All())
			@foreach($categories as $category)
				<tbody>
					<tr>
					  <td> {{$category->name}} </td>
					  <td> {{$category->slug}} </td>
					  <td> 
						<a href="{{route('admin.categories.edit',$category->id)}}" class="badge badge-success">ویرایش</a>
						<a href="{{route('admin.categories.destroy',$category->id)}}" onclick="return confirm('آیا آیتم موردنظر حذف شود ؟')" class="badge badge-danger">حذف</a>
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