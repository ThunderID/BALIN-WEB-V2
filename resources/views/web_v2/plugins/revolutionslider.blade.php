{!! HTML::style('plugins/revolution-slider/css/style.css') !!}
{!! HTML::style('plugins/revolution-slider/css/navstylechange.css') !!}
{!! HTML::style('plugins/revolution-slider/rs-plugin/css/settings.css') !!}
{!! HTML::script('plugins/revolution-slider/rs-plugin/js/jquery.themepunch.plugins.min.js') !!}
{!! HTML::script('plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js') !!}

<script type="text/javascript">
	var revapi;
	jQuery(document).ready(function() {
		   revapi = jQuery('.tp-banner').revolution({
				delay:6000,
				startwidth:1170,
				startheight:500,
				hideThumbs:10,
				fullWidth:"off",
				fullScreen:"on",
				touchenabled:"on",
				navigationType:"bullet",
				soloArrowLeftHOffset:80,
				soloArrowRightHOffset:80
			});
	});	//ready
</script>