<?php 
	
	/**
	* 

	*/
        

        namespace DAO;
        use \PDO;

	class DBConn
	{
		
		static $registered=false;
		static $conn;

		static function get(){

			if(!self::$registered){
			self::$conn = new PDO('mysql:host='.DBHOST.'; dbname='.DBNAME.';', DBUSER, DBPASS);
			// self::$conn = new PDO('mysql:host=localhost; dbname=u654201974_tope;', 'u654201974_tope', 'codesilva');
				self::$registered=true;
			}


			return self::$conn;

		}	
	
	}

 ?>