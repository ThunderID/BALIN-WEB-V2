<?php 
	$status 	= ['abandoned' => 'Terabaikan', 'cart' => 'Keranjang', 'wait' => 'Checkout', 'veritrans_processing_payment' => 'Menunggu Pembayaran via Veritrans', 'paid' => 'Pembayaran Diterima', 'packed' => 'Menunggu Pengiriman', 'shipping' => 'Dalam Pengiriman', 'delivered' => 'Pesanan Complete', 'canceled' => 'Pesanan Dibatalkan'];
?>

@extends('web_v2.page_templates.layout')

@section('content')
	<div class="clearfix">&nbsp;</div>
	<div class="clearfix hidden-xs hidden-sm">&nbsp;</div>

	<section class="container">
		<!-- SECTION INFORMATION TRACKING ORDER -->
		<div class="row bg-grey ml-0 mr-0">
			<div class="col-sm-12">
				<h4 class="text-uppercase">Order History</h4>
			</div>
		</div>
		<div class="row ml-0 mr-0">
			<div class="col-sm-12 mt-5 mb-5">
				@forelse($data['me_orders']['data']['data'] as $k => $v)
					<div class="row mt-xs pb-xs {{ ($v != end($data['me_orders']['data']['data']) ? 'border-bottom-1 border-grey' : '') }}">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<span class="label 
								@if ($v['status']=='wait') label-default 
								@elseif ($v['status']=='paid') label-info
								@elseif ($v['status']=='shipping') label-primary
								@elseif ($v['status']=='delivered') label-success
								@else label-warning @endif ">
								{{ $status[$v['status']] }} 
							</span>
						</div>
						<div class="hidden-xs hidden-sm col-md-6 col-lg-6">
							@if($v['status'] == 'wait' || $v['status'] == 'veritrans_processing_payment')
								<ul class="list-inline mb-0 text-right">
								@if ($v['status'] == 'wait' && $veritrans_option)
									<li>
										<a href="{{ route('my.balin.payment.processing', $v['id']) }}" class="hover-orange text-grey-dark text-sm">[ Bayar Via Veritrans ]</a>
									</li>
								@endif
									<li>
										<a href="{{ route('my.balin.order.resend.invoice', $v['id']) }}" class="hover-orange text-grey-dark text-sm">[ Resend Invoice ]</a>
									</li>
									<li>
										<a class="text-sm text-right hover-orange text-grey-dark" href="{{route('my.balin.order.destroy', $v['id'])}}" >[ Batalkan ]</a>
									</li>
								</ul>
							@else
								<p class="mb-0">&nbsp;</p>
							@endif
						</div>
						<div class="hidden-sm hidden-md hidden-lg">
							@if($v['status'] == 'wait' || $v['status'] == 'veritrans_processing_payment')
								<div class="col-xs-12 mt-sm mb-xs">
									@if ($v['status'] == 'wait')
										<a href="{{ route('my.balin.payment.processing', $v['id']) }}" class="text-grey-dark hover-orange text-sm mt-sm mr-5">[ Bayar Via Veritrans ]</a>
									@endif
									<a href="{{ route('my.balin.order.resend.invoice', $v['id']) }}" class="text-grey-dark hover-orange text-sm mt-sm mr-5">[ Resend Invoice ]</a>
									<a class="text-grey-dark hover-orange text-sm mt-sm mr-5" href="{{route('my.balin.order.destroy', $v['id'])}}" >[ Batalkan ]</a>
								</div>
							@endif
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 {{ ($v['status'] != 'canceled') ? '' : '' }}">
							<p class="mt-5 mb-0 text-regular">
								Tanggal order : @datetime_indo_with_name_month($v['transact_at'])
							</p>	
							<p class="mt-0 mb-xxs">
								<strong>{{ $v['ref_number'] }}</strong>
							</p>
							<a class="text-grey-dark hover-orange text-sm mt-sm hidden-xs" href="#" 
								data-toggle="modal" 
								data-target=".modal-user-information" 
								data-action="{{ route('my.balin.order.show', $v['id']) }}" 
								data-modal-title="Detail Pesanan {{ $v['ref_number'] }}">
								[ Lihat Detail ]
							</a>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mt-5">
							@if (!empty($v['shipment']))
								<p class="mt-0 mb-0"> 
									Dikirim ke 
								</p>
								<p class="m-b-xxs">
									{{ $v['shipment']['address']['address'] }}, {{ $v['shipment']['address']['zipcode'] }}
								</p>
								<p class="m-b-xxs">
									a.n. {{ $v['shipment']['receiver_name'] }}
								</p>
							@endif

							@if ($v['status'] == 'wait' || $v['status'] == 'veritrans_processing_payment')
								<?php $due_date = Carbon::parse($v['transact_at'].' '.$balin['info']['expired_cart']['value'])->format('Y-m-d'); ?>
								<span class="text-regular">Info :</span>
								<p>
									<small class="mt-0">
										Pembayaran harus dilakukan sebelum 
										@datetime_indo_with_name_month($due_date)
									</small>
								</p>
							@endif
						</div>
						<div class="hidden-sm hidden-md hidden-lg text-right">
							<div class="row">
								<!-- @if($v['status'] == 'wait' || $v['status'] == 'veritrans_processing_payment')
									@if ($v['status'] == 'wait')
										<div class="col-xs-12 mt-5 mr-sm">
											<a href="{{ route('my.balin.payment.processing', $v['id']) }}" class="text-grey-dark hover-orange text-sm mt-sm mr-sm">[ Bayar Via Veritrans ]</a>
										</div>
									@endif
									<div class="col-xs-12 mt-5 mr-sm">
										<a href="{{ route('my.balin.order.resend.invoice', $v['id']) }}" class="text-grey-dark hover-orange text-sm mt-sm mr-sm">[ Resend Invoice ]</a>
									</div>
									<div class="col-xs-12 mt-5 mr-sm">
										<a class="text-grey-dark hover-orange text-sm mt-sm mr-sm" href="{{route('my.balin.order.destroy', $v['id'])}}" >[ Batalkan ]</a>
									</div>
								@endif -->
								<div class="col-xs-12 mt-5">
									<a class="text-grey-dark hover-orange text-sm mt-sm mr-sm" href="#" 
										data-toggle="modal" 
										data-target=".modal-user-information" 
										data-action="{{ route('my.balin.order.show', $v['id']) }}" 
										data-modal-title="Detail Pesanan {{ $v['ref_number'] }}">
										[ Lihat Detail ]
									</a>
								</div>
							</div>
						</div>
					</div>
				@empty
					<p class="text-center mt-xs">tidak ada order</p>
				@endforelse
			</div>
		</div>
		<!-- END SECTION INFORMATION TRACKING ORDER -->
		<section class="container mt-lg mb-lg"></section>

		<!-- SECTION MODAL USER INFORMATION -->
		<div class="modal modal-user-information modal-fullscreen fade" tabindex="0" role="dialog" aria-labelledby="mySmallModalLabel" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header bg-black text-white">
						<div class="row ml-xl mr-xl">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pr-md pl-md">
								<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">&times;</button>
								<h5 class="modal-title" id="exampleModalLabel">History Balance</h5>
							</div>
						</div>
					</div>
					<div class="modal-body m-md pt-5 mt-sm">
					</div>
				</div>
			</div>
		</div>
		<!-- END SECTION MODAL USER INFORMATION -->

		<!-- SECTION MODAL SUB USER INFORMATION -->
		<div class="modal modal-sub-user-information modal-fullscreen fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header bg-black text-white">
						<div class="row ml-xl mr-xl">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pr-md pl-md">
								<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">&times;</button>
								<h5 class="modal-title" id="exampleModalLabel">History Balance</h5>
							</div>
						</div>
					</div>
					<div class="modal-body m-md pt-5 mt-sm">
					</div>
				</div>
			</div>
		</div>
		<!-- END SECTION MODAL SUB USER INFORMATION -->

		<!-- SECTION MODAL USER INFORMATION MOBILE -->
		{{-- <div class="modal modal-user-information-mobile fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header bg-black text-white">
						<div class="container">
							<div class="row ml-md mr-md">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
									<h5 class="modal-title" id="exampleModalLabel">History Balance</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-body m-md pt-5 mt-sm">
						<div class="row ml-md mr-md">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		<!-- END SECTION MODAL USER INFORMATION MOBILE -->

		<!-- SECTION MODAL INFORMATION & FUNCTION BALIN POINT -->
		<div id="" class="modal point-user-information modal-fullscreen fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<div class="row ml-sm mr-sm">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
								<h5 class="modal-title text-uppercase" id="exampleModalLabel">Balin Point</h5>
							</div>
						</div>
					</div>
					<div class="modal-body mt-75 mobile-mt-10 ml-xl mr-xl" style="text-align:left">
						<p>Balin Point ini adalah voucher discount yang dapat anda gunakan untuk pembelian produk di Balin</p>
						<p>Untuk menambah jumlah Balin Point ini, ajak teman dan kerabat anda untuk melakukan registrasi di situs Balin.id dan berikan kode referal anda kepada mereka. Dengan menggunakan kode referal anda, teman anda akan mendapatkan Balin Point sebesar Rp. 50.000 dan anda akan mendapatkan Balin Point sebesar Rp. 10.000.</p>
						<p>Kode referal anda, pada mulanya hanya dapat anda berikan kepada 10 orang teman anda. Apabila teman yang menggunakan kode referal anda melakukan pembelian, anda akan mendapatkan tambahan kuota tersebut menjadi 11 dan anda akan mendapatkan Balin Point sebesar Rp. 10.000, dan demikian seterusnya tanpa ada batasnya.</p>
						<p>Semakin banyak teman yang menggunakan referal anda dan semakin sering teman yang anda referensikan melakukan pembelian, semakin besar voucher yang anda dapatkan.</p>

						<p>Balin Point tidak dapat diuangkan.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- END SECTION MODAL INFORMATION & FUNCTION BALIN POINT -->

		<!-- SECTION MODAL INFORMATION & FUNCTION REFERRAL CODE -->
		<div id="" class="modal referral-user-information modal-fullscreen fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<div class="row ml-sm mr-sm">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
								<h5 class="modal-title text-uppercase" id="exampleModalLabel">Referal Code</h5>
							</div>
						</div>
					</div>
					<div class="modal-body mt-75 mobile-mt-10 text-left ml-xl mr-xl">
						<p>Kode referal adalah kode akun anda di Balin.id. Anda dapat mengajak teman atau kerabat anda untuk mendaftar ke situs Balin.id dan berikan kode referal anda. Dengan menggunakan kode referal anda, teman anda akan mendapatkan Balin Point sebesar Rp. 50.000 dan anda akan mendapatkan Balin Point sebesar Rp. 10.000</p>
						<p>Kode referal anda, pada mulanya hanya dapat anda berikan kepada 10 orang teman anda. Apabila teman yang menggunakan kode referal anda melakukan pembelian, anda akan mendapatkan tambahan kuota tersebut menjadi 11 dan anda akan mendapatkan Balin Point sebesar Rp. 10.000, dan demikian seterusnya tanpa ada batasnya.</p>
						<p>Semakin banyak teman yang menggunakan referal anda dan semakin sering teman yang anda referensikan melakukan pembelian, semakin besar voucher yang anda dapatkan.</p>

						<p>Balin Point tidak dapat diuangkan.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- END SECTION MODAL INFORMATION & FUNCTION REFERAAL CODE -->
	</section>
@stop

@section('balin-login-myorder')
	text-orange
@stop

@section('js')
	@if (Input::has('order_id'))
		var event = new Event('build');
		actions_checkdoout 	= "{{ route('my.balin.checkout.checkdoout', Input::get('order_id')) }}";

		// Listen for the event.
		document.addEventListener('build', function (e) 
		{
			action = actions_checkdoout;
			title = "Checkout View";
			view_mode = '';
			parsing = '';

			$('.modal-user-information').find('.modal-body').html('loading...');
			$('.modal-user-information').find('.modal-title').html(title);
			$('.modal-user-information').find('.modal-dialog').addClass(view_mode);
			$('.modal-user-information').find('.modal-body').load(action, function() {});

			$('.modal-user-information').modal('show');
		}, false);

		// Dispatch the event.
		document.dispatchEvent(event);

		$('.modal-user-information').on('hidden.bs.modal', function () {
			window.history.pushState('obj', 'newtitle', '/me');
			return false;
		});
	@endif

	$('.modal-user-information').on('show.bs.modal', function(e) {
		action 		= $(e.relatedTarget).attr('data-action');
		title 		= $(e.relatedTarget).attr('data-modal-title');
		view_mode 	= $(e.relatedTarget).attr('data-view');
		parsing 	= $(e.relatedTarget).attr('data-action-parsing');
		from 		= $(e.relatedTarget).attr('data-from');

		$(this).find('.modal-body').html('<p class="ml-md mr-md pl-xs pr-xs">loading...</p>');
		$(this).find('.modal-title').html(title);
		$(this).find('.modal-dialog').addClass(view_mode);
		$(this).find('.modal-body').load(action, function() {
			if (parsing !== null && parsing !== undefined) {
				change_action($(this), parsing);
			}
			if (from !== null && from !== undefined) {
				$('.from_route').val(from);
			}
		});
	});	

	$('.modal-sub-user-information').on('show.bs.modal', function(e) {
		action 		= $(e.relatedTarget).attr('data-action');
		title 		= $(e.relatedTarget).attr('data-modal-title');
		view_mode 	= $(e.relatedTarget).attr('data-view');
		parsing 	= $(e.relatedTarget).attr('data-action-parsing');

		$(this).find('.modal-body').html('<p class="ml-md mr-md pl-xs pr-xs">loading...</p>');
		$(this).find('.modal-title').html(title);
		$(this).find('.modal-dialog').addClass(view_mode);
		$(this).find('.modal-body').load(action, function() {
			if (parsing !== null && parsing !== undefined) {
				change_action($(this), parsing);
			}
		});
	});	
@stop