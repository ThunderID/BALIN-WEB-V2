{!! Html::script('plugins/owlCarousel/owl.carousel.min.js') !!}
{!! Html::style('plugins/owlCarousel/owl.carousel.css') !!}
{!! Html::style('plugins/owlCarousel/owl.theme.css') !!}
{!! Html::style('plugins/owlCarousel/owl.transitions.css') !!}

<style>
/*slider*/
@media screen and (max-width: 767px) {
  #slider .owl-wrapper-outer{
    height: 55vw;
  } 
}
@media screen and (min-width: 768px) {
  #slider .owl-wrapper-outer{
    height: 40vw;
  } 
}
#slider .owl-controls .owl-buttons {
  top: 47.5% !important;
  transform: translateY(-50%);
    position: absolute;
    width: 100%;
}
#slider .owl-controls .owl-buttons div{
  opacity: 1;
  background-color: transparent;
  font-size: 30px;
}
#slider .owl-controls .owl-buttons .owl-prev {
    float: left;
}
#slider .owl-controls .owl-buttons .owl-next {
    float: right;
}
#slider .owl-controls{
  margin-top: -20px;
}

/*carousel*/
.carousel .owl-controls .owl-buttons {
  	top: 47.5% !important;
  	transform: translateY(-50%);
    position: absolute;
    width: 100%;
    font-size: 30px;
    z-index: -1;
}
.carousel .owl-controls .owl-buttons div{
  	opacity: 1;
  	background-color: transparent;
  	font-size: 30px;
  	color: black;
}
.carousel .owl-controls .owl-buttons .owl-prev {
    float: left;
    margin-left: -25px;
    padding: 0px;
}
.carousel .owl-controls .owl-buttons .owl-next {
    float: right;
    margin-right: -25px;
    padding: 0px;
}
.carousel .item{
    margin-left:2px;
    margin-right:2px;
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

		$(".carousel").owlCarousel({
      autoPlay : 3000,
			items : 2,
			singleItem:	false,
			itemsMobile: [200,1],
			navigation : true,
			pagination : false,
    		navigationText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>","<i class='fa fa-angle-right' aria-hidden='true'></i>"]			
		});
	});	
</script>

