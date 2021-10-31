<?php 
	session_start();
	include("connect.php");
	
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM users WHERE id=" . $id;
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}

	function isWaiter()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'waiter' ) {
			return true;
		}else{
			return false;
		}
	}

	function isDeliman()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'deliman' ) {
			return true;
		}else{
			return false;
		}
	}

	function isCustomer()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'customer' ) {
			return true;
		}else{
			return false;
		}
	}

?>