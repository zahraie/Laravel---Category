@extends('back.index')

@section('title')
دسته بندی جدید
@endsection
@section('content')
<div class="main-panel">
<div class="content-wrapper">
  <div class="row page-title-header">
	<div class="col-12">
	  <div class="page-header">
		<h4 class="page-title">دسته بندی جدید</h4>
	  </div>
	</div>
  </div>
	<div class="card-body">
	@include('back.messages')
		<form method="POST" action="{{ route('admin.categories.store') }}">
		@csrf

		<div class="form-group row">
		<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('نام دسته بندی') }}</label>
			<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required autocomplete="name" autofocus>
			@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		<div class="form-group row">
		<label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('نام مستعار - slug') }}</label>
			<input id="slug" type="slug" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{old('slug')}}" required autocomplete="slug">
			@error('slug')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		<div class="form-group row mb-0">
			<div class="col-md-6 offset-md-4">
				<button type="submit" class="btn btn-primary">
					{{__('ذخیره') }}
				</button>
				<a href="{{route('admin.categories')}}" class="btn btn-danger"> انصراف</a>
			</div>
		</div>
	</form>
	</div>
</div>
@include('back.footer')
</div>
@endsection

