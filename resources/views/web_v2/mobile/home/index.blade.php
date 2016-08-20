@extends('web_v2.page_templates.layout')

@section('content')
<section class="container home">
	<div class="row">

		@include('web_v2/components/slider', ['sliders' => $data['sliders']])

	</div>
</section>
@stop

@section('js_plugin')
	@include('web_v2.plugins.owlCarousel')
@stop

@section('js')

@stop