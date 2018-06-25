<?php
include_once 'Admin.php';
	class Session{
		public $user_id;
		private $logged_in = false;

		function __construct(){
			session_start();//a built in
			$this->check_login();
		}

		public function check_login(){
			if(isset($_SESSION['user_id'])){
				$this->user_id = $_SESSION['user_id'];
				$this->logged_in = true;
			}else {
				unset($this->user_id);
				$this->logged_in = false;
			}
		}

		public function is_logged_in (){
			return $this->logged_in;
		}

		public function login ($user){
			if($user){
				$this->user_id = $_SESSION['user_id'] = $user->getAdminId();//how is mysql_thread_id()s code working without include or extention...ask lewis or moses
				$this->logged_in = true;
			}
		}
		public function logout (){
			$this->logged_in = false;
			$this->user_id = null;
			session_destroy();
		}
	}
	$session = new Session();
 ?>