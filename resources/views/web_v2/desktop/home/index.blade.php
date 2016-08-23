@extends('web_v2.page_templates.layout')

@section('font')
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
@append

@section('content')
	<section class="home-slider">
		@include('web_v2/components/slider', ['sliders' => $data['sliders']])
	</section>

	<div class="container shop-by-style-desktop">
		<h2 class="text-center title">
			Shop By Style
		</h2>
		@include('web_v2.components.tile-desktop')
	</div>

	<section class="container-fluid bg-grey mt-xl pt-sm">
		<div class="row mt-sm mb-sm">
			<div class="col-md-12 text-center">
				<h3 class="text-uppercase m-0">New Release</h3>
			</div>
		</div>
		<div class="container pt-md pb-md mb-sm">
			<div class="row">
			  	@include('web_v2.components.card', [
			  		'data' 	=> $data['new_release'],
			  		'col'	=> 'col-md-3 col-sm-3 col-xs-6' 
			  	])
			</div>
		</div>
	</section>

	<section class="container mt-xl">
		<div class="row pb-xs">
			<div class="col-md-12 text-center">
				<p class="m-0">Make sure you follow us on</p>
				<h3 class="text-uppercase mtm-5 mbm-5">INSTAGRAM</h3>
				<p class="m-0"><em>@balin.id</em></p>
			</div>
		</div>
		<div class="row pt-md pb-md mb-sm">
			@include('web_v2.components.card_no_description', [
				'data'	=> $data['instagram'],
				'col'	=> 'col-md-3 col-sm-3 col-xs-6'
			])
		</div>
	</section>
@stop

@section('js_plugin')
	@include('web_v2.plugins.owlCarousel')
@stop

@section('js')  
@stop