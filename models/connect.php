<?php

	class Connect{
		
		public static $instance;

		public function __construct(){

		}


		public static function get_instance(){
			if(!isset(self::$instance)){
				self::$instance = new PDO('pgsql:host=ec2-54-172-219-6.compute-1.amazonaws.com;dbname=ddsn64b6n49enc;', 'zrfshjeedozojf', '39133ad9f7575734f332d27c3e4d88d4e63d7a9a989c2828cc2b8dadd9a3f5bb');
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
			}

			return self::$instance;
		}
	}
?>