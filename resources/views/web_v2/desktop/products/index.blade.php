@extends('web_v2.page_templates.layout')

@section('content')
	@include('web_v2.components.category-desktop')

	<section class="container mt-lg mb-lg">
		<div class="row form mr-0 ml-0">
			<div class="col-md-3 bg-grey">
				@include('web_v2.components.filter-desktop')
			</div>
			<div class="col-md-9">
				@include('web_v2.components.sort-desktop')

				<div class="row mt-md mb-sm pl-md pr-md">
					@include('web_v2.components.card', [
						'data' 	=> $data['new_release'],
				  		'col'	=> 'col-md-4 col-sm-3 col-xs-6' 
					])
				</div>

				<div class="row mt-sm mb-md">
					<div class="col-md-12 text-center">
						<nav aria-label="Page navigation">
							<ul class="pagination">
								<li>
									<a href="#" aria-label="Previous">
										<span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
									</a>
								</li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li>
									<a href="#" aria-label="Next">
										<span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop

@section('js_plugin')
@stop

@section('js')  

		$(document).ready(function(){
			$('input[type=checkbox]').change(function(){
				console.log($(this));
			});
		});
@stop