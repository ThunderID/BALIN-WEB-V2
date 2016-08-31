@extends('web_v2.page_templates.layout')

@section('content')
	{{-- CATEGORY --}}
	@include('web_v2.components.category-desktop')

	<section class="container mt-sm mb-sm">
		<div class="row form mr-0 ml-0">
			<div class="col-md-3 bg-grey">
				{{-- FILTER-DESKTOP --}}
				@include('web_v2.components.filter-desktop')
			</div>
			<div class="col-md-9 content-data">
				<div class="row mt-xs mb-xs pl-sm pr-sm">
					<div class="col-md-6 col-lg-6 text-left">
						<p class="">Showing {{ $paging_from }} - {{ $paging_to }} of {{ $paging->total() }} results</p>
					</div>
					<div class="col-md-6 col-lg-6 text-right sort-content">
						{{-- SORT-DESKTOP --}}
						@include('web_v2.components.sort-desktop')
					</div>
				</div>
				<div class="row mt-md mb-sm pl-sm pr-sm">
					{{-- DATA GRID CARD PRODUCT --}}
					@include('web_v2.components.card', [
						'card' 	=> $data['product'],
				  		'col'	=> 'col-lg-4 col-md-4 col-sm-4 col-xs-6'
					])
				</div>
				<div class="row mt-sm mb-sm">
					{{-- DATA AJAX PAGINATION --}}
					@include('web_v2.components.ajax_page')
				</div>
			</div>
		</div>
		<div class="row">
			{{-- FUNCTION AJAX PAGINATION, FILTER, SORT --}}
			@include('web_v2.plugins.ajaxPaging')
		</div>
	</section>
@stop

@section('js_plugin')
@stop

@section('js')  
	$(document).ready(function(){
		{{-- FUNCTION CHECKBOX FILTER COLOR CLICK --}}
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
			ajaxFilter(checkboxcolor);
		});
		{{-- FUNCTION CLEARALL FILTER DESKTOP --}}
		$('.clearall-filter').click(function(){
			$('.checkbox-filter').prop('checked', false);
			$('.checkbox-color').prop('checked', false);
			$('span.color-item').parent().removeClass('active');
		});
	});
@stop