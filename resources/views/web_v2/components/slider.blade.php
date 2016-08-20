<div id="slider" class="owl-carousel owl-theme">
 	@foreach($sliders as $slider)
		<div class="item">
			<img class="img-responsive" src="{{ $slider['image_xs'] }}">
		</div>
 	@endforeach
</div>