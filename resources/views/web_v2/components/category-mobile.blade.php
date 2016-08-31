<div class="panel panel-default mt-0 border-grey">
	<div class="panel-heading" role="tab" id="headingOne">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			<h4 class="panel-title">
				Category &nbsp;
				<span class="category-info">
					@if (Input::has('categories'))
						<label class="btn btn-transparent btn-xs category-info-action mb-5"> {{ Input::get('categories') }} <i class="fa fa-times-circle"></i></label>
					@endif
				</span>
				<span class="pull-right">
					<i class="fa fa-angle-right " aria-hidden="true"></i>
				</span>
			</h4>
		</a>
	</div>
	<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
		<div class="panel-body">
			<ul class="list-unstyled m-0 category-list">
				@foreach ($data['category'] as $k => $v)
					<li class="p-5" style="width:8em;">
						<a href="#" class="hover-orange {{ $v['slug'] == Input::get('categories') ? 'text-underline' : null }}">{{ $v['name'] }}</a>
					</li>
				@endforeach
				<li class="p-5" style="width:8em;"><a href="#" class="hover-orange text-orange">SALE</a></li>
			</ul>
		</div>
	</div>
</div>