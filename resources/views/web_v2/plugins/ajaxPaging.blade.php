<script type="text/javascript">
	var tmpData;

	/**
	 * [ajaxPaging get data-url from paginate]
	 * @param  {[type]} e [description]
	 * @return {[type]}   [description]
	 */
	function ajaxPaging(e) {
		var toUrl = $(e).attr("data-url");
		ajaxPage(toUrl);
		window.history.pushState("", "", toUrl);
	};

	/**
	 * [ajaxPage for ajax get data]
	 * @param  {[type]} toUrl [description]
	 * @param  {[type]} e     [description]
	 * @return {[type]}       [description]
	 */
	function ajaxPage(toUrl,e) {
		$('.content-data').fadeOut(400);
		$.ajax({
			url: 	toUrl,
			type: 	'GET',
			success: function(data){
				console.log(data);
				$('.content-data').html($(data).find('.content-data').html());
				// $('#filters').html($(data).find('#filters').html());
				// $('#' + e).html($(data).find('#' + e).html());
				$('.content-data').fadeIn(400);
				// $("#filters").show(400);
				// $("#" + e).show(400);
				tmpData = data;
			},
			error: function(){
				var error = "</br></br><h2 class='text-center m-t-md'>Terjadi masalah penerimaan data, silahkan muat ulang halaman</h2>";

				$('.content-data').html(error);
				$('.content-data').fadeIn(400);
			}
		});	
	};

	/**
	 * [ajaxRemoveFilter clear all filter]
	 * @param  {[type]} e [description]
	 * @return {[type]}   [description]
	 */
	function ajaxRemoveFilter(e) {
		var type 	= $(e).attr("data-type").toLowerCase();
		var filter 	= $(e).attr("data-filter").toLowerCase();
		filter 		= filter.replace(" ","%20"); 

		var url     = window.location.href;
		url 		= url.replace('%C2%BD', '½');

		var toRemove= type + "[]=" + filter;
		var toUrl	= url.replace(toRemove, '');	

		toUrl 		= toUrl.replace(/(sort)[^\&]+/, '');

		toUrl		= toUrl.replace(/(page)[^\&]+/, '');

		toUrl		= toUrl.replace('?&', '?');

		$(e).removeClass("active");
		$(e).find(".fa").removeClass("fa-check-circle");
		$(e).find(".fa").addClass("fa-refresh fa-spin");

		var id 		= $(e).parent().attr('id');

		clearSort();

		ajaxPage(toUrl, id);
		window.history.pushState("", "", toUrl);
	 }
	{{-- End of Filter --}}
</script>