<?

/**
 * Returns system information
 * @return string
 */
function getSys() {
	$os = strtolower(substr(PHP_OS, 0, 3));
	$web = strtolower(PHP_SAPI) !== "cli";
	
	if ($web)
		return 'web';
	else
		return $os;
}

/**
 * Returns Line Ending character(s) based on current usage of PHP
 * @return string
 */
function getLineEnding() {
	$sys = getSys();
	
	if ($sys === 'web')
		return "<br />";
	
	if ($sys === "win")
		return "\r\n";
	
	return "\n";
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
	
	if ($days > 0)
		return "${days}d ${hours}h ${minutes}m ${seconds}s";
	elseif ($hours > 0)
		return "${hours}h ${minutes}m ${seconds}s";
	elseif ($minutes > 0)
		return "${minutes}m ${seconds}s";
	else
		return "${seconds}s";
}

/**
 * Parses command line options
 * @source http://pwfisher.com/nucleus/index.php?itemid=45
 * @param array $argv
 */
function parseArgs($argv) {
	array_shift($argv);
	$o = array();
	foreach ( $argv as $a ) {
		if (substr($a, 0, 2) == '--') {
			$eq = strpos($a, '=');
			if ($eq !== false) {
				$o[substr($a, 2, $eq - 2)] = substr($a, $eq + 1);
			}
			else {
				$k = substr($a, 2);
				if (!isset($o[$k])) {
					$o[$k] = true;
				}
			}
		}
		else if (substr($a, 0, 1) == '-') {
			if (substr($a, 2, 1) == '=') {
				$o[substr($a, 1, 1)] = substr($a, 3);
			}
			else {
				foreach ( str_split(substr($a, 1)) as $k ) {
					if (!isset($o[$k])) {
						$o[$k] = true;
					}
				}
			}
		}
		else {
			$o[] = $a;
		}
	}
	return $o;
}

/**
 * Loads options into options array, based on command line parms, or get/post params
 */
function loadOpts() {
	global $argv, $opts;
	
	if(isset($argv)) {
		foreach(parseArgs($argv) as $key => $value) {
			if(isset($opts[$key]))
				$opts[$key] = $value;
		}
	}

	if(isset($_REQUEST)) {
		foreach($_REQUEST as $key => $value) {
			if(isset($opts[$key]))
				$opts[$key] = $value;
		}
	}
}