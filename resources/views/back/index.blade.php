<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/back/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/back/vendors/iconfonts/ionicons/css/ionicons.css">
  <link rel="stylesheet" href="/back/vendors/iconfonts/typicons/src/font/typicons.css">
  <link rel="stylesheet" href="/back/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="/back/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="/back/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="/back/css/shared/style.css">
  <link rel="stylesheet" href="/back/css/demo_1/style.css">
  <link rel="stylesheet" href="/back/plugin/chosen/chosen.css">  
  <link rel="shortcut icon" href="/back/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
	@include('back.navbar')
    <div class="container-fluid page-body-wrapper">
		@include('back.sidebar')

		@yield('content')
    </div>
  </div>
  <script src="/back/vendors/js/vendor.bundle.base.js"></script>
  <script src="/back/vendors/js/vendor.bundle.addons.js"></script>
  <script src="/back/js/shared/off-canvas.js"></script>
  <script src="/back/js/shared/misc.js"></script>
  <script src="/back/js/demo_1/dashboard.js"></script>
  <script src="/back/plugin/chosen/chosen.jquery.js"></script>  
  
  @yield('js')
</body>

</html>