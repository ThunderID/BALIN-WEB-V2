<div class="row recommend-product mt-sm mb-sm text-regular">
	<div class="col-xs-12">
		<div class="row">
			<div class="col-xs-3 pr-xs">
				<a href="{{ route('balin.product.show', $label_slug) }}">
					<img class="img-responsive ml-sm" style=""  src="{{ $label_image }}">
				</a>
			</div>
			<div class="col-xs-9 pl-sm">
				<h4 class="mt-0 text-md">
					<a href="{{ route('balin.product.show', $label_slug) }}" class="link-black hover-grey">
						{{ $label_name }}
					</a>
				</h4>
				@if ($label_promo==0)
					<span class="text-product">@money_indo($label_price)</span>
				@else
					<span class="text-product">@money_indo($label_promo)</span><br>
					<span class="text-regular text-strikethrough">@money_indo( $label_price )</span>
				@endif
			</div> 
		</div>
	</div>
</div>