@extends('web_v2.page_templates.layout')

@section('content')
	<section style="margin-top: 60px;">
		@include('web_v2/components/slider', ['sliders' => $data['sliders']])
	</section>
	
	<div class="mt-md pt-xl">&nbsp;</div>
	@include('web_v2.components.tile')
@stop

@section('js_plugin')
	@include('web_v2.plugins.owlCarousel')
@stop

@section('js')  
@stop