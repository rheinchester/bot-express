<?php
include_once ('mypdo.php');
class Model extends MyPDO {
	public static $table_fields;
	public static $table_name;
	public static $primary_key;
	public static $class_name;

	public function __construct(){
		parent::__construct();		
	}

	public static function instantiate ($record){
		/**
		-- Takes in keys in the table-fields (of database) as attributes and  returns it as the attributes of an object.
		-- In short, it creates an object out of database table-fields
		**/ 
		$object = new static();
		foreach (static::$table_fields as $attribute) {
			if(array_key_exists($attribute, $record))
				$object->$attribute = $record[$attribute];
		}
		return $object;
	}

	public function attributes(){
		/**
		 -- This function takes in table fields as objects and converts it to array. 
		 -- It does this by taking an attribute in the field and binding it as a key in the array
		 -- Returns the array ($attriubutes)

		**/ 
		$attributes = array(); 
		foreach (static::$table_fields as $field) {
			if($this->$field != '')
				$attributes[$field] = $this->$field;
		}
		return $attributes;
	}

	public function create(){
		/**
		 -- This inserts data into the database table by using the INSERT query.
		 -- This is how data is created in the database
		**/ 
		$obj_attributes = $this->attributes();
		$sql = "INSERT INTO ".static::$table_name." (";
		$sql.= join(',',array_keys($obj_attributes)).")";
		$sql.= " VALUES ('".join("','",$obj_attributes)."')";
		// echo($sql);  
		return ($this->connection->query($sql)) ? true : false;
	}
	
	
	

	public static function find($id){
		/**
		 -- Fetches the row of a db table with respect to it's id and
		 -- returns it as an object
		 * */
		$obj = new static();
		$sql = "SELECT * FROM ".static::$table_name;
		$sql .= " WHERE ".static::$primary_key. " = '$id'";
		$object = $obj->connection->query($sql)->fetchObject(static::$class_name);
		// echo $sql;    >>>> for debugging purposes only
		return ($object) ? $object : false;
	}
	public function update(){
		/**
		-- Updates existing data on db-table using the UPDATE query.
		-- makes use of prepared statement.
		(I might change the name of this function to prepared update.)
		**/ 
		$sql = "UPDATE ".static::$table_name." SET ";
		$attributes = $this->attributes();
		foreach ($attributes as $field => $value) {
			$attribute_pairs[] = "$field = :$field";
		}
		$primary_key = static::$primary_key;
		$attributes['_id'] = $this->$primary_key;
		$sql.=join(',', $attribute_pairs);
		$sql.=" WHERE $primary_key = :_id";
		$statement = $this->connection->prepare($sql);
		return ($statement->execute($attributes))? true : false ;
		// echo $sql;
	}

	public function preparedCreate(){
			/**
			-- Plays same role as create(). Only that it converts the data into prepared-statement  before inserting into database
			**/
            $obj_attributes_array = $this->attributes();
			$obj_attributes_array_keys = array_keys($obj_attributes_array);
			$sql = "INSERT INTO ".static::$table_name;
			$sql .= " (".join(',',$obj_attributes_array_keys).") ";
			$sql .= "VALUES (:".join(",:",$obj_attributes_array_keys).")";
			// echo $sql;
            $statement = $this->connection->prepare($sql);
            return ($statement->execute($obj_attributes_array))? true : false ;
        } 
	public static function findBySql($sql){ 
		/**
		-- This function is used to implement the fetchAll(). 
		-- It retrieves an array of all fetched data simultenously.
		-- It returns the result into a custom object in which the custom variables are set above (eg: public $table_fields)
		**/
		$obj = new static();
		$objects = $obj->connection->query($sql)->fetchAll(PDO::FETCH_CLASS, static::$class_name);
		return ($objects) ? $objects : false;
	}
	
	public static function all(){
		$sql = "SELECT * FROM ".static::$table_name;
		return static::findBySql($sql);
	}

	public function showTable(){
		$result = mysql_query("SHOW TABLES");
		echo($result);
	}

	public static function last(){
	//last can be used in any class that infherits it	without instantiation
		$sql = "SELECT * FROM " .static::$table_name." ORDER BY ";
		$sql .= static::$primary_key." DESC LIMIT 1";
		$obj = static::findBysql($sql);
		return ($obj) ? array_shift($obj): false;
		//it will arrange the items from last to first and pick out the first
	}

	public static function where($array){
		$sql = "SELECT * FROM " .static::$table_name." WHERE ";
		$where_array  = array();
		foreach ($array as $key => $value) {
			$where_array [] = "$key='$value'"; 
		}
		$sql.=join(' AND ',$where_array);
		// echo $sql;// exit();
		return static::findBysql($sql);
	}
}
?>