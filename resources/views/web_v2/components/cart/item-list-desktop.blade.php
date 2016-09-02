<!-- SECTION CART LIST ITEM DESKTOP -->
<div class="row chart-item border-right-1 border-left-1 border-bottom-1 border-grey-light pb-xs ml-0 mr-0">
	<div class="col-md-1 col-lg-1">
		<a href="#">
			<img class="img-responsive mt-sm"  src="{{ $item_thumbnail }}" >
		</a>
	</div>
	<div class="col-md-11 col-lg-11 p-b-sm">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<h4 class="text-md mt-sm">
					<a href="{{ route('balin.product.show', $item_slug) }}" class="title link-black hover-orange"><strong>{{ $item_name }}</strong></a>
				</h4>
				<p class="mb-0 text-regular">Size :</p>
			</div>
		</div>
		@foreach($item_size as $key => $value)
			<div class="row p-xs list_vid" 
				data-vid="{{ $value['varian_id'] }}" 
				data-cid="{{ $item_id }}">
				<div class="col-md-3 col-lg-3 qty-{{ strtolower($value['size']) }}" 
					data-get-flag="qty-{{ strtolower($value['size']) }}">
					<p class="m-b-none" style="line-height:20px">{{ $value['size'] }}</p>
				</div>
				<div class="col-md-2 col-lg-2 text-left pr-md qty-{{ strtolower($value['size']) }} label_price" 
					data-price="{{ $item_price }}" 
					data-get-price="qty-{{ strtolower($value['size']) }}" 
					data-get-flag="qty-{{ strtolower($value['size']) }}">
					@money_indo( $item_price )
				</div>
				<div class="col-md-1 col-lg-1">&nbsp;</div>
				<div class="col-md-1 col-lg-1 text-center qty-{{ strtolower($value['size']) }}" 
					data-get-flag="qty-{{ strtolower($value['size']) }}">
					<a href="javascript:void(0);" class="pull-left qty-minus not-active">
						<strong>-</strong>
					</a>
					<span class="qty"
						data-action="{{ route('balin.cart.update', ['slug' => $item_slug, 'varian_id' => $value['varian_id']]) }}"
						data-id="{{ $value['varian_id'] }}"  
						data-stock="{{ $value['current_stock'] }}"
						data-price="{{ $item_price }}"
						data-discount="{{ $item_discount }}">{{ $value['quantity'] }}</span>
					<a href="javascript:void(0);" class="pull-right qty-plus"> 
						<strong>+</strong>
					</a>
				</div>
				<div class="col-md-3 col-lg-3 text-right pr-md label-price qty-{{ strtolower($value['size']) }}" 
					data-price="{{ $item_price }}" 
					data-get-price="qty-{{ strtolower($value['size']) }}" 
					data-get-flag="qty-{{ strtolower($value['size']) }}">
					<span class="mr-lg">@money_indo( $item_discount )</span>
				</div>
				<div class="col-md-2 col-lg-2 text-right qty-{{ strtolower($value['size']) }}" 
					data-total="{{ ($item_price - $item_discount) * $value['quantity'] }}" 
					data-get-total="qty-{{ strtolower($value['size']) }}" 
					data-get-flag="qty-{{ strtolower($value['size']) }}" data-subtotal="{{ $item_total }}">
					<span class="total_per_pieces" 
						data-total-piece="{{ ($item_price - $item_discount) * $value['quantity'] }}">
						@money_indo( ($item_price - $item_discount) * $value['quantity'] )
					</span>
				</div>	
			</div>
		@endforeach
	</div>
</div>
<!-- END SECTION CART LIST ITEM DESKTOP -->