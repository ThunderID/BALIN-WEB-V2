<div class="panel panel-default mt-0 border-grey">
	<div class="panel-heading" role="tab" id="headingTwo">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
			<h4 class="panel-title">
				Filter &nbsp;
				<span class="filter-info">
					@if(Input::has('tags'))
						@foreach (Input::get('tags') as $k => $v)
							<label class="btn btn-transparent btn-xs filter-info-action mb-5"> {{ $v }} <i class="fa fa-times-circle"></i></label>
						@endforeach
					@endif
				</span>
				<span class="pull-right">
					<i class="fa fa-angle-right " aria-hidden="true"></i>
				</span>
			</h4>
		</a>
	</div>
	<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12 col-sm-12">
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
				</div>
			</div>
		</div>
	</div>
</div>