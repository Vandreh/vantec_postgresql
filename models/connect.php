<?php

	class Connect{
		
		public static $instance;

		public function __construct(){

		}


		public static function get_instance(){
			if(!isset(self::$instance)){
				self::$instance = new PDO('pgsql:host=localhost;dbname=vantecge_db_consultaspower;', 'postgres', '321654987');
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
			}

			return self::$instance;
		}
	}
?>