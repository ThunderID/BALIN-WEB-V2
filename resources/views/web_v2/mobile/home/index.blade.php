@extends('web_v2.page_templates.layout')

@section('font')
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
@append


@section('content')
<section class="container home">
	<div class="row">
		@include('web_v2/components/slider', ['sliders' => $data['sliders']])
	</div>

	<div class="container shop-by-style-mobile">
		<h2 class="text-center title">
			Shop By Style
		</h2>
		<div class="content">
			@include('web_v2.components.tile-mobile')
		</div>
	</div>
</section>

<section class="container-fluid bg-grey mt-xl pt-sm">
	<div class="row mt-sm mb-sm">
		<div class="container text-center">
			<div class="col-md-12">
				<h3 class="text-uppercase text-left m-0">New Release</h3>
			</div>
			<a class="home-product-more" href="#">Lihat Semua <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
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
@stop

@section('js_plugin')
	@include('web_v2.plugins.owlCarousel')
@stop

@section('js')

@stop