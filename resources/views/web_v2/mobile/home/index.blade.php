@extends('web_v2.page_templates.layout')

@section('font')
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
@append


@section('content')
<section class="container home">
	<div class="row">
		@include('web_v2/components/slider', ['sliders' => $data['sliders']])
	</div>

	<!-- <div class="mt-md pt-xl">&nbsp;</div> -->
	<div class="container">
	<h2 class="text-center" style="font-family: 'Sacramento', cursive;">
		Shop By Style
	</h2>
	</div>
	<div class="container" style="padding-left:25px; padding-right:25px;">
	@include('web_v2.components.tile')
	</div>
</section>
@stop

@section('js_plugin')
	@include('web_v2.plugins.owlCarousel')
@stop

@section('js')

@stop