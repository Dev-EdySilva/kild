<?php 
	
	/**
	* 
	*/
	class TokenCreator
	{
		
		static $length = 40;
		 static $chars = '$%@#!0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_';


		public static function create(){
			$chave = str_shuffle(self::$chars);
			return substr($chave, 0, self::$length);
		}

	}




	

 ?>