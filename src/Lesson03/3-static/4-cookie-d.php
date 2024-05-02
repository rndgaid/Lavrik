<?php

	class Cookie{
		public static int $baseTime = 86400 * 7;
		public static string $basePath = '/';
		protected static $instance;

		protected function __construct(){}

		public static function getInstance() : self{
			if(self::$instance === null){
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function get(string $name) : ?string{
			return $_COOKIE[$name] ?? null;
		}

		public function add(string $name, string $value, int $time = null, string $path = null){
			if($time === null){
				$time = time() + self::$baseTime;
			}

			if($path === null){
				$path = self::$basePath;
			}

			setcookie($name, $value, $time, $path);
			$_COOKIE[$name] = $value;
		}

		public function remove(string $name, string $path = null){
			if($path === null){
				$path = self::$basePath;
			}

			setcookie($name, '', 1, $path);
			unset($_COOKIE[$name]);
		}
	}

	$cookie = Cookie::getInstance();
	$cookie->add('password', 'qwerty');
	echo $cookie->get('password');

	$cookie1 = Cookie::getInstance();
	$cookie2 = Cookie::getInstance();

	var_dump($cookie);
	var_dump($cookie1);
	var_dump($cookie2);

	//$systemResourses = ['cookie' => new Cookie()];