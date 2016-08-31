<div class="panel panel-default mt-0 border-grey">
	<div class="panel-heading" role="tab" id="headingThree">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
			<h4 class="panel-title">
				Sort By &nbsp; 
				<span class="sort-info">
					@if (Input::get('sort') == 'date-asc')
						<label class="btn btn-transparent btn-xs sort-info-action"> Terbaru <i class="fa fa-times-circle"></i></label>
					@elseif (Input::get('sort') == 'date-desc')
						<label class="btn btn-transparent btn-xs sort-info-action"> Terlama <i class="fa fa-times-circle"></i></label>
					@elseif (Input::get('sort') == 'name-asc')
						<label class="btn btn-transparent btn-xs sort-info-action"> Nama A-Z <i class="fa fa-times-circle"></i></label>
					@elseif (Input::get('sort') == 'name-desc')
						<label class="btn btn-transparent btn-xs sort-info-action"> Nama Z-A <i class="fa fa-times-circle"></i></label>
					@elseif (Input::get('sort') == 'price-asc')
						<label class="btn btn-transparent btn-xs sort-info-action"> Harga Termurah <i class="fa fa-times-circle"></i></label>
					@elseif (Input::get('sort') == 'price-desc')
						<label class="btn btn-transparent btn-xs sort-info-action"> Harga Termahal <i class="fa fa-times-circle"></i></label>
					@endif
				</span>
				<span class="pull-right">
					<i class="fa fa-angle-right " aria-hidden="true"></i>
				</span>
			</h4>
		</a>
	</div>
	<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
		<div class="panel-body">
			<ul class="list-unstyled m-0 category-list ajaxDataSort">
				<li class="p-5">
					<a href="javascript:void(0);" class="{{ Input::get('sort') == 'date-asc' ? 'text-underline' : '' }}" data-sort="date-asc" data-title="Terbaru" onClick="ajaxSorting(this, 'mobile')">Terbaru</a>
				</li>
				<li class="p-5">
					<a href="javascript:void(0);" class="{{ Input::get('sort') == 'date-desc' ? 'text-underline' : '' }}" data-sort="date-desc" data-title="Terlama" onClick="ajaxSorting(this, 'mobile')">Terlama</a>
				</li>
				<li class="p-5">
					<a href="javascript:void(0);" class="{{ Input::get('sort') == 'name-asc' ? 'text-underline' : '' }}" data-sort="name-asc" data-title="Nama A-Z" onClick="ajaxSorting(this, 'mobile')">Nama A-Z</a>
				</li>
				<li class="p-5">
					<a href="javascript:void(0);" class="{{ Input::get('sort') == 'name-desc' ? 'text-underline' : '' }}" data-sort="name-desc" data-title="Nama Z-A" onClick="ajaxSorting(this, 'mobile')">Nama Z-A</a>
				</li>
				<li class="p-5">
					<a href="javascript:void(0);" class="{{ Input::get('sort') == 'price-asc' ? 'text-underline' : '' }}" data-sort="price-asc" data-title="Harga Termurah" onClick="ajaxSorting(this, 'mobile')">Harga Termurah</a>
				</li>
				<li class="p-5">
					<a href="javascript:void(0);" class="{{ Input::get('sort') == 'price-desc' ? 'text-underline' : '' }}" data-sort="price-desc" data-title="Harga Termahal" onClick="ajaxSorting(this, 'mobile')">Harga Termahal</a>
				</li>
			</ul>
		</div>
	</div>
</div>