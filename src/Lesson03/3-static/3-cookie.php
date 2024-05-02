<?php

	class Cookie{
		public static int $baseTime = 86400 * 7;
		public static string $basePath = '/';

		public static function get(string $name) : ?string{
			return $_COOKIE[$name] ?? null;
		}

		public static function add(string $name, string $value, int $time = null, string $path = null){
			if($time === null){
				$time = time() + self::$baseTime;
			}

			if($path === null){
				$path = self::$basePath;
			}

			setcookie($name, $value, $time, $path);
			$_COOKIE[$name] = $value;
		}

		public static function remove(string $name, string $path = null){
			if($path === null){
				$path = self::$basePath;
			}

			setcookie($name, '', 1, $path);
			unset($_COOKIE[$name]);
		}
	}

	//Cookie::add('password', 'qwerty');
	echo Cookie::get('password');
	Cookie::remove('password');
