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
		$.ajax({
			url: 	toUrl,
			type: 	'GET',
			beforeSend: function() {
				$('.content-data').fadeOut(300);
				$('html, body').animate({scrollTop: 0}, 600);
			},
			success: function(data) {
				$('.content-data').html($(data).find('.content-data').html());
				$('.content-data').fadeIn(300);
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
	* [clearSort description]
	* @return {[type]} [description]
	*/
	function clearFlag(param, content, title) {
		if ((param == 'desktop') && (content == 'sort')) {
			$('.ajaxDataSort').find(".fa").removeClass("fa-check");
		}
		{{-- UNTUK SORT MOBILE --}}
		else if ((param == 'mobile') && (content == 'sort')) {
			$('.sort-info').fadeOut(400);
			$('.sort-info').html('');

			// if (title !== null) {
			// 	display = '<label class="btn btn-transparent btn-xs sort-info-action"> ' + title + ' <i class="fa fa-times-circle"></i></label>';
			// 	$('.sort-info').fadeIn(400);
			// 	setTimeout(function(){
			// 		$('.sort-info').html(display);
			// 	}, 400);
			// 	$('.sort-info-action').on('click', function(e) {
			// 		e.stopPropagation();
			// 		alert('halo');
			// 	});
			// }
		}
		else if ((param == 'mobile') && (content == 'filter')) {
			$('.filter-info').fadeOut(400);
			$('.filter-info').html('');
		}
	}

	/**
	 * [ajaxSorting description]
	 * @param  {[type]} e     [description]
	 * @param  {[type]} param [for mobile or desktop]
	 * @return {[type]}       [description]
	 */
	function ajaxSorting(e, param) {
		var type 	= $(e).attr("data-sort").toLowerCase();
		var title 	= $(e).attr('data-title');

		var url 	= window.location.href;

		if (url.indexOf("sort=" + type) == -1) {
			ajaxAddSort(e, param, title);
		} else {
			ajaxRemoveSort(e, param, null);
		}
	}

	/**
	 * [ajaxAddSort description]
	 * @param  {[type]} e     [description]
	 * @param  {[type]} param [for desktop or mobile]
	 * @return {[type]}       [description]
	 */
	function ajaxAddSort(e, param, title) {
		var type 	= $(e).attr("data-sort").toLowerCase();
		var id 		= $('.sort-content');
		var url     = window.location.href;
		var toUrl	= url.replace(/(sort)[^\&]+/, '');
		toUrl 		= toUrl.replace(/(page)[^\&]+/, '');

		if (toUrl.indexOf("?") == -1) {
			toUrl 	= toUrl + "?sort=" + type;
		} else {
			toUrl 	= toUrl + "&sort=" + type;
		}	

		toUrl		= toUrl.replace('?&', '?');
		toUrl		= toUrl.replace('??', '?');
		toUrl		= toUrl.replace('&&', '&');

		clearFlag(param, 'sort', title);
		ajaxPage(toUrl, id);
		window.history.pushState("", "", toUrl);
	}

	/**
	 * [ajaxRemoveSort description]
	 * @param  {[type]} e     [description]
	 * @param  {[type]} param [for desktop or mobile]
	 * @return {[type]}       [description]
	 */
	function ajaxRemoveSort(e, param) {
		var type 	= $(e).attr("data-sort").toLowerCase();
		var id 		= $(e).parent().attr('id');

		var url     = window.location.href;
		var toUrl	= url.replace(/(sort)[^\&]+/, '');

		toUrl		= toUrl.replace('?&', '?');
		toUrl		= toUrl.replace('&&', '&');

		ajaxPage(toUrl, id);
		window.history.pushState("", "", toUrl);	
	}

	/**
	 * [ajaxFilter description]
	 * @param  {[type]} e [description]
	 * @return {[type]}   [description]
	 */
	function ajaxFilter(e) {
		var type 	= $(e).attr("data-type").toLowerCase();
		var filter 	= $(e).attr("data-filter").toLowerCase();	

		var url     = window.location.href;

		url 		= url.replace('%C2%BD', '½');

		if (url.indexOf(type + "[]=" + filter) == -1) {
			ajaxAddFilter(e);
		} else {
			ajaxRemoveFilter(e);
		}
	}

	/**
	 * [ajaxAddFilter description]
	 * @param  {[type]} e [description]
	 * @return {[type]}   [description]
	 */
	function ajaxAddFilter(e){
		var type 	= $(e).attr("data-type").toLowerCase();
		var filter 	= $(e).attr("data-filter").toLowerCase();
		var id 		= $(e).parent().attr('id');
		var url     = window.location.href;
		var toUrl;

		url			= url.replace(/(page=)[^\&]+/, '');

		if (url.indexOf("?") == -1) {
			toUrl 	= url + "?" + type + "[]=" + filter;
		} else {
			toUrl 	= url + "&" + type + "[]=" + filter;
		}

		toUrl 		= toUrl.replace(/(sort)[^\&]+/, '');
		toUrl		= toUrl.replace('?&', '?');
		toUrl		= toUrl.replace('&&', '&');

		// clearSort();

		ajaxPage(toUrl, id);

		window.history.pushState("", "", toUrl);
	}

	/**
	 * [ajaxRemoveFilter description]
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
		var id 		= $(e).parent().attr('id');

		toUrl 		= toUrl.replace(/(sort)[^\&]+/, '');
		toUrl		= toUrl.replace(/(page)[^\&]+/, '');
		toUrl		= toUrl.replace('?&', '?');
		// clearSort();

		ajaxPage(toUrl, id);
		window.history.pushState("", "", toUrl);
	}
</script>