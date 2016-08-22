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
@stop

@section('js_plugin')
	@include('web_v2.plugins.owlCarousel')
@stop

@section('js')

@stop