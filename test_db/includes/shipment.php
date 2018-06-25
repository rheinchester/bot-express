<?php
//show articles
//show subscribers
// Add article 
include_once 'Model.php';
	
	class Shipment extends Model{
		protected $shipment_id;
		public $date;
		public $time;
		public $description;
		public $status;
		public $location;
		public $origin;
		public $destination;
		

		public static $class_name = 'Shipment';
		public static $table_name = 'shipment';
		public static $primary_key = 'shipment_id';
		public static $table_fields = array('shipment_id','date','time','description','status','location','origin','destination');

		public function __construct(){
			parent::__construct();
		}

		public function setShipmentId($id){
			$this->shipment_id = $id;
		}

		public function getShipmentId(){
			return $this->shipment_id;
		}

		// public static function getDropDown(){}
		
		public function nextId(){
			if ($lastShipment = static::last()) {
			$lastId = $lastShipment->shipment_id;
			}else{
				$lastId = 0;
			}
			return ++$lastId;
		}

		public function setNewShipmentId(){
			$this->shipment_id = substr(md5(microtime()),7,7);   
		}
	      public function insertShipment(){
		      $this->setNewShipmentId();
		      return ($this->create()) ? true : false;
		    }                               

		public function delete(){
		      $sql = " DELETE FROM ".self::$table_name;
		      $sql.= " WHERE shipment_id = '{$this->shipment_id}'";
		      // echo $sql;
		      return static::findBySql($sql);
			}
		}
 ?>
