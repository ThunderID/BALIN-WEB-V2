@extends('web_v2.page_templates.layout')

@section('content')
	@if(isset($data['shop_by_style']))
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
	 @endif
	 
	 @if(count($data['new_release']))
	 <section class="container-fluid bg-grey mt-xl pt-sm">
	 	<div class="row mt-sm mb-sm">
	 		<div class="container text-center">
	 			<div class="col-md-12">
	 				@if(!$data['premium'])
	 					<h3 class="text-uppercase m-0">NEW RELEASE</h3>
	 				@else
	 					<h5 class="text-uppercase m-0 text-orange">NEW RELEASE</h5>
	 					<h3 class="text-uppercase m-0">PREMIUM COTTON</h3>
	 				@endif
	 			</div>
	 		</div>
	 	</div>
	 	<div class="container pt-md pb-sm">
	 		<div class="row">
	 		  	@include('web_v2.components.card', [
	 		  		'card' 	=> $data['new_release'],
	 		  		'col'	=> 'col-md-3 col-sm-3 col-xs-6' 
	 		  	])
	 		</div>
	 	</div>
	 	<div class="container text-center">
	 		<div class="row">
	 			<div class="col-md-12">
	 				<a href="{{route('balin.product.index', $data['linked_search'])}}" class="btn btn-orange buy">
	 					Lihat Semua
	 				</a>
				</div>
			</div>
		</div>
	</section>
	<section class="container pt-xl mb-xs relative" style="margin-top: 110px;">
		<div class="ajax-loading pt-xl" style="display:none; margin-top: 50px;">
			<img src="/images/loading-balin.gif" />
			<h4>
				All in good time ...</br>
				<small>a moment till we're ready</small>
			</h4>
		</div>
		<div class="content-data" data-title="{{ isset($page_subtitle) ? $page_subtitle . ' - ' . $page_title : 'BALIN.ID' }}">
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

	{{-- event filter active click --}}
	$('h4.panel-title').on('click', 'label.panel-action', function(e) {
		stop_double_event(e, $(this));
	});

	{{-- btn share --}}
	$('.btn-copy-share').attr('data-clipboard-text', window.location.href);
	fb_link = $('.btn-facebook-share').attr('href');
	$('.btn-facebook-share').attr('href', fb_link + '&href=' +window.location.href);

	{{-- event click more in active filter --}}
	function click_more(param, e) {
		e.stopPropagation();
		if ($('.filter-more').hasClass('hide')) {
			$('.filter-more').removeClass('hide');
			param.html('Less..');
		} else {
			$('.filter-more').addClass('hide');
			param.html('More..');
		}
	}
	$('.more').on('click', function(e){click_more($(this), e)});
@stop