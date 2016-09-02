<div class="row ml-0 mr-0">
	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 bg-white border-1 border-solid border-grey-light no-border-xs">
		<form id="choice_payment">
			<div class="row pt-md pb-sm">
				<div class="hidden-lg hidden-md hidden-sm col-xs-12">
					<span class="m-t-none m-b-md">Pilih Pembayaran</span>
				</div>	
				<div class="col-md-12 hidden-xs">
					<h3 class="mt-0 text-normal">Pilih Pembayaran</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 mt-xs">
					<label class="control control--radio line-height-30">
						Bayar menggunakan veritrans
						<input type="radio" value="veritrans" name="choice_payment" required tabindex="8" />
						<div class="control__indicator"></div>
					</label>
				</div>
				<div class="col-md-6 text-right">
					{!!Html::image('http://drive.thunder.id/file/public/4/10/2016/08/12/16/payment_veritrans.png', 'veritrans', ['style' => 'max-width:80px;'])!!}
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 mt-xs">
					<label class="control control--radio line-height-30"> 
						Transfer bank ke rekening kami
						<input type="radio" value="transfer" name="choice_payment" required tabindex="8" />
						<div class="control__indicator"></div>
					</label>
				</div>
				<div class="col-md-6 text-right">
					{!!Html::image('http://drive.thunder.id/file/public/4/10/2016/08/12/16/payment_transfer.png', 'veritrans', ['style' => 'max-width:80px;'])!!}
				</div>
			</div>
		</form>
		<div class="row pt-md pb-md">
			<div class="col-xs-4 col-sm-4 col-md-6 col-lg-6">
				<a href="javascript:void(0);" class="btn btn-transaparent-border-black-hover-black btn_step" 
				data-target="#sc3"  
				data-value="#sc4"
				data-param="0"
				data-type="prev"
				data-url="{{ route('my.balin.checkout.get', ['section' => 'sc3']) }}">
				<i class="fa fa-angle-double-left" aria-hidden="true"></i>
				&nbsp;
				Kembali</a>
			</div>
			<div class="col-xs-8 col-sm-8 col-md-6 col-lg-6 text-right">
				<a href="javascript:void(0);" class="btn btn-orange btn_step btn_next btn_payment" 
				data-action="{{ route('my.balin.checkout.choicepayment') }}"
				data-target="#sc5"  
				data-value="#sc4"
				data-param="4"
				data-type="next"
				data-event="choice_payment"
				data-url="{{ route('my.balin.checkout.get', ['section' => 'sc5']) }}">Lanjutkan
				&nbsp;
				<i class="fa fa-angle-double-right" aria-hidden="true"></i>
				</a>
			</div>
		</div>
	</div>
</div>