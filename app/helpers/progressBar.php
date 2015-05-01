<?php

function progressBar($vie)
{
	$width = 10 * $vie;

	if ($vie <= 2) {
		$style = 'danger';
	} elseif ($vie <= 5) {
		$style = 'warning';
	} else {
		$style = 'success';
	}

	$html = <<<END
<div class="progress">
	<div class="progress-bar progress-bar-$style" role="progressbar" aria-valuenow="$vie" aria-valuemin="0" aria-valuemax="10" style="width: $width%"></div>
</div>
END;

	return $html;
}
