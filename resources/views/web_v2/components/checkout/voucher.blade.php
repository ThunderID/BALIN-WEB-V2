<div class="row ml-0 mr-0">
	<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 bg-white border-1 border-solid border-grey-light ">
		<div id="content_voucher">
			@if (!isset($data['order']['data']['voucher']))
				<div class="row pt-md pb-sm panel_form_voucher">
					<div class="col-md-12 mb-sm">
						<span class="text-lg voucher-title">Punya Kode Voucher ?</span>
					</div>	
					<div class="col-md-12 mb-xs">
						<span class="text-regular">Jika anda punya kode voucher, masukkan kode voucher anda dapatkan hadiahnya.</span>
						<div class="mt-xs" style="position:relative">
							<div class="text-center hide loading loading_voucher" style="z-index:99;">
								{!! HTML::image('images/loading.gif', null, []) !!}
							</div>
							{!! Form::text('voucher', null, [
								'class' 		=> 'form-control transaction-input-voucher-code text-regular voucher_desktop',
								'placeholder' 	=> 'Voucher code',
								'style'			=> 'width:100%',
								'data-action'	=> route('my.balin.checkout.voucher')
							]) !!}
						</div>
					</div>
				</div>
			@else
				<div class="row pt-md pb-sm">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p>
							@if ($data['order']['data']['voucher']['type'] == 'free_shipping_cost')
								Selamat! Anda mendapat potongan : gratis biaya pengiriman.
							@elseif ($data['order']['data']['voucher']['type'] == 'debit_point')
								Selamat! Anda mendapat bonus balin point sebesar {{ $data['order']['data']['voucher']['value'] }} (Balin Point akan ditambahkan jika pesanan sudah dibayar)
							@endif
						</p>
					</div>
				</div>
			@endif
		</div>
		<div class="row pt-md pb-md">
			<div class="col-xs-4 col-sm-4 col-md-6 col-lg-6">
				<a href="javascript:void(0);" class="btn btn-transaparent-border-black-hover-black btn_step" 
				data-target="#sc1"  
				data-value="#sc2"
				data-param="0"
				data-type="prev"
				data-url="{{ route('my.balin.checkout.get', ['section' => 'sc1']) }}">Kembali</a>
			</div>
			<div class="col-xs-8 col-sm-8 col-md-6 col-lg-6 text-right">
				<a href="javascript:void(0);" class="btn btn-black-hover-white-border-black btn_step" 
				data-action="{{ route('my.balin.checkout.voucher') }}" 
				data-target="#sc3"  
				data-value="#sc2"
				data-param="2"
				data-type="next"
				data-event="voucher"
				data-url="{{ route('my.balin.checkout.get', ['section' => 'sc3']) }}">Gunakan & Lanjutkan</a>
			</div>
		</div>
	</div>
</div>