{{-- -------------------------------- DESKTOP -------------------------------- --}}
<section class="container-fluid bg-grey submenu">
	<div class="row">
		<div class="col-md-12 hidden-xs">
		  	<div class="container">
		  		<div class="row">
		  			<div class="col-md-12 text-center">
		  			  	<ul class="list-inline p-sm m-0">
		  			  		@foreach ($data['category'][0] as $k => $v)
		  			  			<li class="" style="width:12em;">
		  			  				<a href="#" class="hover-orange">{{ $v['name'] }}</a>
		  			  			</li>
		  			  		@endforeach
		  			  		<li class="" style="width:12em;"><a href="#" class="hover-orange text-orange">SALE</a></li>
		  			  	</ul>
		  			</div>
		  		</div>
		  	</div>
		</div>
	</div>
</section>