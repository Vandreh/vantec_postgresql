<?php

	class Connect{
		
		public static $instance;

		public function __construct(){

		}


		public static function get_instance(){
			if(!isset(self::$instance)){
				self::$instance = new PDO('pgsql:host=ec2-35-169-212-189.compute-1.amazonaws.com;dbname=d3eaier7gu0mh9;', 'bdvbbhjiywlbjz', '6421d15ed9cfe33ca432d5911c665d0a84026b94671ee6e99c07f17c03064b53');
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
			}

			return self::$instance;
		}
	}
?>