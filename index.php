<?

error_reporting(E_ALL);
ini_set('display_errors', 1);

$version = '0.0.1';

require_once('lib/colors.php');
require_once('lib/functions.php');

$opts = array(
	'nobad' => false,
	'nogood' => false,
	'noinfo' => false,
	'nocolor' => false,
	'forcemem' => false,
	'forceswap' => false,
	'host' => false,
	'socket' => false,
	'port' => false,
	'user' => false,
	'pass' => false,
	'skipsize' => false,
	'checkversion' => false,
	'help' => false,
);

// Load our options from either $_REQUEST, or from command line
loadOpts();

if($opts['help'] !== false) {
	echo(showUsage());
	exit(0);
}