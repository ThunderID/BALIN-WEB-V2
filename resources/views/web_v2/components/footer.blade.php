<footer class="container-fluid bg-grey text-black">
	{{-- -------------------------------- DESKTOP -------------------------------- --}}
	<div class="row hidden-xs hidden-sm">
		<div class="col-md-12">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<h4>Tentang BALIN</h4>
						<ul class="list-unstyled">
							<li><a href="{{route('balin.info.index', ['type' => 'about-us'])}}" class="hover-orange">About Us</a></li>
							<li><a href="{{route('balin.info.index', ['type' => 'terms-conditions'])}}" class="hover-orange">Terms &#38; Conditions</a></li>
							@if (Session::has('whoami'))
								<li><a href="{{route('my.balin.redeem.index')}}" class="hover-orange">BALIN Point</a></li>
							@else
								<li><a href="{{route('balin.info.index', ['type' => 'why-join'])}}" class="hover-orange">BALIN Point</a></li>
							@endif
						</ul>
					</div>
					<div class="col-md-3">
						<h4>Keep in touch</h4>
						<ul class="list-unstyled fa-ul ml-0">
							<li><a href="{{route('balin.contact.us')}}" class="hover-orange">Kontak BALIN</a></li>
							<li><a href="{{$balin['info']['facebook_url']['value']}}" class="social-url-footer">Facebook</a></li>
							<li><a href="{{$balin['info']['instagram_url']['value']}}" class="social-url-footer">Instagram</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<h4>Cara Pembayaran</h4>
						<ul class="list-unstyled">
							<li>Credit Card</li>
							<li>ATM Transfer</li>
							<li>CIMB Clicks</li>
							<li>E-pay BRI</li>
							<li>BCA Klikpay</li>
							<li>Telkomsel Cash</li>
							<li>XL Tunai</li>
							<li>BBM Money</li>
							<li>Indosat Dompetku</li>
							<li>Mandiri e-cash</li>
							<li>Mandiri bill payment</li>
							<li>Indomaret</li>
						</ul>
					</div>
					<div class="col-md-3">
						<h4>Jasa Pengiriman</h4>
						<ul class="list-unstyled">
							<li>JNE</li>
						</ul>
					</div>
				</div>
				<hr class="border-grey-dark">
				<div class="row">
					<div class="col-md-12 text-center">
						<span>&copy; 2015-2016 CV. Balin Indonesia</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- -------------------------------- MOBILE -------------------------------- --}}
	<div class="row hidden-md hidden-lg footer-mobile">
		<div class="col-xs-12 text-center">
		  	<span class="pt-sm pb-sm">&copy; 2015-2016 CV. Balin Indonesia</span>
		</div>
	</div>
</footer>