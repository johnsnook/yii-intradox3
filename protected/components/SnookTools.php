<?php

class SnookTools {

	static function human_filesize($bytes, $decimals = 2) {
		#$sz = 'BKMGTP';
		$sz = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB'];
		$factor = floor((strlen($bytes) - 1) / 3);
		return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . ' ' . @$sz[$factor];
	}

	/**
	 * Returns a sanitized string, typically for URLs.
	 *
	 * @param string $string the string to be sanitized.
	 * @param boolean $force_lowercase Force the string to lowercase.
	 * @param boolean $anal If set to *true*, will remove all non-alphanumeric characters.
	 * @return string the sanitized string
	 */
	static function sanitize($string, $force_lowercase = false, $anal = false) {
		$strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
			"}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
			"â€”", "â€“", ",", "<", ".", ">", "/", "?");
		$clean = trim(str_replace($strip, "", strip_tags($string)));
		$clean = preg_replace('/\s+/', "-", $clean);
		$clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean;
		return ($force_lowercase) ?
				(function_exists('mb_strtolower')) ?
				mb_strtolower($clean, 'UTF-8') :
				strtolower($clean) :
				$clean;
	}

	static function truncate($string, $length, $stopanywhere = false) {
		//truncates a string to a certain char length, stopping on a word if not specified otherwise.
		if (strlen($string) > $length) {
			//limit hit!
			$string = substr($string, 0, ($length - 3));
			if ($stopanywhere) {
				//stop anywhere
				$string .= '...';
			} else {
				//stop on a word.
				$string = substr($string, 0, strrpos($string, ' ')) . '...';
			}
		}
		return $string;
	}

	static function array_column($input = null, $columnKey = null, $indexKey = null) {
		// Using func_get_args() in order to check for proper number of
		// parameters and trigger errors exactly as the built-in array_column()
		// does in PHP 5.5.
		$argc = func_num_args();
		$params = func_get_args();
		if ($argc < 2) {
			trigger_error("array_column() expects at least 2 parameters, {$argc} given", E_USER_WARNING);
			return null;
		}
		if (!is_array($params[0])) {
			trigger_error(
					'array_column() expects parameter 1 to be array, ' . gettype($params[0]) . ' given', E_USER_WARNING
			);
			return null;
		}
		if (!is_int($params[1]) && !is_float($params[1]) && !is_string($params[1]) && $params[1] !== null && !(is_object($params[1]) && method_exists($params[1], '__toString'))
		) {
			trigger_error('array_column(): The column key should be either a string or an integer', E_USER_WARNING);
			return false;
		}
		if (isset($params[2]) && !is_int($params[2]) && !is_float($params[2]) && !is_string($params[2]) && !(is_object($params[2]) && method_exists($params[2], '__toString'))
		) {
			trigger_error('array_column(): The index key should be either a string or an integer', E_USER_WARNING);
			return false;
		}
		$paramsInput = $params[0];
		$paramsColumnKey = ($params[1] !== null) ? (string) $params[1] : null;
		$paramsIndexKey = null;
		if (isset($params[2])) {
			if (is_float($params[2]) || is_int($params[2])) {
				$paramsIndexKey = (int) $params[2];
			} else {
				$paramsIndexKey = (string) $params[2];
			}
		}
		$resultArray = array();
		foreach ($paramsInput as $row) {
			$key = $value = null;
			$keySet = $valueSet = false;
			if ($paramsIndexKey !== null && array_key_exists($paramsIndexKey, $row)) {
				$keySet = true;
				$key = (string) $row[$paramsIndexKey];
			}
			if ($paramsColumnKey === null) {
				$valueSet = true;
				$value = $row;
			} elseif (is_array($row) && array_key_exists($paramsColumnKey, $row)) {
				$valueSet = true;
				$value = $row[$paramsColumnKey];
			}
			if ($valueSet) {
				if ($keySet) {
					$resultArray[$key] = $value;
				} else {
					$resultArray[] = $value;
				}
			}
		}
		return $resultArray;
	}

	/**
	 * When I first wrote this software, I threw in all these tool tip  quotes
	 * with poetry to show Marjorie how much I loved her.  She didn't appreciate it
	 * or me, and I'm a petty motherfucker, so now we're doing this, I guess.
	 *
	 * @return string
	 */
	public static function getQuote() {
		$qs = [
			'never again',
		];
		return htmlspecialchars($qs[mt_rand(0, count($qs) - 1)]);
	}

}
