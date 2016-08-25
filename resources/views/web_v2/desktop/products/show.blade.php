@extends('web_v2.page_templates.layout')

@section('content')
	@include('web_v2.components.category-desktop')
	@include('web_v2.components.breadcrumb')

	<section class="container mt-0 mb-lg">
		<div class="row">
			<!-- SECTION IMAGE SLIDER PRODUCT -->
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center">
				<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails border-1 border-solid border-grey-light hidden-xs hidden-sm" style="width:100%;">
					<a class="img-large" href="{{ isset($data['product']['data']['data'][0]['thumbnail']) ? $data['product']['data']['data'][0]['thumbnail'] : 'http://drive.thunder.id/file/public/4/1/2015/12/06/05/avani-short-front.jpg' }}" >
						<img class="img img-responsive text-center canvas-image"  src="{{ isset($data['product']['data']['data'][0]['thumbnail']) ? $data['product']['data']['data'][0]['thumbnail'] : 'http://drive.thunder.id/file/public/4/1/2015/12/06/05/avani-short-front.jpg' }}" style="width:100%">
					</a>
				</div>
				<div class="row mb-lg">
					<div class="col-md-12 col-lg-12 hidden-xs hidden-sm mt-xs">
						@if (count($data['product']['data']['data'][0]['images']) != 0)
							<div class="owl-carousel gallery-product">
								@foreach ($data['product']['data']['data'][0]['images'] as $i => $img)
									<div class="item-carousel">
										<a href="{{ $img['thumbnail'] }}" data-standard="{{ $img['thumbnail'] }}">
											<img class="img img-responsive canvasSource pull-left" id="canvasSource{{ $i }}" src="{{ $img['thumbnail'] }}" alt="">
										</a>
									</div>
								@endforeach
							</div>
						@else
							<img class="img img-responsive canvasSource pull-left" src="{{ isset($data['product']['data']['data'][0]['thumbnail']) ? $data['product']['data']['data'][0]['thumbnail'] : 'http://drive.thunder.id/file/public/4/1/2015/12/06/05/avani-short-front.jpg' }}" alt="{{ $data['product']['data']['data'][0]['name'] }}" style="width:50px">
						@endif
					</div>
					<div class="col-xs-12 col-sm-12 pl-0 pr-0 hidden-md hidden-lg">
						@if (count($data['product']['data']['data'][0]['images']) != 0)
							<div class="owl-carousel gallery-product">
								@foreach ($data['product']['data']['data'][0]['images'] as $i => $img)
									<div class="item-carousel">
										<a href="{{ $img['thumbnail'] }}" data-standard="{{ $img['thumbnail'] }}">
											<img class="img img-responsive canvasSource" id="canvasSource{{ $i }}" src="{{ $img['thumbnail'] }}" alt="">
										</a>
									</div>
								@endforeach
							</div>
						@else
							<img class="img img-responsive canvasSource" src="{{ isset($data['product']['data']['data'][0]['thumbnail']) ? $data['product']['data']['data'][0]['thumbnail'] : 'http://drive.thunder.id/file/public/4/1/2015/12/06/05/avani-short-front.jpg' }}" alt="">
						@endif
					</div>
				</div>
			</div>
			<!-- <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">&nbsp;</div> -->
			<!-- END SECTION IMAGE SLIDER PRODUCT -->

			<!-- SECTION INFO DETAIL PRODUCT -->
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 pl-lg">
				<!-- SECTION DESCRIPTION PRODUCT -->
				<div class="row mb-lg">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h4 class="mt-0 mb-0">{{ $data['product']['data']['data'][0]['name'] }}</h4>
					</div>
					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<p class="mb-0">Atasan Wanita</p>
						<p class="card-text mt-0">
							@if (1 != 0)
								<del>@money_indo(299000)</del>
								<span class="text-orange">@money_indo(249000)</span>
							@else
								<span>@money_indo(299000)</span>
							@endif
						</p>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<p class="mb-0">Time left to buy</p>
						<h3 class="text-orange mt-0 countdown" data-seconds-left=1800></h3>
					</div>					
				</div>


				<!-- START SECTION TRANSACTION MENU -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel-group product-detail" id="accordion" role="tablist" aria-multiselectable="true">

					<!-- START SECTION DESCRIPTION -->
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										<h4 class="panel-title">
											Description
											<span class="pull-right active">
												<i class="fa fa-chevron-right" aria-hidden="true"></i>
											</span>
										</h4>
									</a>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">
										<?php  $description = isset($data['product']['data']['data'][0]['description']) ? json_decode($data['product']['data']['data'][0]['description'], true) : ['description' => '', 'fit' => '']; ?>
										<p class="text-superlight">{!! $description['description'] !!}</p>
									</div>
								</div>
							</div>
					<!-- END SECTION DESCRIPTION -->

					<!-- START SECTION FIT & MEASUREMENT -->
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingTwo">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										<h4 class="panel-title">
											Fit & Measurement
											<span class="pull-right">
												<i class="fa fa-chevron-right" aria-hidden="true"></i>
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
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingThree">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										<h4 class="panel-title">
											Care
											<span class="pull-right">
												<i class="fa fa-chevron-right" aria-hidden="true"></i>
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
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingFour">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
										<h4 class="panel-title">
											Size
											<span class="pull-right">
												<i class="fa fa-chevron-right" aria-hidden="true"></i>
											</span>											
										</h4>
									</a>
								</div>
								<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
									<div class="panel-body">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
									</div>
								</div>
							</div>	
					<!-- END SECTION SIZE-->

					<!-- START SECTION TOTAL -->
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
									<h4 class="panel-title">
										Total
										<span class="pull-right">
											IDR 0
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
						<a href="javascript:void(0);" class="btn btn-orange addto-cart">Add To Cart</a>
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
				@include('web_v2.components.card', [
					'data' 	=> $data['related'],
					'col'	=> 'col-md-3 col-sm-3 col-xs-6' 
				])
		</div>
		<!-- END SECTION RELATED PRODUCT -->

		<div class="clearfix">&nbsp;</div>
	</section>
@stop

@section('js_plugin')
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
@stop