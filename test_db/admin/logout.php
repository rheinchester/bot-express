<?php
	include_once ('../includes/session.php');
	include_once ('../includes/function.php');
	if(isset($_SESSION['user_id'])){
		unset($_SESSION['user_id']);
		$session->logout();
	}
	redirect('../../templatemo_488_classic/AdminLogin.php');
?>