@if(Session::has('msg') || $errors->any())
	<div class="row">
	    <div class="col-lg-12">
	        <div class="alert alert-{{Session::get('msg-type')}}">
				@if (Session::has('msg') || $errors->any())
					@if (Session::has('msg'))
						{{ Session::get('msg') }}
					@else
						@foreach ($errors->all('<p>:message</p>') as $error)
							<p>{!! $error !!}</p>
						@endforeach
					@endif
				@endif
			</div>
		</div>
	</div>
@endif