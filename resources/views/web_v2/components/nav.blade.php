<style>

.center-nav{
    position: absolute;
    left: 50vw;
    transform: translateX(-50%);
    margin-left: -4px;
    margin-top: -53px;
}
.center-nav .right{
	width: 120px;
    text-align: right;
    /*border-right: white 0.1px solid;*/
}
.center-nav .left{
	width: 120px;
    text-align: left;
    /*border-left: white 0.1px solid;*/
}
.center-nav .center{
    width: 1px;
    background-color: white;
    height: 41px;
    margin-top: 8px;
}
</style>

<nav class="navbar navbar-inverse navbar-fixed-top pt-5 pb-5 m-b-none" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed link-grey hover-white text-white" aria-expanded="false" 
					data-toggle="collapse" aria-controls="#bs-example-navbar-collapse-1" data-target="#bs-example-navbar-collapse-1">
				<i class="fa fa-bars fa-lg"></i>
			</button>
			<a href="{{ (Session::has('carts')) ? route('balin.cart.index') : '#' }}" class=" border-0 ico_cart navbar-cart" style="color: #fff;
			    ">
				<i class="fa fa-shopping-bag fa-lg vertical-baseline"></i>
				<span class="cart-count">
					{{ count(Session::get('carts')) }}
				</span>
			</a>
			<a class="navbar-brand" href="{{ route('balin.home.index') }}">
				{!! HTML::image('images/logo-b.png', null, ['class' => 'img-responsive']) !!}
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-cart  hidden-xs hidden-sm text-light">
					<a href="javascript:void(0);" class="dropdown-toggle text-white pt-xs mt-5 ico_cart">
						Shopping Bag
					</a>
					<span class="cart-count"><strong>{{ count(Session::get('carts')) }}</strong></span>
					@include('web_v2.components.cart.cart_dropdown', ['carts' => Session::get('carts')]) 
				</li>
<!-- 				<li class="info-point pull-right mt-sm ml-md mr-md hidden-xs hidden-sm">
					<span class="title pl-md pr-md text-regular text-uppercase">Jumlah Point</span>
					<span class="value pl-md pr-md mlm-5 text-regular">
						@money_indo(Session::has('whoami') ? Session::get('whoami')['total_point'] : '0')
					</span>
				</li> -->
			</ul>
			<ul class="nav navbar-nav navbar-right" >
				<li>
					<a href="#" class=""><span style="color:orange">Balin</span>Point</a>
				</li>
				<li>
					<a href="#" class="">Akun</a>
				</li>				
				<?php
				// <li>
				// 	<a href="{{ route('balin.product.index') }}" class="{{$controller_name == 'product'? 'active':''}}">Produk</a>
				// </li>
				// {{-- <li>
				// 	<a href="" data-scroll>Why Join</a>
				// </li> --}}
				// @if (Session::has('whoami'))
				// 	<li>
				// 		<a href="{{ route('my.balin.redeem.index') }}">Referal &amp; Point
				// 			<span class="badge badge-hollow text-white"><i class="fa fa-exclamation"></i></span>
				// 		</a>
				// 	</li>
				// @endif
				// @if (!Session::has('whoami'))
				// 	<li>
				// 		<a href="{{ route('balin.get.login') }}" class="{{$controller_name == 'Login'? 'active':''}}">Sign In</a>
				// 	</li>
				// @endif
				// <!-- <li > -->
				// 	<!-- <a href="" data-scroll>About Us</a> -->
				// <!-- </li> -->
				// <!-- <li>
				// 	<a href="" data-scroll>Contact Us</a>
				// </li> -->
				// @if (Session::has('whoami'))
				// 	<li class="dropdown hidden-xs hidden-sm">
				// 		<a href="javascript:void(0);" class="dropdown-toggle">Akun Anda <span class="caret"></span></a>
				// 		<ul class="dropdown-menu dropdown-menu-right dropdown-user user_dropdown" style="margin-top: 1px">
				// 			<li class="p-xs">
				// 				<a href="{{ route('my.balin.profile') }}" class="dropdown-toggle">Profile</a>
				// 			</li> 
				// 			<li class="p-xs">
				// 				<a href="{{ route('balin.get.logout') }}">Log out</a>
				// 			</li>
				// 		</ul>
				// 	</li> 
				// 	<li class="dropdown hidden-md hidden-lg">
				// 		<a href="{{ route('my.balin.profile') }}" class="dropdown-toggle">Profile</a>
				// 	</li> 
				// 	<li class="hidden-md hidden-lg">
				// 		<a href="{{ route('balin.get.logout') }}">Log out</a>
				// 	</li>
				// @endif
				?>
			</ul>
		</div>
		<!-- /.navbar-collapse -->


		<div class="text-center center-nav desktop-only" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="text-light right">
					<a href="#" style="color:white;">
						Wanita
						<span>
							{!! HTML::image('images/woman_white.png', null, ['class' => 'img-responsive']) !!}
						</span>
					</a>
				</li>
				<li>
					<div class="center">
					</div>
				</li>>
				<li class="text-light left">
					<a href="#" style="color:white;">
						<span>
							{!! HTML::image('images/man_white.png', null, ['class' => 'img-responsive']) !!}
						</span>
						Pria
					</a>
				</li>					
			</ul>
		</div>		
	</div>
</nav>