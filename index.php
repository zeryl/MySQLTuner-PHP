<?

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('lib/colors.php');

echo(getColor('red') . 'Red' . getColor('clear'));
echo("\n");
echo(getColor('yellow') . 'Yellow' . getColor('clear') . ' - Cleared');
echo("\n");
echo(getColor('green') . 'Green' . getColor('clear'));