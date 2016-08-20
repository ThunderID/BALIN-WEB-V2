{!! Html::script('plugins/owlCarousel/owl.carousel.min.js') !!}
{!! Html::style('plugins/owlCarousel/owl.carousel.css') !!}
{!! Html::style('plugins/owlCarousel/owl.theme.css') !!}
{!! Html::style('plugins/owlCarousel/owl.transitions.css') !!}

<script type="text/javascript">
	$(document).ready(function(){
		$("#slider").owlCarousel({
			autoPlay : 3000,
			navigation : true,
			slideSpeed : 300,
			paginationSpeed : 400,
    		transitionStyle:"fade",
    		goToFirstSpeed : 2000,
    		scrollPerPage : false,
    		singleItem: true,
    		navigationText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>","<i class='fa fa-angle-right' aria-hidden='true'></i>"]
		});
	});
</script>

