@extends('web_v2.page_templates.layout')

@section('content')
{{-- Desktop and Tablet Section --}}
	<section style="margin-top: 60px;">
		@include('web_v2/components/slider', ['sliders' => $data['sliders']])
	</section>
@stop

@section('js_plugin')
	@include('web_v2.plugins.owlCarousel')
@stop

@section('js')  
@stop