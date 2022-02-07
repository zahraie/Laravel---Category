@extends('back.index')

@section('title')
ویرایش مطلب
@endsection
@section('content')
<div class="main-panel">
<div class="content-wrapper">
  <div class="row page-title-header">
	<div class="col-12">
	  <div class="page-header">
		<h4 class="page-title">مطلب جدید</h4>
	  </div>
	</div>
  </div>
	<div class="card-body">
	@include('back.messages')
		<form method="POST" action="{{ route('admin.articles.update',$article->id)}}">
		@csrf

		<div class="form-group row">
		<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('نام مطلب') }}</label>
			<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$article->name}}" required autocomplete="name" autofocus>
			@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		<div class="form-group row">
		<label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('نام مستعار - slug') }}</label>
			<input id="slug" type="slug" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{$article->slug}}" required autocomplete="slug">
			@error('slug')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		
		<div class="form-group row">
		<label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('محتوای مطلب') }}</label>
			<textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description" >{{$article->description}}</textarea>

			@error('description')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>	
		
		<div class="form-group row">
		<label for="title" class="col-md-4 col-form-label text-md-right">{{ __('وضعیت') }}</label>
			<select class="form-control" name="status">
				<option value="0">منتشر نشده</option>
				<option value="1">منتشر شده</option>
			</select>	
		</div>		

		<div class="form-group row col-md-6">
		<label for="title" class="col-md-4 col-form-label text-md-right">{{ __('انتخاب دسته بندی') }}</label>
		<div id="output"></div></br>
			<select class="chosen-select" name="categories[]" style="width:500px" multiple>
				@foreach($categories as $cat_id => $cat_name)
					<option value="{{$cat_id}}">{{$cat_name}}</option>
				@endforeach
			</select>
		</div>			
		<div class="form-group row">
		<label for="slug" class="col-md-4 col-form-label text-md-right">نویسنده : {{Auth::user()->name}}</label>
			<input type="hidden" class="form-control @error('slug') is-invalid @enderror" name="user_id" value="{{Auth::user()->id}}">
		</div>		

		<div class="form-group row mb-0">
			<div class="col-md-6 offset-md-4">
				<button type="submit" class="btn btn-primary">
					{{__('ذخیره') }}
				</button>
				<a href="{{route('admin.articles')}}" class="btn btn-danger"> انصراف</a>
			</div>
		</div>
	</form>
	</div>
</div>
@include('back.footer')
</div>
@endsection

@section('js')
	<script>
		$(".chosen-select").chosen()
	</script>
@endsection
