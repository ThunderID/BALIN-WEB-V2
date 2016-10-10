<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<link rel="shortcut icon" href="{{ url('images/favicon.ico') }} "/>
		{!! Html::style(elixir('css/balin.css')) !!}
		@yield('font')

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
		<!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet"> -->

		@if(isset($page_subtitle))
			<title>{{$page_subtitle}} - {{$page_title}}</title>
		@else
			<title>BALIN.ID</title>
		@endif

		@if(isset($metas))
			@foreach ($metas as $k => $v)
				<meta name="{{$k}}" content="{{strip_tags($v)}}">
			@endforeach
		@endif
		
		@yield('css')
	</head>
	<body class="bg-white">
		<!-- SECTION NAVBAR -->
		@include('web_v2.components.nav')
		<!-- END SECTION NAVBAR -->

		<!--SECTION WRAPPER -->
		<div class="wrapper wrapper_content @yield('wrapper_class')" style=" margin-bottom: 0px;
			{{ (Route::currentRouteName()!='balin.home.index') ? 'margin-top:60px;' : 'margin-top:0px;' }}  ">
				<!-- SECTION BREADCRUMB -->
				<!-- END SECTION BREADCRUMB -->

			<!-- SECTION CONTENT -->
			@yield('content')
			<!-- END SECTION CONTENT -->
		</div>
		
		<!-- END SECTION WRAPPER -->

		<!-- SECTION MODAL USER INFORMATION -->
		<!-- END SECTION MODAL USER INFORMATION -->

<?php
		// @include('web_v2.components.alert')
?>

		<!-- SECTION BOTTOM BAR FOR MOBILE HOME, PRODUCT & PROFILE -->
		@include('web_v2.components.navbar_shortcut')
		<!-- END SECTION BOTTOM BAR FOR MOBILE HOME, PRODUCT & PROFILE -->
		<div class="divider_footer"></div>
		<!-- SECTION FOOTER  -->
		@if (isset($controller_name))
			@if (strtolower($controller_name) == 'login' || strtolower($controller_name) == 'checkout' || strtolower($controller_name) == 'signup' || strtolower($controller_name) == 'reset')
			@else
	  			@include('web_v2.components.footer')
	 		@endif
 		@endif
		<!-- END SECTION FOOTER -->
			
		<!-- CSS -->
		{!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css') !!}
		<!-- JS -->
		{!! Html::script(elixir('js/balin.js')) !!}

		@yield('js_plugin')
		
		<script type="text/javascript">
			@yield('js')
			
			@if (Session::has('msg') || $errors->any())
				$('#alert_window').modal('show');

				setTimeout( function() {
					$('#alert_window').modal('hide');
				}, 2500);
			@endif

			$('.ico_cart').click(function() {
				$('.cart_dropdown').toggle({'display': 'block'});
			});
		</script>
	</body>
</html>