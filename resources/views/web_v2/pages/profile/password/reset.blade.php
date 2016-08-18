@extends('web_v2.page_templates.layout')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="hidden-xs hidden-sm col-md-7 col-lg-7">&nbsp;</div>
			<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
				<div class="row panel panel-default p-xs mt-md">
					<div class="col-md-12">
						<h3>Reset Password</h3>
						{!! Form::open(['url' => route('balin.change.password'), 'method' => 'POST']) !!}
							<div class="form-group">
								<label class="mt-md">Password</label>
								{!! Form::password('password', ['class' => 'form-control hollow', 'placeholder' => 'Masukkan password', 'tabindex' => '1']) !!}
							</div>
							<div class="form-group">
								<label>Konfirmasi Password</label>
								{!! Form::password('password_confirmation', ['class' => 'form-control hollow', 'placeholder' => 'Masukkan konfirmasi password', 'tabindex' => '2']) !!}
							</div>
							<div class="form-group text-right">
								<button type="submit" class="btn btn-black-hover-white-border-black" tabindex="3">Simpan</button>
							</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>
	</div>
@stop


@section('wrapper_class')
	bg-login-page
@stop
