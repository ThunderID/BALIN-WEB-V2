@extends('web_v2.page_templates.layout')

@section('content')
<section class="container home">
	<div class="row">

		<div id="slider" class="owl-carousel owl-theme">

			<div class="item">
				<img class="img-responsive" src="{{ $data['banners']['left_banner']['image_lg'] }}">
			</div>
			<div class="item">
				<img class="img-responsive" src="{{ $data['banners']['right_banner']['image_lg'] }}">
			</div>

		</div>
	</div>
</section>
@stop

@section('js_plugin')
	@include('web_v2.plugins.owlCarousel')
@stop

@section('js')

@stop