
<div id="navbar-shortcut" class="navbar navbar-default navbar-fixed-bottom navbar_shortcut hidden-lg hidden-md hidden-sm col-xs-12 border-top-1 border-grey" role="navigation" data-portrait-height=0 data-landscape-height=0 data-anchor=0>
	<div class="nav navbar-nav text-center mt-0 mb-0">
		<div onclick="location.href='{{ URL::route('balin.home.index') }}';" class="{{ (Session::has('whoami')) ? "hidden-xs" : "col-xs-3" }} text-center border-right-1 border-grey pt-xs pb-xs cursor-pointer">
			{!! HTML::image('images/home.png', 'image' ,['class' => 'pt-5 pb-5 navbar-bottom']) !!}
			<p class="text-sm mb-0 {{ Route::is('balin.home.index') ? 'text-orange' : '' }}">Home</p>
		</div>
		@if (Session::has('whoami'))
			<div onclick="location.href='{{ URL::route('my.balin.profile') }}';" class="col-xs-3 text-center border-right-1 border-grey pt-xs pb-xs cursor-pointer">
				{!! HTML::image('images/profile.png', 'image', ['class' => 'pt-5 pb-5 navbar-bottom']) !!}
				<p class="text-sm mb-0 {{ Route::is('my.balin.profile') ? 'text-orange' : '' }}">Profile</p>
			</div>
		@endif
		<div onclick="location.href='{{ route('balin.product.index') }}?categories[]=wanita';" class="col-xs-3 text-center border-right-1 border-grey pt-xs pb-xs cursor-pointer">
			{!! HTML::image('images/woman_black.png', 'image' ,['class' => 'pt-5 pb-5 navbar-bottom']) !!}
			<p class="text-sm mb-0 {{ ((isset(Input::get('categories')[0]) && (Input::get('categories')[0] == 'wanita')) || (isset($data['type']) && ($data['type'] == 'wanita'))) ? 'text-orange' : '' }}">Wanita</p>
		</div>
		<div onclick="location.href='{{ route('balin.product.index') }}?categories[]=pria';" class="col-xs-3 text-center border-right-1 border-grey pt-xs pb-xs cursor-pointer">
			{!! HTML::image('images/man_black.png', 'image' ,['class' => 'pt-5 pb-5 navbar-bottom img-responsive']) !!}
			<p class="text-sm mb-0 {{ ((isset(Input::get('categories')[0]) && (Input::get('categories')[0] == 'pria')) || (isset($data['type']) && ($data['type'] == 'pria'))) ? 'text-orange' : '' }}">Pria</p>
		</div>		
		@if (Session::has('whoami'))
			<div onclick="location.href='{{ URL::route('balin.get.logout') }}';" class="col-xs-3 text-center pt-xs pb-xs cursor-pointer">
				{!! HTML::image('images/sign-out.png', 'image' ,['class' => 'pt-5 pb-5 navbar-bottom']) !!}
		@else
			<div onclick="location.href='{{ URL::route('balin.get.login') }}';" class="col-xs-3 text-center pt-xs pb-xs cursor-pointer">
				{!! HTML::image('images/sign-in.png', 'image' ,['class' => 'pt-5 pb-5 navbar-bottom']) !!}
		@endif
			<p class="text-sm mb-0 {{ Route::is('balin.get.login') ? 'text-orange' : '' }}">{{ (Session::has('whoami')) ? "Log Out":"Sign In" }}</p>
		</div>		
	</div>
</div>