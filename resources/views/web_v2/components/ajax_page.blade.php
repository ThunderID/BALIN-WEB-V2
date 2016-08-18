<div class="col-md-12 text-right">
	<?php
		$tmp_paging = $paging->appends(Input::all())->render();
		$paging = str_replace("href=", "onClick='ajaxPaging(this)' data-url=", $tmp_paging);
		$paging = preg_replace("/\[[^)]+\]/","[]", $paging);
	?>
	{!! $paging !!}
</div>	