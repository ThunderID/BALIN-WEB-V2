<div class="panel panel-default mt-0 border-grey">
	<div class="panel-heading" role="tab" id="headingTwo">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
			<h4 class="panel-title">
				Filter &nbsp;
				<span class="filter-info">
					@foreach (Input::all() as $k => $v)
						@if (in_array($k, ['lengan', 'warna', 'ftting', 'motif', 'size']))
							@foreach ($v as $k2 => $v2)
								<label class="btn btn-transparent btn-xs filter-info-action mb-5"> {{ $k }} : {{ $v2 }} <i class="fa fa-times-circle"></i></label>
							@endforeach
						@endif
					@endforeach
				</span>
				<span class="pull-right">
					<i class="fa fa-angle-right " aria-hidden="true"></i>
				</span>
			</h4>
		</a>
	</div>
	<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<div class="row">
						<div class="col-xs-6 col-sm-6">
							<h4 class="mb-5">Fitting</h4>
							<ul class="list-unstyled">
								<li>
									<div class="checkbox-custom">
										{!! Form::checkbox('fitting', 'slimfit', (Input::has('fitting') && in_array("fitting-slim-fit", Input::get('fitting'))) ? true : null, ['id' => 'slimfit', 'class' => 'checkbox-filter', 'data-type' => 'fitting', 'data-filter' => 'fitting-slim-fit', 'onClick' => 'ajaxFilter(this);']) !!} 
										<label for="slimfit">Slimfit</label>
									</div>
								</li>
							</ul>
							<h4 class="mb-5">Lengan</h4>
							<ul class="list-unstyled">
								<li>
									<div class="checkbox-custom">
										{!! Form::checkbox('lengan[]', 'panjang', (Input::has('lengan') && in_array("lengan-panjang", Input::get('lengan'))) ? true : null, ['id' => 'panjang', 'class' => 'checkbox-filter', 'data-type' => 'lengan', 'data-filter' => 'lengan-panjang', 'onClick' => 'ajaxFilter(this);']) !!}
										<label for="panjang">Panjang</label>
									</div>
								</li>
								<li>
									<div class="checkbox-custom">
										{!! Form::checkbox('lengan[]', 'pendek', (Input::has('lengan') && in_array("lengan-pendek", Input::get('lengan'))) ? true : null, ['id' => 'pendek', 'class' => 'checkbox-filter', 'data-type' => 'lengan', 'data-filter' => 'lengan-pendek', 'onClick' => 'ajaxFilter(this);']) !!}
										<label for="pendek">Pendek</label>
									</div>
								</li>
							</ul>
							<h4 class="mb-5">Ukuran</h4>
							<ul class="list-unstyled">
								<li>
									<div class="checkbox-custom">
										{!! Form::checkbox('varians[]', '15', (Input::has('size') && in_array("15", Input::get('size'))) ? true : null, ['id' => '15', 'class' => 'checkbox-filter', 'data-type' => 'size', 'data-filter' => '15', 'onClick' => 'ajaxFilter(this);']) !!}
										<label for="15">15</label>
									</div>
								</li>
								<li>
									<div class="checkbox-custom">
										{!! Form::checkbox('varians[]', '15.5', (Input::has('size') && in_array("15.5", Input::get('size'))) ? true : null, ['id' => '15.5', 'class' => 'checkbox-filter', 'data-type' => 'size', 'data-filter' => '15.5', 'onClick' => 'ajaxFilter(this);']) !!}
										<label for="15.5">15.5</label>
									</div>

								<li>
									<div class="checkbox-custom">
										{!! Form::checkbox('varians[]', '16', (Input::has('size') && in_array("16", Input::get('size'))) ? true : null, ['id' => '16', 'class' => 'checkbox-filter', 'data-type' => 'size', 'data-filter' => '16', 'onClick' => 'ajaxFilter(this);']) !!}
										<label for="16">16</label>
									</div>
								</li>
							</ul>
						</div>
						<div class="col-xs-6 col-sm-6">
							<h4 class="mb-5">Motif</h4>
							<ul class="list-unstyled">
								<li>
									<div class="checkbox-custom">
										{!! Form::checkbox('motif[]', 'parang', (Input::has('motif') && in_array("parang", Input::get('motif'))) ? true : null, ['id' => 'parang', 'class' => 'checkbox-filter', 'data-type' => 'motif', 'data-filter' => 'parang', 'onClick' => 'ajaxFilter(this);']) !!}
										<label for="parang">Parang</label>
									</div>
								</li>
								<li>
									<div class="checkbox-custom">
										{!! Form::checkbox('motif[]', 'sekar_jagad', (Input::has('motif') && in_array("sekar-jagad", Input::get('motif'))) ? true : null, ['id' => 'sekar-jagad', 'class' => 'checkbox-filter', 'data-type' => 'motif', 'data-filter' => 'sekar-jagad', 'onClick' => 'ajaxFilter(this);']) !!}
										<label for="sekar-jagad">Sekar Jagad</label>
									</div>
								</li>
								<li>
									<div class="checkbox-custom">
										{!! Form::checkbox('motif[]', 'Keraton', (Input::has('motif') && in_array("keraton", Input::get('motif'))) ? true : null, ['id' => 'keraton', 'class' => 'checkbox-filter', 'data-type' => 'motif', 'data-filter' => 'keraton', 'onClick' => 'ajaxFilter(this);']) !!}
										<label for="keraton">Keraton</label>
									</div>
								</li>
								<li>
									<div class="checkbox-custom">
										{!! Form::checkbox('motif[]', 'sidomukti', (Input::has('motif') && in_array("sidomukti", Input::get('motif'))) ? true : null, ['id' => 'sidomukti', 'class' => 'checkbox-filter', 'data-type' => 'motif', 'data-filter' => 'sidomukti', 'onClick' => 'ajaxFilter(this);']) !!}
										<label for="sidomukti">Sidomukti</label>
									</div>
								</li>
							</ul>
							<h4 class="mb-5">Warna</h4>
							<ul class="list-inline checkbox-color">
								<li class="{{ (Input::has('warna') && in_array("red", Input::get('warna'))) ? 'active' : null }}">
									{!! Form::checkbox('tag[]', 'red', (Input::has('warna') && in_array("red", Input::get('warna'))) ? true : null, ['class' => 'checkbox-color hide', 'data-type' => 'warna', 'data-filter' => 'red']) !!}
									<span class="color-item" style="background-color: red" data-color="red">&nbsp;</span>
								</li>
								<li class="{{ (Input::has('warna') && in_array("blue", Input::get('warna'))) ? 'active' : null }}">
									{!! Form::checkbox('tag[]', 'blue', (Input::has('warna') && in_array("blue", Input::get('warna'))) ? true : null, ['class' => 'checkbox-color hide', 'data-type' => 'warna', 'data-filter' => 'blue']) !!}
									<span class="color-item" style="background-color: blue" data-color="blue">&nbsp;</span>
								</li>
								<li class="{{ (Input::has('warna') && in_array("brown", Input::get('warna'))) ? 'active' : null }}">
									{!! Form::checkbox('tag[]', 'brown', (Input::has('warna') && in_array("brown", Input::get('warna'))) ? true : null, ['class' => 'checkbox-color hide', 'data-type' => 'warna', 'data-filter' => 'brown']) !!}
									<span class="color-item" style="background-color: brown" data-color="brown">&nbsp;</span>
								</li>
								<li class="{{ (Input::has('warna') && in_array("black", Input::get('warna'))) ? 'active' : null }}">
									{!! Form::checkbox('tag[]', 'black', (Input::has('warna') && in_array("black", Input::get('warna'))) ? true : null, ['class' => 'checkbox-color hide', 'data-type' => 'warna', 'data-filter' => 'black']) !!}
									<span class="color-item" style="background-color: black" data-color="black">&nbsp;</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>