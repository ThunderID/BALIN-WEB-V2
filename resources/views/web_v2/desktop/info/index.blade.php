@extends('web_v2.page_templates.layout')

@section('content')
	<!-- CONTENT -->
	<section class="container">
		<div class="row pt-xl">
			<div class="col-md-12 col-lg-12">
				{!!$data['content']!!}
			</div>
		</div>
	</section>
	<!-- END CONTENT -->
@stop
