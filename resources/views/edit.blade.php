<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{$pagetitle}}</title>
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>
<br>
<body dir="rtl" style="text-align:right">
	@include('layouts.topmenu');
	<div class="container">
	@include('layouts.messages');
		<div class="d-flex justify-content-center">
			<form action="{{route('update',$category)}}" method="POST">
				@method('put')
				@csrf
				<div class="form-group">
					<label for="title">عنوان دسته بندی</label><br>
					<input type="text" name="title" class="form-controll @error('title') is-invalid @enderror" placeholder="عنوان دسته بندی" value="{{$category->title}}">
					@error('title')
					<div class="alert alert-danger">{{$message}}</div>
					@enderror
				</div>
				<div class="form-group">
					<label for="title">توضیحات دسته بندی</label><br>
					<textarea type="text" name="description" class="form-controll @error('title') is-invalid @enderror">{{$category->description}}</textarea>
					@error('description')
					<div class="alert alert-danger">{{$message}}</div>
					@enderror					
				</div>
				<div class="form-group">
					<label for="active">وضعیت</label><br>
					<select name="active">
						<option value="1"<?php if($category->active==1)echo 'selected'?>>منتشر شده</option>
						<option value="0"<?php if($category->active==0)echo 'selected'?>>منتشر نشده</option>
					</select>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-info" value="ویرایش">
				</div>				
			</form>
			
		</div>
	</div>
	
</body>
</html>