@extends('web_v2.page_templates.layout')

@section('content')
	@include('web_v2.components.category-desktop')

	<section class="container mt-lg mb-lg">
		<div class="row form">
			<div class="col-md-3 bg-grey">
				@include('web_v2.components.filter-desktop')
			</div>
			<div class="col-md-9">
				@include('web_v2.components.sort-desktop')
			</div>
		</div>
	</section>
@stop

@section('js_plugin')
@stop

@section('js')  

		$(document).ready(function(){
			$('input[type=checkbox]').change(function(){
				console.log($(this));
			});
		});
@stop