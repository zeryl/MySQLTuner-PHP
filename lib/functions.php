<?

function getLineEnding() {
	$os = strtoupper(substr(PHP_OS, 0, 3));
	$web = (PHP_SAPI !== "cli");
	
	if(($os === "WIN") && !($web))
		return "\r\n";
	
	if(($os === "LIN") && !($web))
		return "\n";
	
	if(!isset($system) && ($web))
		return "<br />";
}