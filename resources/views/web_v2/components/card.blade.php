@foreach ($card as $k => $v)
	<div class="{{ $col }}">
		<div class="card">
			<a href="#">
				{!! Html::image($v['image_sm'], $v['name'], ['class' => 'card-img-top center-block card-image img-responsive']) !!}
				<div class="hover"></div>
			</a>
			<div class="card-block">
				<h4 class="card-title mb-5">
					<a href="#" class="hover-orange">{{ $v['name'] }}</a>
				</h4>
				<p class="card-text mb-5">
					@if ($v['promo_price'] != 0)
						<del>@money_indo($v['price'])</del>
						<span class="text-orange">@money_indo($v['promo_price'])</span>
					@else
						<span>@money_indo($v['price'])</span>
					@endif
				</p>
				<div class="border-size mb-xs"></div>
				<ul class="list-inline">
					@foreach ($v['varians'] as $k2 => $v2)
						<li>{{ $v2['size'] }}</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endforeach