<div class="row mt-xs mb-xs">
	<div class="col-md-6 text-left">
		<span>Filter</span>
	</div>
	<div class="col-md-6 text-right">
		<a href="{{route('balin.product.index', Input::only('categories'))}}" class="hover-orange clearall-filter">clear all</a>
	</div>
</div>

@foreach($data['tag'] as $key => $value)
	@if($value['category_id']==0)
		@if($key!=0)
				</ul>
			</div>
		</div>
		@endif
		<div class="row mt-sm mb-sm">
			<div class="col-md-12">
				<h4 class="mb-5">{{$value['name']}}</h4>
				<ul class="list-unstyled">
	@endif
	@if($value['category_id']!=0)
		@if(str_is('warna*', $value['slug'])) 
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('tags[]', $value['slug'], (Input::has('tags') && in_array($value['slug'], Input::get('tags'))) ? true : null, ['id' => $value['slug'], 'class' => 'checkbox-color hide', 'data-type' => 'tags', 'data-filter' => $value['slug'], 'onClick' => 'ajaxFilter(this);']) !!} 
					<label for="{{$value['slug']}}">
						<span class="color-item" style="background-color: {{$value['code']}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
					</label>
				</div>
			</li>
		@else
			<li>
				<div class="checkbox-custom">
					{!! Form::checkbox('tags[]', $value['slug'], (Input::has('tags') && in_array($value['slug'], Input::get('tags'))) ? true : null, ['id' => $value['slug'], 'class' => 'checkbox-filter', 'data-type' => 'tags', 'data-filter' => $value['slug'], 'onClick' => 'ajaxFilter(this);']) !!} 
					<label for="{{$value['slug']}}">
						{{$value['name']}} 
					</label>
				</div>
			</li>
		@endif
	@endif
@endforeach
		</ul>
	</div>
</div>
