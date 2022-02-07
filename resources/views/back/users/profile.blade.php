@extends('back.index')

@section('title')
ویرایش کاربر
@endsection
@section('content')
<div class="main-panel">
<div class="content-wrapper">
  <div class="row page-title-header">
	<div class="col-12">
	  <div class="page-header">
		<h4 class="page-title">ویرایش کاربر</h4>
	  </div>
	</div>
  </div>
	<div class="card-body">
		<form method="POST" action="{{ route('admin.profileupdate',$user->id) }}">
		@csrf

		<div class="form-group row">
			<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('نام') }}</label>

			<div class="col-md-6">
				<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" required autocomplete="name" autofocus>

				@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('ایمیل') }}</label>

			<div class="col-md-6">
				<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email}}" required autocomplete="email">

				@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('تلفن همراه')}}</label>

			<div class="col-md-6">
				<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone}}" required autocomplete="phone">

				@error('phone')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>
		<div class="form-group row">
			<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('گذرواژه') }}</label>

			<div class="col-md-6">
				<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

				@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تکرار گذرواژه') }}</label>

			<div class="col-md-6">
				<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
			</div>
		</div>

		<div class="form-group row mb-0">
			<div class="col-md-6 offset-md-4">
				<button type="submit" class="btn btn-primary">
					{{__('ویرایش پروفایل') }}
				</button>
				<a href="{{route('admin.users')}}" class="btn btn-danger"> انصراف</a>
			</div>
		</div>
	</form>
	</div>
</div>
@include('back.footer')
</div>

@endsection