<div class="panel panel-default mt-0 border-grey">
	<div class="panel-heading" role="tab" id="headingTwo">
		<a role="button" data-target="#collapseTwo" data-toggle="collapse" data-parent="#accordion" href="javascript:void(0);" aria-expanded="false" aria-controls="collapseTwo">
			<h4 class="panel-title">
				Filter &nbsp;
				<div class="inline filter-info">
					@if (Input::has('tags'))
						@foreach (Input::get('tags') as $k => $v)
							<label class="btn btn-transparent btn-xs panel-action mb-5" data-action="{{ $v }}" data-input="checkbox">{{ preg_replace('/-/', ' ', str_replace('-', '-', $v), 1) }} <i class="fa fa-times-circle"></i></label>
						@endforeach
					@endif
				</div>
				<span class="pull-right">
					<i class="fa fa-angle-right " aria-hidden="true"></i>
				</span>
			</h4>
		</a>
	</div>
	<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12 col-sm-12 text-right">
				  	<a href="javascript:void(0);" class="hover-orange clearall-filter-mobile" data-url="{{ route('balin.product.index', Input::only('categories')) }}">clear all</a>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					@foreach($data['tag'] as $key => $value)
						@if($value['category_id']==0)
							@if($key!=0)
									</ul>
								</div>
							</div>
							@endif
							<div class="row mt-5 mb-5">
								<div class="col-md-12">
									<h4 class="mb-5">{{$value['name']}}</h4>
									@if(str_is('warna*', $value['slug']))
										<ul class="list-inline checkbox-color">
									@else
										<ul class="list-unstyled">
									@endif
						@endif
						@if($value['category_id']!=0)
							@if(str_is('warna*', $value['slug']))
								<li class="{{ (Input::has('tags') && in_array($value['slug'], Input::get('tags'))) ? 'active' : '' }}">
									{!! Form::checkbox('tags[]', $value['slug'], (Input::has('tags') && in_array($value['slug'], Input::get('tags'))) ? true : null, ['id' => $value['slug'], 'class' => 'checkbox-color hide', 'data-type' => 'tags', 'data-action' => $value['slug'], 'onClick' => 'ajaxFilter(this);']) !!} 
									<span class="color-item" style="background-color: {{$value['code']}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
								</li>
							@else
								<li>
									<div class="checkbox-custom">
										{!! Form::checkbox('tags[]', $value['slug'], (Input::has('tags') && in_array($value['slug'], Input::get('tags'))) ? true : null, ['id' => $value['slug'], 'class' => 'checkbox-filter', 'data-type' => 'tags', 'data-action' => $value['slug'], 'onClick' => 'ajaxFilter(this);']) !!} 
										<label for="{{$value['slug']}}">
											{{$value['name']}} 
										</label>
									</div>
								</li>
							@endif
						@endif
					@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>