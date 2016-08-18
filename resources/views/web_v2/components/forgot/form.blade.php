{!! Form::open(['url' => route('balin.forgot.password'), 'class' => 'form']) !!}
	<div class="form-group">
		<label for="" style="font-weight:400">Email</label>
		{!! Form::email('email', null, ['class' => 'form-control hollow', 'placeholder' => 'Masukkan Email', 'required']) !!}
	</div>
	<div class="form-group text-right">
		<a href="#" class="hover-grey btn-cancel">Cancel</a>&nbsp;&nbsp;&nbsp;
		<button type="submit" class="btn btn-black-hover-white-border-black">Simpan</button>
	</div>
{!! Form::close() !!}