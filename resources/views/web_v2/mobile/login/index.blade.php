@extends('web_v2.page_templates.layout')

@section('content')
	<div class="container-fluid background pt-lg pb-lg mtm-xs">
		<div class="row">
			<div class="col-xs-12 col-sm-12 text-center text-white">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12">
							<div class="signin" style="@if (Session::has('type')) {{ (Session::get('type')=='login') ? 'display:block;' : 'display:none;' }} @else {{ (isset($type) && ($type=='login') || (Input::get('type')=='login')) ? 'display:block;' : 'display:none;' }} @endif">
								@include('web_v2.components.login.form')
							</div>
							<div class="signup" style="@if (Session::has('type') && (Session::get('type')=='signup') || (isset($type) && ($type=='signup'))) display:block; @else display:none; @endif">
								<h2 class="text-superlight mb-xl">Sign Up</h2>
								@include('web_v2.components.signup.form')
							</div>
							<div class="forgot" style="display:none">
								<h3>Reset Password</h3>
								@include('web_v2.components.forgot.form')
							</div>
						</div>
					</div>
				</div>
			</div>	
			<div class="clearfix">&nbsp;</div>
		</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>

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
	bg-login-page-mobile
@stop

@section('script_plugin')

@stop