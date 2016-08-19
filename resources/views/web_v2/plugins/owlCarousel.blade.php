{!! Html::script('plugins/owlCarousel/owl.carousel.min.js') !!}
{!! Html::style('plugins/owlCarousel/owl.carousel.css') !!}
{!! Html::style('plugins/owlCarousel/owl.theme.css') !!}
{!! Html::style('plugins/owlCarousel/owl.transitions.css') !!}

<style>
.owl-theme .owl-controls .owl-buttons {
	top: 42% !important;
    position: absolute;
    width: 100%;
}
.owl-theme .owl-controls .owl-buttons div{
	opacity: 1;
	background-color: transparent;
	font-size: 30px;
}
.owl-theme .owl-controls .owl-buttons .owl-prev {
    float: left;
}
.owl-theme .owl-controls .owl-buttons .owl-next {
    float: right;
}
.owl-theme .owl-controls{
	margin-top: -20px;
}
</style>

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

