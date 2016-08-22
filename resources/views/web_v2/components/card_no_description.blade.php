@foreach ($data as $k => $v)
	<div class="{{ $col }}">
		<div class="card">
			<a href="#">
				{!! Html::image($v['thumbnail'], '@balinid', ['class' => 'card-img-top center-block img-responsive']) !!}
				<div class="hover">
					<i class="fa fa-instagram fa-2x text-white"></i>
				</div>
			</a>
		</div>
	</div>
@endforeach