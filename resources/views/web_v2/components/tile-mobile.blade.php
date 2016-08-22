{{-- -------------------------------- MOBILE -------------------------------- --}}
<div class="row hidden-sm hidden-md hidden-lg">
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

		<!-- <div class="item">
			<div class="col-xs-12 pl-0 pr-0">
				<div class="tile text-center">
					{!! Html::image('images/tile-2.jpg', null, ['class' => 'img-responsive']) !!}
					<div class="jumbotron">
						<h4>NINETIES CHAUFFEUR</h4>
					</div>
				</div>
			</div>
		</div>

		<div class="item">
			<div class="col-xs-12 pl-0 pr-0">
				<div class="tile text-center">
					{!! Html::image('images/tile-3.png', null, ['class' => 'img-responsive']) !!}
					<div class="jumbotron">
						<h4>BALIN GIFT</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="col-xs-12 pl-0 pr-0">
				<div class="tile text-center">
					{!! Html::image('images/tile-4.png', null, ['class' => 'img-responsive']) !!}
					<div class="jumbotron">
						<h4>HARNESS THE POWER</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="col-xs-12 pl-0 pr-0">
				<div class="tile text-center">
					{!! Html::image('images/tile-5.png', null, ['class' => 'img-responsive']) !!}
					<div class="jumbotron">
						<h4>WORKING LADY</h4>
					</div>
				</div>
			</div>
		</div> -->
	</div>
</div>