<?

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('lib/colors.php');
require_once('lib/functions.php');

echo(getColor('red') . 'Red' . getColor('clear'));
echo(getLineEnding());
echo(getColor('yellow') . 'Yellow' . getColor('clear') . ' - Cleared');
echo(getLineEnding());
echo(getColor('green') . 'Green' . getColor('clear'));