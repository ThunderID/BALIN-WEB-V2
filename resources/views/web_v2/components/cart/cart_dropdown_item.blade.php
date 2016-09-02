<!-- SECTION CART DROPDOWN ITEM -->
<div class="row pt-xs">
	<div class="col-xs-12">
		<div class="row">
			<!-- SECTION THUMBNAIL CART DROPDOWN -->
			<div class="col-xs-3">
				<a href="{{ route('balin.product.show', $label_id) }}">
					<img class="img-responsive ml-sm" style="z-index:-1;"  src="{{ $label_image }}" >
				</a>
			</div>
			<!-- END SECTION THUMBNAIL CART DROPDOWN -->
			<div class="col-xs-8">
				<!-- SECTION LABEL NAME -->
				<div class="row">
					<div class="col-xs-12">
						<h5 class="mt-0">
							<a href="{{ route('balin.product.show', $label_id) }}" class="link-black hover-orange unstyle">
								{{ $label_name }}
							</a>
						</h5>	
					</div>
				</div>
				<!-- END SECTION LABEL NAME -->
				<!-- SECTION SIZE VARIANS -->
				<div class="row text-regular">
					<div class="col-xs-12">
						<span class="info"><strong>Size</strong></span>
					</div>
					<div class="col-xs-12">
						@foreach($label_qty as $key => $value)
							<div class="row">
								<div class="col-xs-2">
									<span class="info">
										@if (strpos($value['size'], '.')==true)
											<?php $frac = explode('.', $value['size']); ?>
											{{ $frac[0].'&frac12;'}}
										@else
											{{ $value['size'] }}
										@endif
									</span>
								</div>
								<div class="col-xs-1">
									<span class="info">:</span>
								</div>
								<div class="col-xs-8 text-right">
									<span class="info">{{ $value['quantity'] }}</span>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				<!-- END SECTION SIZE VARIANS -->
				<!-- SECTION PRICE PER PRODUCT -->
				<div class="row text-regular">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-2">
								<span class="info">@</span>
							</div>
							<div class="col-xs-1">
								<span class="info">:</span>
							</div>
							<div class="col-xs-8 text-right">
								<span class="info">@money_indo($label_price)</span>
							</div>
						</div>
					</div>
				</div>
				<!-- END SECTION PRICE PER PRODUCT -->
				<!-- SECTION DISCOUNT PER PRODUCT -->
				<div class="row text-regular">
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-2">
								<span class="info">Disc</span>
							</div>
							<div class="col-xs-1">
								<span class="info">:</span>
							</div>
							<div class="col-xs-8 text-right">
								<span class="info">@money_indo($label_discount)</span>
							</div>
						</div>
					</d
				<!-- END SECTION DISCOUT -->
				<!-- SECTION TOTAL PRICE PRODUCT -->
				<div class="row text-regular">
					<div class="col-xs-12"> 
						<div class="row">
							<div class="col-xs-2">
								<span class="info">Total</span>
							</div>
							<div class="col-xs-1">
								<span class="info">:</span>
							</div>
							<div class="col-xs-8 text-right">
								<span class="info">@money_indo($label_total)</span>
							</div>
						</div>                                             
					</div>
				</div>
				<!-- END SECTION TOTAL PRICE PRODUCT -->
			</div> 
		</div>
	</div>                                                                                                                       
</div>
<!-- END SECTION CART DROPDOWN -->