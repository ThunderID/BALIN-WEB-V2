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
	<body class="@yield('body_class')" style="background-color: #f5f5f5;">
		<!-- SECTION NAVBAR -->
		@include('web_v2.components.nav')
		<!-- END SECTION NAVBAR -->

		<!--SECTION WRAPPER -->
		<div class="wrapper wrapper_content @yield('wrapper_class')" style=" margin-bottom: 0px;
			{{ (Route::currentRouteName()!='balin.home.index') ? 'margin-top:51px;' : 'margin-top:0px;' }}  ">
			<section class="{{ (Route::currentRouteName()!='balin.home.index') ? 'container' : '' }}">
				@if (Route::currentRouteName()!='balin.home.index')
					<!-- SECTION BREADCRUMB -->
					@if(isset($breadcrumb))
						@include('web_v2.components.breadcrumb')
					@endif
					<!-- END SECTION BREADCRUMB -->
				@endif

				<!-- SECTION CONTENT -->
				@yield('content')
				<!-- END SECTION CONTENT -->
			</section>
		</div>
		<!-- END SECTION WRAPPER -->

		<!-- SECTION MODAL USER INFORMATION -->
		<!-- <div class="modal modal-referral-code modal-fullscreen fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header bg-black text-white">
						<div class="row ml-xl mr-xl">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pr-md pl-md">
								<button type="button" class="close text-white close_modal" data-dismiss="modal" aria-label="Close">&times;</button>
								<h5 class="modal-title" id="exampleModalLabel">Referal Code & Poin</h5>
							</div>
						</div>
					</div>
					<div class="modal-body m-md pt-5 mt-sm">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
				</div>
			</div>
		</div> -->
		<!-- END SECTION MODAL USER INFORMATION -->

		@include('web_v2.components.alert')

		<!-- SECTION BOTTOM BAR FOR MOBILE HOME, PRODUCT & PROFILE -->
		@include('web_v2.components.navbar_shortcut')
		<!-- END SECTION BOTTOM BAR FOR MOBILE HOME, PRODUCT & PROFILE -->
		<div class="divider_footer"></div>
		<!-- SECTION FOOTER  -->
		@include('web_v2.components.footer')
		<!-- END SECTION FOOTER -->
			
		<!-- CSS -->
		{!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') !!}
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
			// 	ev_click = 0;

			// 	<?php (Session::has('click_iteration') ? $ev_click = Session::put('click_iteration') : $ev_click = 0); ?>
			// 	console.log("{{ Session::get('click_iteration') }}");

			// @if (Session::get('click_iteration')<2 && (!Session::has('event_click')))
			// 	$(window).scroll(function() {
			// 		if (ev_click < 1) {
			// 			if ($(this).scrollTop() > 300) {
			// 				$('.modal-referral-code').modal('show');
			// 			}
			// 			console.log(ev_click);
			// 		}
			// 	});
			// @else
			// 	<?php Session::put('event_click', true); ?>
			// @endif

			// $('.close_modal').click(function() {
			// 	ev_click++;
			// 	<?php 
			// 		$ev_click++; 
			// 		Session::put('click_iteration', $ev_click);
			// 	?>
			// });
		</script>
	</body>
</html>