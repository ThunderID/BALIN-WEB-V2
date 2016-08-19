@extends('web_v2.page_templates.layout')

@section('content')
	<div class="mt-md pt-xl">&nbsp;</div>
	@include('web_v2.components.tile')
@stop

@section('js_plugin')
	@include('web_v2.plugins.fadeThis')
@stop

@section('js')
	$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {		
		$('.home-tab').removeClass('home-tab-active');
		$(this).addClass('home-tab-active');

		animateCard($(this).data('tab-id'));
		$(window).scrollTop($(window).scrollTop()+1);
		$(window).scrollTop($(window).scrollTop()-1);
	})

	function animateCard(e){
		var delay = 0;

		$('#' + e).find('.card-animate').css('opacity',0);
		$('#' + e).find('.card-animate').each(function() {
		    $(this).delay(delay).animate({
		        opacity:1
		    },750);
		    delay += 250;
		});	
	};  
@stop