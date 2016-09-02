<div class="row ml-0 mr-0">
	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 bg-white border-1 border-solid border-grey-light no-border-xs">
		<form id="content_address">
			<div class="row pt-md pb-sm">
				<div class="hidden-lg hidden-md hidden-sm col-xs-6">
					<span class="m-t-none m-b-md">Kirim Kepada</span>
				</div>	
				<div class="hidden-lg hidden-md hidden-sm col-xs-6 text-right">
					<div class="row">
						<div class="col-xs-12">
							<span style="font-size:12px;">
								Shipment By :
							</span>
							@foreach($data['courier'] as $key => $value)
								{!!Html::image($value['thumbnail'], $value['name'], ['style' => 'max-width:50px;'])!!}
							@endforeach
						</div>
					</div>
				</div>	
				<div class="col-md-6 col-sm-5 hidden-xs">
					<h3 class="mt-0 text-normal">Kirim Kepada</h3>
				</div>
				<div class="col-md-6 col-sm-7 hidden-xs text-right">
					<div class="row">
						<div class="col-md-12 mb-xs" style="font-size:12px;">
							Shipment By :
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							@foreach($data['courier'] as $key => $value)
								{!!Html::image($value['thumbnail'], $value['name'], ['style' => 'max-width:80px;'])!!}
							@endforeach
						</div>
					</div>
				</div>	
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label class="text-regular" for="name">Pilih Alamat</label>
						<select class="form-control text-regular choice_address" name="address_id" id="address_id">
							<option value="0" {{ isset($data['order']['data']['shipment']['address_id']) ? '' : 'selected' }}>Tambah Alamat Baru</option>
							@foreach($data['my_address'] as $key => $value)
								<option value="{{$value['id']}}" 
									data-action="{{ route('my.balin.checkout.shippingcost') }}" {{ ($value['id'] == $data['order']['data']['shipment']['address_id']) ? 'selected' : '' }} 
									data-receivername="{{ Session::get('whoami')['name'] }}"
									data-phone="{{ $value['phone'] }}"
									data-address="{{ $value['address'] }}"
									data-zipcode="{{ $value['zipcode'] }}">{{$value['address']}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label class="text-regular required" for="">Nama Penerima</label>
						{!! Form::input('text', 'receiver_name', 
							isset($data['order']['data']['shipment']['receiver_name']) ? $data['order']['data']['shipment']['receiver_name'] : Session::get('whoami')['name'], [
								'class' 	=> 'form-control text-regular ch_name page_required',
								'title'		=> 'Nama Penerima Harus diisi'
						]) !!}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="form-group">
						<label class="text-regular required" for="">No. Telp</label>
						{!! Form::input('number', 'phone', 
								isset($data['order']['data']['shipment']['address']['phone']) ? $data['order']['data']['shipment']['address']['phone'] : null, [
								'class' 		=> 'form-control text-regular ch_phone page_required',
								'title'			=> 'No Telp Harus diisi',
								'required'		=> true
						]) !!}
					</div>
				</div>
			</div>
			<div class="row new-address">
				<div class="col-md-12">
					<div class="form-group">
						<label class="text-regular required" for="">Alamat</label>
						{!! Form::textarea('address', isset($data['order']['data']['shipment']['address']['address']) ? $data['order']['data']['shipment']['address']['address'] : null, [
								'class'			=> 'form-control text-regular ch_address page_required',
								'rows'			=> '3',
								'style'     	=> 'resize:none;',
								'title'			=> 'Alamat Penerima Harus diisi',
								'required'		=> true
						]) !!}
					</div>
					<div class="form-group">
						<label class="text-regular required" for="">Kode Pos</label>
						{!! Form::input('number', 'zipcode', isset($data['order']['data']['shipment']['address']['zipcode']) ? $data['order']['data']['shipment']['address']['zipcode'] : null, [
								'class' 		=> 'form-control text-regular ch_zipcode page_required',
								'title'			=> 'Kode Pos Penerima Harus diisi',
								'id'			=> 'zipcode',
								'data-action'	=> route('my.balin.checkout.shippingcost'),
								'min'			=> '0'
						]) !!}
					</div>
				</div>
			</div> 
		</form>
		<div class="row pt-md pb-md">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
				<a href="javascript:void(0);" class="btn btn-orange btn_step" 
				data-action="{{ route('my.balin.checkout.shippingcost') }}"
				data-target="#sc2"  
				data-value="#sc1"
				data-param="1"
				data-type="next"
				data-event="address"
				data-url="{{ route('my.balin.checkout.get', ['section' => 'sc2']) }}">Lanjutkan
				&nbsp;
				<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>
</div>