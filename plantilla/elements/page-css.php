<?php 

$asset_url = 'assets/';

function DexignZone_Css($v)
{
	global $asset_url;
	if (!empty($v)) {
		foreach ($v as $style){
			if (is_string($style)) {
			if (!str_contains($style, 'http')) {
			echo '<link href="'.$asset_url.$style.'" rel="stylesheet" type="text/css"/>',PHP_EOL;
			}
			else{
			echo '<link href="'.$style.'" rel="stylesheet" type="text/css"/>',PHP_EOL;
			}
		}
	}
	}
}	

DexignZone_Css($DexignZoneSettings['global']['css']['top']);

if (isset($DexignZoneSettings['pagelevel'][$CurrentPage]['css'])) {
DexignZone_Css($DexignZoneSettings['pagelevel'][$CurrentPage]['css']);
}

DexignZone_Css($DexignZoneSettings['global']['css']['bottom']);

 ?>