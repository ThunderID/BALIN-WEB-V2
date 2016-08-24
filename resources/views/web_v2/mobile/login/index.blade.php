@extends('web_v2.page_templates.layout')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="hidden-xs hidden-sm col-md-7 col-lg-7">&nbsp;</div>
			<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
				<div class="row panel panel-default p-xs mt-md">
					<div class="col-md-12">
						<div class="signin" style="@if (Session::has('type')) {{ (Session::get('type')=='login') ? 'display:block;' : 'display:none;' }} @else {{ (isset($type) && ($type=='login') || (Input::get('type')=='login')) ? 'display:block;' : 'display:none;' }} @endif">
							<h3>Sign In</h3>
							@include('web_v2.components.login.form')
						</div>
						<div class="signup" style="@if (Session::has('type') && (Session::get('type')=='signup') || (isset($type) && ($type=='signup'))) display:block; @else display:none; @endif">
							<h3>Sign Up</h3>
							@include('web_v2.components.signup.form')
						</div>
						<div class="forgot" style="display:none">
							<h3>Reset Password</h3>
							@include('web_v2.components.forgot.form')
						</div>
					</div>	
					<div class="clearfix">&nbsp;</div>
				</div>                        
			</div>
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
	bg-login-page
@stop

@section('script_plugin')

@stop