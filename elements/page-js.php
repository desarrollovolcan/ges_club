<script> var enableSupportButton = '<?php echo $DexignZoneSettings['site_level']['support_button'] ?>'</script>

<?php 

$asset_url = 'assets/';

function DexignZone_Script($v)
{
	global $asset_url;
		if (!empty($v)) {
		foreach ($v as $script){
			if (is_string($script)) {
			if (!str_contains($script, 'http')) {
				echo '<script src="'.$asset_url.$script.'" type="text/javascript"></script>',PHP_EOL;
			}
			else{
				echo '<script src="'.$script.'" type="text/javascript"></script>',PHP_EOL;
			}
		}
	}
}
}

DexignZone_Script($DexignZoneSettings['global']['js']['top']);

if (isset($DexignZoneSettings['pagelevel'][$CurrentPage]['js'])) {
DexignZone_Script($DexignZoneSettings['pagelevel'][$CurrentPage]['js']);
}

DexignZone_Script($DexignZoneSettings['global']['js']['bottom']);

if (isset($DexignZoneSettings['pagelevel'][$CurrentPage]['js']['bottom'])) {
DexignZone_Script($DexignZoneSettings['pagelevel'][$CurrentPage]['js']['bottom']);
}

 ?>