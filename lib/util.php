<?php

class Util {
	private static $host = NULL;

	private function __construct() {}
	private function __clone() {}

	public static function getHost() {
		if (!self::$host) {
			$protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https';
			$hostWeb = $_SERVER['HTTP_HOST'];
			self::$host = $protocol . "://" . $hostWeb;
		}
		return self::$host;
	}

	public static function bbCode($string) {
		$tags = 'b|i|url|img|code';
		while (preg_match_all('`\[(' . $tags . ')=?(.*?)\](.+?)\[/\1\]`', $string, $matches)) {
			foreach ($matches[0] as $key => $match) {
				list($tag, $param, $innertext) = array($matches[1][$key], $matches[2][$key], $matches[3][$key]);
				switch ($tag) {
					case 'b':$replacement = "<strong>$innertext</strong>";
						break;
					case 'i':$replacement = "<em>$innertext</em>";
						break;
					case 'url':
						$r = preg_match('/^[http\:\/\/]/', $innertext);
						if ($r > 0) {
							$replacement = '<a target="_blank" href="' . ($innertext) . "\">$innertext</a>";
						} else {
							$replacement = '<a href="http://' . ($innertext) . "\">$innertext</a>";
						}

						break;
					case 'img':
						$r = preg_match('/^[img\/]/', $innertext);
						if ($r > 0) {
							$replacement = "<img src=\"/$innertext\" class=\"img-responsive\" " . '/>';
						} else {
							$replacement = "<img src=\"$innertext\" class=\"img-responsive\" " . '/>';
						}

						break;
					case 'code':$replacement = "<pre class=\"pre-scrollable\">$innertext</pre>";
						break;
				}
				$string = str_replace($match, $replacement, $string);
			}
		}

		return $string;
	}

	public static function slugify($string) {
		$string = preg_replace('~[^\\pL\d]+~u', '-', $string);

		$string = trim($string, '-');

		if (function_exists('iconv')) {
			$string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
		}

		$string = strtolower($string);

		$string = preg_replace('~[^-\w]+~', '', $string);

		if (empty($string)) {
			return 'n-a';
		}

		return $string;
	}

	public static function increment_string($str, $separator = '-', $first = 2) {
		preg_match('/(.+)' . $separator . '([0-9]+)$/', $str, $match);

		return isset($match[2]) ? $match[1] . $separator . ($match[2] + 1) : $str . $separator . $first;
	}
}

?>