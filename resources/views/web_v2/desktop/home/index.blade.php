@extends('web_v2.page_templates.layout')

@section('font')
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
@append

@section('content')
	<section style="margin-top: 60px;">
		@include('web_v2/components/slider', ['sliders' => $data['sliders']])
	</section>
	
	<div class="container shop-by-style-desktop">
		<h2 class="text-center title">
			Shop By Style
		</h2>
		@include('web_v2.components.tile-desktop')
	</div>
@stop

@section('js_plugin')
	@include('web_v2.plugins.owlCarousel')
@stop

@section('js')  
@stop