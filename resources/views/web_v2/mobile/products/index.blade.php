@extends('web_v2.page_templates.layout')

@section('content')
	@include('web_v2.components.category-desktop')
	<section class="container-fluid mb-xs">
		<div class="row form">
			<div class="col-xs-12 col-sm-12 pl-0 pr-0">
				<div class="panel-group filter mb-0" id="accordion" role="tablist" aria-multiselectable="true">
					@include('web_v2.components.category-mobile')
					@include('web_v2.components.filter-mobile')
					@include('web_v2.components.sort-mobile')
				</div>
			</div>
		</div>
	</section>
	<section class="container mt-xs mb-xs content-data">
		@if(count($data['offer']))
			<div class="row">
				<div class="col-md-12 text-center">
					<h3 class="">COMING SOON</h3>
					<h5 class="">Please stay tuned to be the first to know when our product is ready</h5>
				</div>
			</div>
			<div class="clearfix">&nbsp;</div>
			<div class="row">
				<div class="col-md-12">
					<h4 class="mt-md mb-sm pl-sm pr-sm">Anda Mungkin Suka</h4>
				</div>
			</div>
			<div class="row row-card mt-md mb-sm pl-sm pr-sm">
				{{-- DATA GRID CARD PRODUCT --}}
				@include('web_v2.components.card', [
					'card' 	=> $data['offer'],
			  		'col'	=> 'col-xs-6 col-sm-6',
			  		'last' => true
				])
			</div>
			<div class="col-md-12 text-center">
				<a class="btn btn-orange" href="{{route('balin.product.index', $data['linked_search'])}}">Lihat Semua</a>
			</div>
		@else
			<div class="row pb-xs">
				<div class="col-xs-12 col-sm-12 text-right">
					<span class="pt-xs">Showing {{ $paging_from }} - {{ $paging_to }} of {{ $paging->total() }} results</span>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<div class="row">
						@include('web_v2.components.card', [
							'card' 	=> $data['product'],
					  		'col'	=> 'col-xs-6 col-sm-6 '
						])
					</div>
				</div>
			</div>
		@endif

		<div class="row">
			<div class="col-xs-12 col-sm-12">
				@include('web_v2.components.ajax_page')
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
		{{-- FUNCTION COLLAPSE CATEGORY, FILTER, SORT --}}
		$('.panel').on('hide.bs.collapse', function (e) {
			$(e.currentTarget).find('span').removeClass('active');
		});
		$('.panel').on('show.bs.collapse', function (e) {
			$(e.currentTarget).find('span').addClass('active');
		});

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
		stop_double_event();

		{{-- filter clear all mobile --}}
		$('.clearall-filter-mobile').click(function(){
			// to ajax paging
			ajaxPaging($(this));

			// remove filter & sort active
			$('.filter-info').html('');
			$('.sort-info').html('');
			$('.checkbox-filter').prop('checked', false);
			$('.checkbox-color').prop('checked', false);
			$('span.color-item').parent().removeClass('active');
		});
	});
@stop