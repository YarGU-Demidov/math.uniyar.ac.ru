<?php
	
	namespace App;


	class Cookies
	{

		private $cookies = [];

		public function __construct ()
		{
		}

		public function __get ( $name )
		{
			return (isset ($this->cookies[$name])) ? $this->cookies[$name]: (isset($_COOKIE[$name])) ? $_COOKIE[$name] : null;
		}

		public function __set ( $name, $value )
		{
			$this->cookies[$name] = $value;
		}

		public function GetAll()
		{

			$allCookies = $_COOKIE;

			foreach ( $this->cookies as $name => $value )
			{
				$allCookies[$name] = $value;
			}

			return $allCookies;

		}

		private function Save()
		{
			foreach($this->cookies as $name => $value)
			{
				if($value == "" || $value == null)
				{
					setcookie($name, "",time()-60*60*24*30 ,"/",".math.uniyar.ac.ru" );
				}
				else
				{
					setcookie($name, $value, time()+60*60*24*30,"/",".math.uniyar.ac.ru" );
				}
			}
		}

		function __destruct ()
		{
			$this->Save();
		}


	}