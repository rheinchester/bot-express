<?php
	include_once ('config.php');
	class MyPDO {
		protected $connection;
		function __construct(){
			$this->open_connection();
		}
		protected function open_connection (){
			$options =  array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
			try {
				$this->connection = new PDO (DSN,DB_USER,DB_PASSWORD, $options);
			} catch (PDOException $e){
				echo $e->getMessage();
				header('location:../connection_error.php');
			}
		}	
		protected function close_connection(){
			$this->connection = null;
		}
	}
?>