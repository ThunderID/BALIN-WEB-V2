<div class="row mt-xs mb-xs">
	<div class="col-md-6 text-left">
		<span>Filter</span>
	</div>
	<div class="col-md-6 text-right">
		<a href="#" class="hover-orange">clear all</a>
	</div>
</div>
<div class="row mt-sm mb-sm">
	<div class="col-md-12">
		<h4 class="mb-5">Fitting</h4>
		<ul class="list-unstyled">
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('fitting', 'slimfit', null, ['id' => 'slimfit']) !!} 
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
					{!! Form::checkbox('lengan', 'panjang', null, ['id' => 'lengan']) !!}
					<label for="slimfit">Panjang</label>
				</div>
			</li>
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('lengan', 'pendek', null, ['id' => 'pendek']) !!}
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
					{!! Form::checkbox('size', '15', null, ['id' => '15']) !!}
					<label for="15">15</label>
				</div>
			</li>
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('size', '15.5', null, ['id' => '15.5']) !!}
					<label for="15.5">15.5</label>
				</div>

			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('size', '16', null, ['id' => '16']) !!}
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
					{!! Form::checkbox('motif', 'parang', null, ['id' => 'parang']) !!}
					<label for="parang">Parang</label>
				</div>
			</li>
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('motif', 'sekar_jagad', null, ['id' => 'sekar-jagad']) !!}
					<label for="sekar-jagad">Sekar Jagad</label>
				</div>
			</li>
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('motif', 'Keraton', null, ['id' => 'keraton']) !!}
					<label for="keraton">Keraton</label>
				</div>
			</li>
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('motif', 'sidomukti', null, ['id' => 'sidomukti']) !!}
					<label for="sidomukti">Sidomukti</label>
				</div>
			</li>
		</ul>
	</div>
</div>
<div class="row mt-sm mb-sm">
	<div class="col-md-12">
		<h4 class="mb-5">Warna</h4>
		<ul class="list-inline">
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('color', 'blue', null, ['id' => 'blue']) !!}
					<label class="color" for="blue" data-color="blue">&nbsp;</label>
				</div>
			</li>
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('color', 'red', null, ['id' => 'red']) !!}
					<label class="color" for="red" data-color="red">&nbsp;</label>
				</div>
			</li>
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('color', 'black', null, ['id' => 'black']) !!}
					<label class="color" for="black" data-color="black">&nbsp;</label>
				</div>
			</li>
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('color', 'brown', null, ['id' => 'brown']) !!}
					<label class="color" for="brown" data-color="brown">&nbsp;</label>
				</div>
			</li>
		</ul>
	</div>
</div>