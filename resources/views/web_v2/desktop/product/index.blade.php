<?php 
	// dd($data['product']); 
?>
@extends('web_v2.page_templates.layout')

@section('content')
	@include('web_v2.components.category-desktop')

	<section class="container mt-lg mb-lg">
		<div class="row form mr-0 ml-0">
			<div class="col-md-3 bg-grey">
				{!! Form::open(['url' => route('balin.product.index', ['type' => $data['type']]), 'method' => 'get', 'class' => 'form-filter']) !!}
					@include('web_v2.components.filter-desktop')
				{!! Form::close() !!}
			</div>
			<div class="col-md-9 content-data">
				@include('web_v2.components.sort-desktop')

				<div class="row mt-md mb-sm pl-md pr-md">
					@include('web_v2.components.card', [
						'card' 	=> $data['product'],
				  		'col'	=> 'col-lg-4 col-md-4 col-sm-4 col-xs-6' 
					])
				</div>

				<div class="row mt-sm mb-md">
					<div class="col-md-12 text-center">
						@include('web_v2.components.ajax_page')
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			@include('web_v2.plugins.ajaxPaging')
		</div>
	</section>
@stop

@section('js_plugin')
@stop

@section('js')  
	$(document).ready(function(){
		$('span.color-item').click(function(){
			item = $(this).parent();
			color = $(this).attr('data-color');
			checkboxcolor = $(this).parent().find('.checkbox-color');

			if (item.hasClass('active')) {
				item.removeClass('active');
				checkboxcolor.prop('checked', false);
			} else {
				item.addClass('active');
				checkboxcolor.prop('checked', true);
			}
			<!-- $('.form-filter').submit(); -->
		});
		$('input.checkbox-filter').change(function(){
			<!-- $('.form-filter').submit(); -->
		});
		$('.clearall-filter').click(function(){
			$('.checkbox-filter').prop('checked', false);
			$('.checkbox-color').prop('checked', false);
			$('span.color-item').parent().removeClass('active');
		});
	});
@stop