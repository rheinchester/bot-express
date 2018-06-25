<?php

  include_once ('Model.php');
  class Admin extends Model{
    protected $admin_id;//
    public $username;//
    public $email;// 
    public $password;//
    public $admin_name;
    

    public static $class_name = 'Admin';
    public static $primary_key = 'admin_id';
    public static $table_name = 'admin';
    public static $table_fields = array('admin_id','username','email','password','admin_name');


    public function __construct(){
      parent::__construct();
    }

    public function getAdminId(){
      return $this->admin_id;
    }

    public function setAdminId($admin_id){
      return $this->admin_id = $admin_id;
    }

    public static function authenticate($password, $admin_id){
      //the script will see if this password belongs to this particular user and then return the name of the user
      $obj = new static();
      $obj->admin_id = $admin_id;
      $password = md5($password);
      $sql = "SELECT * FROM ".static::$table_name." WHERE admin_id = '$admin_id' AND password = '$password' LIMIT 1";
      $admin = static::findBySql($sql);
      echo $sql;
      return ($admin) ? array_shift($admin) : false;//
    }

      public function setNewAdminId(){
        if($lastAdmin = static::last()){
          $lastId = explode ('/',$lastAdmin->admin_id );
          if (strlen(++$lastId[1])<3) {
            $this->admin_id = 'admin/'.str_repeat('0',3-strlen($lastId[1])).$lastId[1];
          }else{
            $this->admin_id = 'admin/'.$lastId[1];
          } 
        }else{
          $this->admin_id = 'admin/001';
        }      
      }

    public function insertAdmin(){
      $this->setNewAdminId();
      $this->password = md5($this->password);
      // echo $sql;
      return ($this->create()) ? true : false;
    }                                    

    public function nextId(){
      if ($lastAdmin = static::last()) {
        $lastId = $lastAdmin->admin_id;
        }else{
          $lastId = 0;
          }
        return ++$lastId;
    }
    
    public   function delete(){
      $sql = "DELETE FROM ".static::$table_name;
      $sql.= " WHERE admin_id = '{$this->admin_id}'";
      // echo $sql;
      return static::findBySql($sql);
    }
  }

 ?>