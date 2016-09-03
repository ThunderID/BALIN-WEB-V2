@extends('web_v2.page_templates.layout')

@section('content')
	<section class="container pt-xxl pb-lg">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<!-- SECTION HEADER TABLE CART -->
				<div class="row border-1 border-solid border-grey-light p-sm ml-0 mr-0">
					<div class="col-sm-4 col-md-4 col-lg-4 text-uppercase">
						<span class="ml-sm">Produk</span>
					</div>
					<div class="col-sm-2 col-md-2 col-lg-2 text-uppercase">
						<span class="mr-xxl">Harga</span>
					</div>
					<div class="col-sm-2 col-md-2 col-md-2 text-uppercase text-center">
						<span>Kuantitas</span>
					</div>
					<div class="col-sm-2 col-md-2 col-lg-2 text-uppercase text-center">
						<span>Diskon</span>
					</div>
					<div class="col-sm-2 col-md-2 col-lg-2 text-uppercase text-center">
						<span>Total</span>
					</div>
				</div>
				<div class="cart-append"></div>
				<!-- END SECTION HEADER TABLE CART -->
			
				<!-- SECTION CONTENT TABLE CART -->
				<?php 
					$total 	= 0; 
					$i 		= 0;
					$temp_product = 0;
					// dd($data['carts']);
				?>

				@if (!empty($data['carts']))
					@foreach ($data['carts'] as $k => $item)
						<?php
							$qty 			= 0;
							foreach ($item['varians'] as $key => $value) 
							{
								$qty 		= $qty + $value['quantity'];
							}
						?>
						@include('web_v2.components.cart.item-list-desktop', array(
							"item_id"			=> $k,
							"item_thumbnail"	=> $item['thumbnail'],
							"item_name" 		=> $item['name'],
							"item_qty"			=> $qty,
							"item_price"		=> $item['price'],
							"item_size"			=> $item['varians'],
							"item_discount"		=> $item['discount']!=0 ? $item['price']-$item['discount'] : $item['discount'],
							"item_total"		=> $item['discount']!=0 ? (($item['price']-$item['discount'])*$qty) : ($item['price']*$qty),
							"item_slug"			=> $item['slug'],
							"item_mode"			=> 'new',
						))
						<?php $total += ($item['discount']!=0) ? (($item['price']-$item['discount'])*$qty) : ($item['price']*$qty); ?>
					@endforeach
				@else
					<div class="row mr-0 ml-0 border-bottom-1 border-left-1 border-right-1 border-grey-light p-sm hidden-xs">
						<div class="col-sm-12 col-md-12 col-sm-12 col-xs-12">
							<h4 class="text-center text-md">Tidak ada item di cart</h4>
						</div>
					</div>
					<div class="row mr-0 ml-0 p-sm hidden-sm hidden-md hidden-lg">
						<div class="col-sm-12 col-md-12 col-sm-12 col-xs-12">
							<h4 class="text-center text-md">Tidak ada item di cart</h4>
						</div>
					</div>
				@endif
				<!-- END SECTION CONTENT TABLE CART -->

				<!-- SECTION TABLE FOOTER CART -->
				<!-- SECTION FOOTER CART DESKTOP -->
				@if (!empty($data['carts']))
					<div class="row border-right-1 border-left-1 border-bottom-1 border-grey-light p-sm cart-footer ml-0 mr-0">
						<div class="col-sm-8 col-md-8 col-lg-8">
							<h4 class="text-uppercase text-right">Sub Total</h4>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4">
							<h4 class="text-right grand_total" data-total-item="{{ $total }}">
								@if ($total)
									<strong class="total_all">@money_indo($total)</strong>
								@endif
							</h4>
						</div>
					</div>
				@endif

				<div class="clearfix hidden-xs">&nbsp;</div>
				<div class="clearfix hidden-xs">&nbsp;</div>
				<div class="row ml-0 mr-0">
					<div class="col-lg-12 col-md-12 col-sm-12 hidden-xs">
						<div class="row">
							<a href="{{ route('balin.product.index') }}" class="btn btn-orange btn-lg text-lg pull-left">
								Lihat Produk Lainnya
							</a>
							@if (!empty($data['carts']))
								<a href="{{ route('my.balin.checkout.get') }}" class="btn btn-orange-full btn-lg text-lg pull-right btn-checkout">
									Checkout
								</a>			
							@endif				
						</div>
					</div>
					<div class="clearfix">&nbsp;</div>
					<div class="clearfix">&nbsp;</div>
				</div>
				<!-- END SECTION FOOTER CART DESKTOP -->
				<!-- END SECTION TABLE FOOTER CART -->
			</div>
		</div>
	</section>
@stop

@section('js')
	data_action1 = '{{ route('balin.cart.store') }}';
	data_action2 = '{{ route('balin.cart.list') }}';
@stop