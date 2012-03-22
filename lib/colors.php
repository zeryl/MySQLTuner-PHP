<?

$colors = array(
	'red' 		=> array(
		'web' => '<font color="#FF0000">',
		'nix' => "\033[01;31m",
		),
	'green'		=> array(
		'web' => '<font color="#00FF00">',
		'nix' => "\033[01;32m",
		),
	'yellow'	=> array(
		'web' => '<font color="#FFFF00">',
		'nix' => "\033[01;33m",
		),
	'clear'		=> array(
		'web' => '</font>',
		'nix' => "\033[0m",
		),
);

function getColor($color) {
	global $colors;
	
	$os = strtoupper(substr(PHP_OS, 0, 3));
	$web = (PHP_SAPI !== "cli");
	
	if(($os === "WIN") && !($web))
		return;
	
	if(($os === "LIN") && !($web))
		$system = 'nix';
	
	if(!isset($system) && ($web))
		$system = 'web';
	
	if(!isset($colors[$color]))
		return;

	return($colors[$color][$system]);
}