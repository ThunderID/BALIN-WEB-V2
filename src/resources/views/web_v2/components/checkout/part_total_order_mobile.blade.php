<!-- SECTION INFO TOTAL PRODUCT & TOAL PEMBAYARAN FOR MOBILE & TABLET -->
@if ($data['carts'])
	<?php $total = 0; ?>
	@foreach ($data['carts'] as $k => $item)
		<?php
			$qty 			= 0;
			foreach ($item['varians'] as $key => $value) 
			{
				$qty 		= $qty + $value['quantity'];
			}
			$total += (($item['price']-$item['discount'])*$qty);
		?>
	@endforeach
	<div class="row border-1 border-solid border-grey-light ml-0 mr-0 mt-sm hidden-md hidden-lg">
		<div class="col-lg-12 col-md-12 checkout-bottom panel-subtotal" id="panel-subtotal-normal">
			<div class="row mt-sm">
				<div class="col-xs-7 col-sm-5 col-sm-offset-2 col-md-5 col-md-offset-2 col-lg-5 col-lg-offset-2 text-left text-left border-bottom">
					<span class="text-regular">Subtotal</span>
				</div>
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right border-bottom">
					<span class="text-regular text-right" id="total">@money_indo($total)</span>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-7 col-sm-5 col-sm-offset-2 col-md-5 col-md-offset-2 col-lg-5 col-lg-offset-2 text-left">
					<span class="text-regular">Point Anda</span>
				</div>
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right">
					<span class="text-regular text-right" id="point">@money_indo($data['order']['customer']['total_point'])</span>
				</div>	
			</div>
			<div class="row">
				<div class="col-xs-7 col-sm-5 col-sm-offset-2 col-md-5 col-md-offset-2 col-lg-5 col-lg-offset-2 text-left">
					<span class="text-regular">Biaya Pengiriman</span>
				</div>
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right">
					<span class="text-regular text-right shipping_cost" data-s="0" data-v="0">@money_indo($data['order']['shipping_cost'])</span>
				</div>	
			</div>
			<div class="row">
				<div class="col-xs-7 col-sm-5 col-sm-offset-2 col-md-5 col-md-offset-2 col-lg-5 col-lg-offset-2 text-left">
					<span class="text-regular">Potongan Voucher</span>
				</div>
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right">
					<span class="text-regular text-right potongan_voucher">@money_indo($data['order']['voucher_discount'])</span>
				</div>	
			</div>
			<div class="row">
				<div class="col-xs-7 col-sm-5 col-sm-offset-2 col-md-5 col-md-offset-2 col-lg-5 col-lg-offset-2 text-left border-bottom">
					<span class="text-regular">
						Pengenal Pembayaran <a href="#" class="link-grey hover-black" data-toggle="modal" data-target=".modal-unique-number"><i class="fa fa-question-circle"></i></a>
					</span>
				</div>
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-right border-bottom">
					<span class="text-regular text-right text-red unique_number" data-unique="{{ $data['order']['unique_number'] }}">@money_indo_negative($data['order']['unique_number'])</span>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-7 col-sm-5 col-sm-offset-2 col-md-5 col-md-offset-2 col-lg-5 col-lg-offset-2 text-left">
					<h4 class="text-md">Total Pembayaran</h4>
				</div>
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<h4 class="text-md text-right text-bold mb-sm sub_total">
						<?php 
							$total_pembayaran = $total - $data['order']['customer']['total_point'] - $data['order']['unique_number'] + $data['order']['shipping_cost'];
						?>
						@if ($total_pembayaran && $total_pembayaran < 0)
							@money_indo(0)
						@else
							@money_indo($total_pembayaran)
						@endif
					</h4>
				</div>	
			</div>
		</div>
	</div>
@endif