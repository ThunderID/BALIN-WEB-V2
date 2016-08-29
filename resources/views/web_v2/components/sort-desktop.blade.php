<div class="row mt-xs pl-sm pr-sm">
	<div class="col-md-6">
		<p class="">
			Showing {{ $paging_from }} - {{ $paging_to }} of {{ $paging->total() }} results
		</p>
	</div>
	<div class="col-md-6 text-right">
		<p class="mr-sm">
			<div class="dropdown">
				<a class="dropdown-toggle" href="#" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Harga Termurah <i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1" style="min-width: 200px;">
					<li><a href="#">Harga Termahal</a></li>
					<li><a href="#">Produk Terbaru</a></li>
					<li><a href="#">Produk Terlama</a></li>
				</ul>
			</div>
		</p>
	</div>
</div>