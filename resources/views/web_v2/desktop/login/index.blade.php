@extends('web_v2.page_templates.layout')

@section('content')
	<div class="container-fluid background">
		<div class="row">
			{{-- signup preface --}}
			<div class="hidden-xs hidden-sm col-md-7 col-lg-7 text-center preface">
				<div class="row">
					{!! Html::image('images/white_logo_balin.png', null, ['class' => 'logo']) !!}
				</div>
				<div class="row mb-md">
					<p class="tagline">Fashionable and Modern Batik</p>
				</div>
				<div class="row mb-xl">
					<p class="large">Sign Up Now. </br> Experiaence Our Best In Everything.</p>
				</div>
				<div class="row mb-sm">
					<p>We Crafting Best Batik For You</p>
				</div>
				<div class="row">
					<p>
						<i class="fa fa-check text-orange" aria-hidden="true"></i>
						100% Cotton Or Premium Cotton
					</p>
					<p>
						<i class="fa fa-check text-orange" aria-hidden="true"></i>
						Modern Pattern
					</p>
					<p>
						<i class="fa fa-check text-orange" aria-hidden="true"></i>
						Fashionable Model
					</p>
				</div>
				<div class="row">
					<div class="col-md-12 auth">
						<p class="signup">
							Sudah Terdaftar?
							<a href="javascript:void(0);" class="btn-signin">
								Sign In
							</a> 
						</p>
						<p class="signin" style="display:none;">
							Belum Punya Akun?
							<a href="javascript:void(0);" class="btn-signup">
								Sign Up
							</a> 
						</p>
						<p class="forgot" style="display:none;">
							Belum Punya Akun?
							<a href="javascript:void(0);" class="btn-signup">
								Sign Up
							</a> 
						</p>												
					</div>
				</div>
			</div>

			{{-- signup , signin , register --}}
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="row panel-akun p-xs mt-md">
					<div class="col-md-12 text-center">
						<div class="signup" style="@if (Session::has('type')) {{ (Session::get('type')=='signup') ? 'display:block;' : 'display:none;' }} @else {{ (isset($type) && ($type=='signup') || (Input::get('type')=='signup')) ? 'display:block;' : 'display:none;' }} @endif">
							<h2 class="text-center mb-lg">Sign Up</h2>
							@include('web_v2.components.alert-box')
							@include('web_v2.components.signup.form')
						</div>
						<div class="signin" style="@if (Session::has('type') && (Session::get('type')=='login') || (isset($type) && ($type=='login'))) display:block; @else display:none; @endif">
							<h2 class="text-center mb-lg">Sign In</h2>
							@include('web_v2.components.alert-box')
							@include('web_v2.components.login.form')
						</div>						
						<div class="forgot" style="display:none">
							<h2 class="text-center mb-lg">Reset Password</h2>
							@include('web_v2.components.alert-box')
							@include('web_v2.components.forgot.form')
						</div>
					</div>	
					<div class="clearfix">&nbsp;</div>
				</div>                        
			</div>
		</div>

		<!-- Term and Condition -->
		<div id="tnc" class="modal modal-left modal-fullscreen fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<div class="row ml-xl mr-xl">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pr-md pl-md">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h5 class="modal-title" id="exampleModalLabel">Syarat & Ketentuan</h5>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<div class="row ml-xl mr-xl">
							<div class="col-xs-12 col-sm-12 col-md-12 text-black text-light pr-md pl-md">
								{!! $balin['term_and_condition']['value'] !!}
							</div>
						</div>
						<div class="row ml-xl mr-xl">
							<div class="col-xs-12 col-sm-12 col-md-12 pr-md pl-md">
								<button type="button" class="btn btn-black-hover-white-border-black btn-sm" data-dismiss="modal" aria-label="Close">Tutup</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')
	$('.btn-signin').click( function() {
		$('.signup').hide();
		$('.signin').toggle();
		$('.forgot').hide();
	});
	$('.btn-signup').click( function() {
		$('.signup').show();
		$('.signin').hide();
		$('.forgot').hide();
	});
	$('.btn-cancel').click( function() {
		$('.signup').hide();
		$('.forgot').hide();
		$('.signin').show();
	});
	$('.btn-forgot').click( function() {
		$('.signup').hide();
		$('.signin').hide();
		$('.forgot').show();
	});	
@stop

@section('wrapper_class')
	bg-login-page
@stop

@section('script_plugin')

@stop