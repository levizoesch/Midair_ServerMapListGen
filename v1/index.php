<?php
/* Required */
require('settings/core/config/constants.php');
require('settings/core/class/FormFields.php');
require('settings/core/class/mapListBuilder.php');
require('settings/core/class/mapList.php');

$html = NULL;

$mapListBuilder = new mapListBuilder();

if (!empty($_POST)) {
	$html = $mapListBuilder->buildPage($mapListBuilder->html_resultsMarkup());
} else {
	$html = $mapListBuilder->buildPage($mapListBuilder->html_buildMarkup());
}

echo $html;
