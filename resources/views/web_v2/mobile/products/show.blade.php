@extends('web_v2.page_templates.layout')

@section('content')
	@include('web_v2.components.breadcrumb')

		<section class="container mt-0 mb-lg">
		<div class="row">
			<!-- SECTION IMAGE SLIDER PRODUCT -->
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
				<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails border-1 border-solid border-grey-light hidden-xs" style="width:100%;">
					<a class="img-large" href="{{ isset($data['product']['data']['data'][0]['thumbnail']) ? $data['product']['data']['data'][0]['thumbnail'] : '' }}" >
						<img class="img img-responsive text-center canvas-image"  src="{{ isset($data['product']['data']['data'][0]['thumbnail']) ? $data['product']['data']['data'][0]['thumbnail'] : '' }}" style="width:100%">
					</a>
				</div>
				<div class="row mb-lg">
					<div class="col-md-12 col-lg-12 col-sm-12 hidden-xs mt-xs">
						@if (count($data['product']['data']['data'][0]['images']) != 0)
							<div class="carousel-stacked gallery-product">
								@foreach ($data['product']['data']['data'][0]['images'] as $i => $img)
									<div class="item item-carousel">
										<a href="{{ $img['thumbnail'] }}" data-standard="{{ $img['thumbnail'] }}">
											<img class="img img-responsive canvasSource pull-left" id="canvasSource{{ $i }}" src="{{ $img['thumbnail'] }}" alt="" style="width:70px">
										</a>
									</div>
								@endforeach
							</div>
						@else
							<div class="carousel-stacked gallery-product">
								<div class="item item-carousel">
									<a href="{{ $data['product']['data']['data'][0]['thumbnail'] }}" data-standard="{{ $data['product']['data']['data'][0]['thumbnail'] }}">
										<img class="img img-responsive canvasSource pull-left" src="{{ isset($data['product']['data']['data'][0]['thumbnail']) ? $data['product']['data']['data'][0]['thumbnail'] : '' }}" alt="{{ $data['product']['data']['data'][0]['name'] }}" style="width:70px">
									</a>
								</div>
							</div>
						@endif
					</div>
					<div class="col-xs-12 hidden-sm hidden-md hidden-lg">
						<div class="row">
							<div class="col-xs-12">
								<div class="carousel-single gallery-product">
									@if (count($data['product']['data']['data'][0]['images']) != 0)
										@foreach ($data['product']['data']['data'][0]['images'] as $i => $img)
											<div class="item item-carousel">
												<a href="{{ $img['thumbnail'] }}" data-standard="{{ $img['thumbnail'] }}">
													<img class="img img-responsive canvasSource" id="canvasSource{{ $i }}" src="{{ $img['thumbnail'] }}" alt="" style="width:100%;">
												</a>
											</div>
										@endforeach
									@else
										<div class="item item-carousel">
											<a href="{{ $data['product']['data']['data'][0]['thumbnail'] }}" data-standard="{{ $data['product']['data']['data'][0]['thumbnail'] }}">
												<img class="img img-responsive canvasSource" src="{{ isset($data['product']['data']['data'][0]['thumbnail']) ? $data['product']['data']['data'][0]['thumbnail'] : 'http://drive.thunder.id/file/public/4/1/2015/12/06/05/avani-short-front.jpg' }}" alt="" style="width:100%;">
											</a>
										</div>									
									@endif
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">&nbsp;</div> -->
			<!-- END SECTION IMAGE SLIDER PRODUCT -->

			<!-- SECTION INFO DETAIL PRODUCT -->
			<div class="col-xs-12 col-sm-8 col-md-7 col-lg-7">
				<!-- SECTION DESCRIPTION PRODUCT -->
				<div class="row mb-lg">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h4 class="mt-0 mb-0">{{ $data['product']['data']['data'][0]['name'] }}</h4>
					</div>
					<div class="col-xs-8 col-sm-8 col-md-9 col-lg-9">
						<p class="mb-0">Atasan Wanita</p>
						<p class="card-text mt-0">
							@if ($data['product']['data']['data'][0]['promo_price'] != 0)
								<del>@money_indo($data['product']['data']['data'][0]['price'])</del>
								<span class="text-orange">@money_indo($data['product']['data']['data'][0]['promo_price'])</span>
							@else
								<span>@money_indo($data['product']['data']['data'][0]['price'])</span>
							@endif
						</p>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 pl-0">
						<p class="mb-0">Time left to buy</p>
						<h3 class="text-orange mt-0 countdown" data-seconds-left=1800></h3>
					</div>					
				</div>


				<!-- START SECTION TRANSACTION MENU -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel-group product-detail" id="accordion" role="tablist" aria-multiselectable="true">

					<!-- START SECTION DESCRIPTION -->
							<div class="panel panel-default mt-0">
								<div class="panel-heading" role="tab" id="headingOne">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										<h4 class="panel-title">
											Description
											<span class="pull-right">
												<i class="fa fa-angle-right " aria-hidden="true"></i>
											</span>
										</h4>
									</a>
								</div>
								<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">
										<?php  $description = isset($data['product']['data']['data'][0]['description']) ? json_decode($data['product']['data']['data'][0]['description'], true) : ['description' => '', 'fit' => '']; ?>
										{!! $description['description'] !!}
									</div>
								</div>
							</div>
					<!-- END SECTION DESCRIPTION -->

					<!-- START SECTION FIT & MEASUREMENT -->
							<div class="panel panel-default mt-0">
								<div class="panel-heading" role="tab" id="headingTwo">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										<h4 class="panel-title">
											Fit & Measurement
											<span class="pull-right">
												<i class="fa fa-angle-right " aria-hidden="true"></i>
											</span>											
										</h4>
									</a>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									<div class="panel-body">
										{!! $description['fit'] !!}
									</div>
								</div>
							</div>
					<!-- END SECTION FIT & MEASUREMENT-->

					<!-- START SECTION CARE-->
							<div class="panel panel-default mt-0">
								<div class="panel-heading" role="tab" id="headingThree">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										<h4 class="panel-title">
											Care
											<span class="pull-right">
												<i class="fa fa-angle-right " aria-hidden="true"></i>
											</span>											
										</h4>
									</a>
								</div>
								<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
									<div class="panel-body">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
									</div>
								</div>
							</div>
					<!-- END SECTION CARE-->

					<!-- START SECTION SIZE-->
							<div class="panel panel-default mt-0">
								<div class="panel-heading" role="tab" id="headingFour">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
										<h4 class="panel-title">
											Pilih Ukuran
											<span class="pull-right active">
												<i class="fa fa-angle-right " aria-hidden="true"></i>
											</span>											
										</h4>
									</a>
								</div>
								<div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
									<div id="size-section" class="panel-body">
										@foreach($data['product']['data']['data'][0]['varians'] as $varian)
											<div class="row {{ end($data['product']['data']['data'][0]['varians']) != $varian ? 'mb-sm' : '' }}">
												<div class="col-md-12 col-sm-12 col-xs-12 pl-sm pr-sm text-left">
													<div class="col-xs-9 col-sm-9 col-md-10">
													{{$varian['size']}}
													</div>
													@if($varian['current_stock'] > 0)
														<div class="col-xs-3 col-sm-3 col-md-2 text-center" data-sku="{{ $varian['sku'] }}">	
															<a href="javascript:void(0);" class="pull-left cart-remove not-active">
																<strong>-</strong>
															</a> 
															<span data-id="{{ $varian['id'] }}""  data-stock="{{$varian['current_stock']}}" class="cart">0</span>
															<a href="javascript:void(0);" class="pull-right cart-add"> 
																<strong>+</strong>
															</a>
														</div>
													@else
														<div class="col-xs-3 col-sm-3 col-md-2 text-center">
															Habis	
														</div>
													@endif
												</div>
											</div>
										@endforeach
									</div>
								</div>
							</div>
					<!-- END SECTION SIZE-->

					<!-- START SECTION TOTAL -->
							<div class="panel panel-default mt-0">
								<div class="panel-heading" role="tab" id="headingOne">
									<h4 class="panel-title">
										Total
										<span class="pull-right">
											IDR <span class="total">0</span>
										</span>
									</h4>
								</div>
							</div>
					<!-- START SECTION TOTAL -->


						</div>
					</div>
				</div>
				<!-- END SECTION TRANSACTION MENU -->

				<div class="row">
					<div class="col-md-12 text-right">
						<a href="javascript:void(0);" class="btn btn-orange buy pl-sm pr-sm">
							<i class="fa fa-shopping-bag" aria-hidden="true"></i>
							&nbsp;Buy Now
						</a>
					</div>
				</div>

			</div>
			<!-- END SECTION INFO DETAIL PRODUCT -->
		</div>

		<!-- SECTION RELATED PRODUCT -->
		<div class="row">
			<div class="container text-left mt-xxl mb-sm">
				<h3 class="text-uppercase m-0">PILIHAN LAIN</h3>
				<a class="home-product-more" href="#">Lihat Semua <i class="fa fa-chevron-right" aria-hidden="true" style="font-size:10px;"></i></a>
			</div>			
			<?php
				// dd($data['related']);
			?>
				@include('web_v2.components.card', [
					'card' 	=> $data['related'],
					'col'	=> 'col-md-3 col-sm-3 col-xs-6' 
				])
		</div>
		<!-- END SECTION RELATED PRODUCT -->

		<div class="row">
			<div class="container text-center mt-xxl mb-sm hidden-sm hidden-md hidden-lg">
				<a href="#" class="btn btn-orange buy pl-xl pr-xl">
					Lihat Semua
				</a>
			</div>
		</div>

	</section>
@stop

@section('js_plugin')
	@include('web_v2.plugins.owlCarousel')
	@include('web_v2.plugins.notif', ['data' => ['title' => 'Terima Kasih', 'content' => 'Produk telah ditambahkan di cart']])
	@include('web_v2.plugins.countdown')
@stop

@section('js')
	data_action1 = '{{ route('balin.cart.store', $data['product']['data']['data'][0]['slug']) }}';
	data_action2 = '{{ route('balin.cart.list') }}';

	$('.panel').on('hide.bs.collapse', function (e) {
		$(e.currentTarget).find('span').removeClass('active');
	})
	$('.panel').on('show.bs.collapse', function (e) {
		$(e.currentTarget).find('span').addClass('active');
	})


	function addStock ($current, $stock){
		if($current < $stock){
			return $current + 1;
		}else{
			return $current;
		}
	}
	function removeStock ($current){
		if($current > 0){
			return $current - 1;
		}else{
			return $current;
		}
	}


	$('.buy').click(function() {
		<!-- check if busy -->
		if($(this).children().hasClass('fa-pulse')){
			return false;
		}	

		<!-- get data -->
		var base_url = '{{ route('balin.cart.store', ['slug' => $data['product']['data']['data'][0]['slug']]) }}';
		var arr_var_id = [];
		var arr_qty = [];
		var var_ids = '';
		var qty = '';

		$('.cart').each(function() {
			if($(this).text() != 0){
				var_ids = var_ids + 'varianids[]=' + $(this).data('id') + '&';
				qty = qty + 'qty[]=' + $(this).text() + '&';
			}
		});

		<!-- save cart -->
		if(var_ids != '')
		{
			<!-- ui -->
			$('.cart-add').addClass('not-active');
			$('.cart-remove').addClass('not-active');
			$(this).children().removeClass('fa-shopping-bag');
			$(this).children().addClass('fa-spinner fa-pulse');

			<!-- check if user logged in -->
			var usr = '{{ Session::get('me') }}';
			usr = 'DELETE ME';
			if(usr == ''){
				window.location.replace('{{ route('balin.get.login') }}');
			}else{	
				<!-- send -->
				var query = var_ids + qty;
				var result = $.ajax({
				   	url: '{{ route('balin.cart.store', ['slug' => $data['product']['data']['data'][0]['slug']]) }}',
				   	type:'GET',
				   	data: query,
				   	success: function(data){
				   		<!-- update page -->
						var url = window.location.href;
						$.ajax({
						   	url: url,
						   	type:'GET',
						   	success: function(data){
						    	$('#size-section').html($(data).find('#size-section').html());
						    	$('#cart-desktop').html($(data).find('#cart-desktop').html());
						    	$('#cart-mobile').html($(data).find('#cart-mobile').html());

								<!-- reset ui -->
								$('.buy').children().removeClass('fa-spinner fa-pulse');
								$('.buy').children().addClass('fa-shopping-bag');

								$('.cart-remove').addClass('not-active');
								$('.cart-add').removeClass('not-active');

								$('.total').text(0);
								$('.dropdown-menu').toggle({'display': 'block'});
						   	},
						   	error: function(){
								location.reload();
						   	},
						});
				   	},
				   	error: function(){
						<!-- reset ui -->
						console.log('error');
						$('.buy').children().removeClass('fa-spinner fa-pulse');
						$('.buy').children().addClass('fa-shopping-bag');
				   	}
				});
			}
		}
	})		
	$(document).on('click', '.cart-add', function(){
		var prev = parseInt($(this).parent().find('.cart').text());
		var stock = parseInt($(this).parent().find('.cart').data("stock"));
		var current = addStock(prev,stock);
		$(this).parent().find('.cart').text(current);
		$(this).parent().find('.cart').trigger( "change" )

		if(current < stock){
			if(current > 0){
				$(this).siblings('.cart-remove').removeClass('not-active');
			}	
		}else{
			$(this).addClass('not-active');
		}
	});	
	$(document).on('click', '.cart-remove', function(){
		var prev = parseInt($(this).parent().find('.cart').text());
		var stock = parseInt($(this).parent().find('.cart').data("stock"));
		var current = removeStock(prev);
		$(this).parent().find('.cart').text(current);
		$(this).parent().find('.cart').trigger( "change" )

		if(current > 0){
			if(current < stock){
				$(this).siblings('.cart-add').removeClass('not-active');
			}		
		}else{
			$(this).addClass('not-active');
		}
	});
	$(document).on('change', '.cart', function(){
		var total = 0;
		var price = {{ $data['product']['data']['data'][0]['promo_price'] == 0 ? $data['product']['data']['data'][0]['price'] : $data['product']['data']['data'][0]['promo_price']}}
		$('.cart').each(function() {
			if($(this).text() > 0){
				total = total + (parseInt($(this).text()) * price);
			}
		});
		$('.total').text(total);
	});
@stop