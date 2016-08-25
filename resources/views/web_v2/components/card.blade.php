@foreach ($data as $k => $v)
	<div class="{{ $col }}">
		<div class="card">
			<a href="#" style="width: 95%">
				{!! Html::image($v['thumbnail'], $v['name'], ['class' => 'card-img-top center-block img-responsive']) !!}
				<div class="hover"></div>
			</a>
			<div class="card-block">
				<h4 class="card-title mb-5">{{ $v['name'] }}</h4>
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
					@foreach (json_decode($v['size']) as $k2 => $v2)
						<li>{{ $v2 }}</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endforeach