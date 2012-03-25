<?

/**
 * Returns Line Ending character(s) based on current usage of PHP
 * @return string
 */
function getLineEnding() {
	$os = strtoupper(substr(PHP_OS, 0, 3));
	$web = (PHP_SAPI !== "cli");
	
	if (($os === "WIN") && !($web))
		return "\r\n";
	
	if (($os === "LIN") && !($web))
		return "\n";
	
	if ($web)
		return "<br />";
}

/**
 * Calculates the parameter passed in bytes, and then rounds it to one decimal place
 * @param int $bytes
 * @return string
 */
function hr_bytes($bytes) {
	if ($bytes >= pow(1024, 3)) {
		return sprintf("%.1f", ($bytes / pow(1024, 3))) . "G";
	}
	elseif ($bytes >= pow(1024, 2)) {
		return sprintf("%.1f", ($bytes / pow(1024, 2))) . "M";
	}
	elseif ($bytes >= 1024) {
		return sprintf("%.1f", ($bytes / (1024))) . "K";
	}
	else {
		return $bytes . "B";
	}
}

/**
 * Calculates the parameter passed in bytes, and then rounds it to the nearest integer
 * @param int $bytes
 * @return string
 */
function hr_bytes_rnd($bytes) {
	if ($bytes >= pow(1024, 3)) {
		return round(($bytes / pow(1024, 3)), 0) . "G";
	}
	elseif ($bytes >= pow(1024, 2)) {
		return round(($bytes / pow(1024, 2)), 0) . "M";
	}
	elseif ($bytes >= 1024) {
		return round(($bytes / (1024)), 0) . "K";
	}
	else {
		return round($bytes, 0) . "B";
	}
}

/**
 * Calculates the parameter passed to the nearest power of 1000, then rounds it to the nearest integer
 * @param int $bytes
 * @return string
 */
function hr_num($bytes) {
	if ($bytes >= pow(1000, 3)) {
		return round(($bytes / pow(1000, 3)), 0) . "G";
	}
	elseif ($bytes >= pow(1000, 2)) {
		return round(($bytes / pow(1000, 2)), 0) . "M";
	}
	elseif ($bytes >= 1000) {
		return round(($bytes / (1000)), 0) . "K";
	}
	else {
		return round($bytes, 0) . "B";
	}
}

/**
 * Calculates uptime to display in a more attractive form
 * @param int $uptime
 * @return string
 */
function pretty_uptime($uptime) {
	$seconds = $uptime % 60;
	$minutes = (int) (($uptime % 3600) / 60);
	$hours = (int) (($uptime % 86400) / (3600));
	$days = (int) ($uptime / (86400));
	
	if($days > 0)
		return "${days}d ${hours}h ${minutes}m ${seconds}s";
	elseif ($hours > 0)
		return "${hours}h ${minutes}m ${seconds}s";
	elseif ($minutes > 0)
		return "${minutes}m ${seconds}s";
	else
		return "${seconds}s";
}