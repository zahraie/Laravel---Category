<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>

@include('layouts.header')

<section class="hero-banner text-center">
	@yield('content1')
</section>

<section class="section-margin">
	@yield('content2')
</section>

<section>
	@yield('content3')
</section>

@include('layouts.footer')

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.ajaxchimp.min.js"></script>
<script src="assets/js/scripts.js"></script>
</body><!-- This template has been downloaded from Webrubik.com -->
</html>
