<div class="row mt-xs pl-sm pr-sm">
	<div class="col-md-6">
		<p class="">
			Showing {{ $paging_from }} - {{ $paging_to }} of {{ $paging->total() }} results
		</p>
	</div>
	<div class="col-md-6 text-right">
		<p class="mr-sm sort-content">
			<div class="dropdown">
				<a class="dropdown-toggle label-sort" href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					@if (Input::get('sort') == 'date-asc')
						Terbaru
					@elseif (Input::get('sort') == 'date-desc')
						Terlama
					@elseif (Input::get('sort') == 'name-asc')
						Nama A-Z
					@elseif (Input::get('sort') == 'name-desc')
						Nama Z-A
					@elseif (Input::get('sort') == 'price-asc')
						Harga Termurah
					@elseif (Input::get('sort') == 'price-desc')
						Harga Termahal
					@else
						Terbaru
					@endif
					 <i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1" style="min-width: 200px;">
					<li>
						<a href="javascript:void(0);" data-sort="date-asc" onClick="ajaxSorting(this)">
							{!! (Input::get('sort') == 'date-asc') ? '<i class="fa fa-check"></i>' : '' !!} Terbaru
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" data-sort="date-desc" onClick="ajaxSorting(this)">
							{!! (Input::get('sort') == 'date-desc') ? '<i class="fa fa-check"></i>' : '' !!} Terlama
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" data-sort="name-asc" onClick="ajaxSorting(this)">
							{!! (Input::get('sort') == 'name-asc') ? '<i class="fa fa-check"></i>' : '' !!} Nama A-Z
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" data-sort="name-desc" onClick="ajaxSorting(this)">
							{!! (Input::get('sort') == 'name-desc') ? '<i class="fa fa-check"></i>' : '' !!} Nama Z-A
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" data-sort="price-asc" onClick="ajaxSorting(this)">
							{!! (Input::get('sort') == 'price-asc') ? '<i class="fa fa-check"></i>' : '' !!} Harga Termurah
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" data-sort="price-desc" onClick="ajaxSorting(this)">
							{!! (Input::get('sort') == 'price-desc') ? '<i class="fa fa-check"></i>' : '' !!} Harga Termahal
						</a>
					</li>
				</ul>
			</div>
		</p>
	</div>
</div>