{{-- -------------------------------- MOBILE -------------------------------- --}}
<div class="row">
	<div class="carousel">

		@foreach($data['shop_by_style'] as $key => $data)
			<div class="item">
				<div class="col-xs-12 pl-0 pr-0">
					<a href="{{ $data['action_url'] }}">
						<div class="tile text-center">
							{!! Html::image($data['images']['image_sm'], null, ['class' => 'img-responsive']) !!}
							<div class="jumbotron">
								<h4>{{ $data['caption']}} </h4>
							</div>
						</div>
					</a>
				</div>
			</div>
		@endforeach
	
	</div>
</div>