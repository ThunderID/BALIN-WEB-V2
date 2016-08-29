<div class="row mt-xs mb-xs">
	<div class="col-md-6 text-left">
		<span>Filter</span>
	</div>
	<div class="col-md-6 text-right">
		<a href="#" class="hover-orange clearall-filter">clear all</a>
	</div>
</div>
<!-- <hr class="border-grey-dark mtm-5"> -->
<div class="row mt-sm mb-sm">
	<div class="col-md-12">
		<h4 class="mb-5">Fitting</h4>
		<ul class="list-unstyled">
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('fitting', 'slimfit', null, ['id' => 'slimfit', 'class' => 'checkbox-filter', 'data-name' => 'filter']) !!} 
					<label for="slimfit">Slimfit</label>
				</div>
			</li>
		</ul>
	</div>
</div>
<div class="row mt-sm mb-sm">
	<div class="col-md-12">
		<h4 class="mb-5">Lengan</h4>
		<ul class="list-unstyled">
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('tag[]', 'panjang', null, ['id' => 'panjang', 'class' => 'checkbox-filter', 'data-name' => 'filter']) !!}
					<label for="panjang">Panjang</label>
				</div>
			</li>
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('tag[]', 'pendek', null, ['id' => 'pendek', 'class' => 'checkbox-filter', 'data-name' => 'filter']) !!}
					<label for="pendek">Pendek</label>
				</div>
			</li>
		</ul>
	</div>
</div>
<div class="row mt-sm mb-sm">
	<div class="col-md-12">
		<h4 class="mb-5">Ukuran</h4>
		<ul class="list-unstyled">
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('varians[]', '15', null, ['id' => '15', 'class' => 'checkbox-filter', 'data-name' => 'filter']) !!}
					<label for="15">15</label>
				</div>
			</li>
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('varians[]', '15.5', null, ['id' => '15.5', 'class' => 'checkbox-filter', 'data-name' => 'filter']) !!}
					<label for="15.5">15.5</label>
				</div>

			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('varians[]', '16', null, ['id' => '16', 'class' => 'checkbox-filter', 'data-name' => 'filter']) !!}
					<label for="16">16</label>
				</div>
			</li>
		</ul>
	</div>
</div>
<div class="row mt-sm mb-sm">
	<div class="col-md-12">
		<h4 class="mb-5">Motif</h4>
		<ul class="list-unstyled">
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('tag[]', 'parang', null, ['id' => 'parang', 'class' => 'checkbox-filter', 'data-name' => 'filter']) !!}
					<label for="parang">Parang</label>
				</div>
			</li>
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('tag[]', 'sekar_jagad', null, ['id' => 'sekar-jagad', 'class' => 'checkbox-filter', 'data-name' => 'filter']) !!}
					<label for="sekar-jagad">Sekar Jagad</label>
				</div>
			</li>
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('tag[]', 'Keraton', null, ['id' => 'keraton', 'class' => 'checkbox-filter', 'data-name' => 'filter']) !!}
					<label for="keraton">Keraton</label>
				</div>
			</li>
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('tag[]', 'sidomukti', null, ['id' => 'sidomukti', 'class' => 'checkbox-filter', 'data-name' => 'filter']) !!}
					<label for="sidomukti">Sidomukti</label>
				</div>
			</li>
		</ul>
	</div>
</div>
<div class="row mt-sm mb-sm">
	<div class="col-md-12">
		<h4 class="mb-5">Warna</h4>
		<ul class="list-inline checkbox-color">
			<li>
				{!! Form::checkbox('tag[]', 'red', null, ['class' => 'checkbox-color hide', 'data-name' => 'filter']) !!}
				<span class="color-item" style="background-color: red" data-color="red">&nbsp;</span>
			</li>
			<li>
				{!! Form::checkbox('tag[]', 'blue', null, ['class' => 'checkbox-color hide', 'data-name' => 'filter']) !!}
				<span class="color-item" style="background-color: blue" data-color="blue">&nbsp;</span>
			</li>
			<li>
				{!! Form::checkbox('tag[]', 'brown', null, ['class' => 'checkbox-color hide', 'data-name' => 'filter']) !!}
				<span class="color-item" style="background-color: brown" data-color="brown">&nbsp;</span>
			</li>
			<li>
				{!! Form::checkbox('tag[]', 'black', null, ['class' => 'checkbox-color hide', 'data-name' => 'filter']) !!}
				<span class="color-item" style="background-color: black" data-color="black">&nbsp;</span>
			</li>
		</ul>
	</div>
</div>