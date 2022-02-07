<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{$pagetitle}}</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<br>
<body dir="rtl" style="text-align:right">
	@include('layouts.topmenu');
	<div class="container">
	@include('layouts.messages');
		<div class="d-flex justify-content-center">
			<form action="{{route('store')}}" method="POST">
				@csrf
				<div class="form-group">
					<label for="title">عنوان دسته بندی</label><br>
					<input type="text" name="title" class="form-controll @error('title') is-invalid @enderror" placeholder="عنوان دسته بندی">
					@error('title')
					<div class="alert alert-danger">{{$message}}</div>
					@enderror
				</div>
				<div class="form-group">
					<label for="title">توضیحات دسته بندی</label><br>
					<textarea type="text" name="description" class="form-controll @error('title') is-invalid @enderror" ></textarea>
					@error('description')
					<div class="alert alert-danger">{{$message}}</div>
					@enderror					
				</div>
				<div class="form-group">
					<label for="active">وضعیت</label><br>
					<select name="active">
						<option value="1">منتشر شده</option>
						<option value="0">منتشر نشده</option>
					</select>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-info" value="ثبت">
				</div>				
			</form>
			
		</div>
	</div>
	
</body>
</html>