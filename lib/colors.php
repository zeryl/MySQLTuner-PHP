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

/**
 * Returns proper color coding based on current system/usage of PHP
 * @param string $color
 */
function getColor($color) {
	global $colors, $opts;
	
	if ($opts['nocolor'])
		return;
	
	$sys = getSys();
	
	if($sys === 'lin')
		$sys = 'nix';
	
	if(!isset($colors[$color]))
		return;

	return($colors[$color][$sys]);
}