{!! Form::open(['url' => route('balin.post.login'), 'class' => 'hollow-login']) !!}


    <div class="form-group input-group">
		<span class="input-group-addon" id="basic-addon1">
			<div class="text-center" style="width:30px;">
				<i class="fa fa-envelope fa-lg aria-hidden="true"></i>
			</div>
		</span>
        {!! Form::email('email', null, ['class' => 'form-control hollow email', 'placeholder' => 'Masukkan Email', 'required' => 'required', 'tabindex' => 1]) !!}
    </div>

    <div class="form-group input-group">
		<span class="input-group-addon" id="basic-addon2">
			<div class="text-center" style="width:30px;">
			<i class="fa fa-lock fa-lg aria-hidden="true"></i>
			</div>
		</span>
        {!! Form::password('password', ['class' => 'form-control hollow password', 'placeholder' => 'Masukkan Password', 'required' => 'required', 'tabindex' => 2]) !!}
    </div>

	<div class="form-group">
		<a href="javascript:void(0);" class="btn-forgot t-xs hover-black ml-5 text-black" tabindex="3">Lupa Password?</a>
	    <button type="submit" class="pull-right btn btn-orange pl-xl pr-xl" tabindex="4">Sign In</button>
	</div>
<!-- 	<div class="clearfix">&nbsp;</div>
	<h3 style="margin-top:3px;">Join Us</h3>
	<p class="text-light text-grey-dark">
		Connect dengan akun Facebook Anda atau daftarkan email Anda untuk menikmati penawaran spesial dari Kami.
	</p>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<a href="javascript:void(0);" class="btn-signup btn btn-black-hover-white-border-black btn-block" tabindex="5">
				<div class="row">
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
						<i class="fa fa-envelope-o"></i>
					</div>
					<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 p-l-none p-r-none text-left">
						&nbsp; Daftar Baru
					</div>
				</div>
			</a>
		</div>	
		<div class="hidden-lg hidden-md hidden-sm col-xs-12">
			<div class="clearfix">&nbsp;</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<a href="{{route('balin.get.sso')}}" class="btn btn-black-hover-white-border-black btn-block" title="facebook" tabindex="6">
				<div class="row">
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
						<i class="fa fa-facebook"></i>
					</div>
					<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 p-l-none p-r-none text-left">
						&nbsp; Facebook Connect
					</div>
				</div>
			</a>
		</div>
	</div>	 -->
	<div class="clearfix">&nbsp;</div>
	<div class="clearfix">&nbsp;</div>
{!! Form::close() !!}