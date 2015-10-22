<?php  

class LoginOptions {

	public function isLoggedIn() {
		header('Location: account.php');
		exit();
	}

	public function isNotLoggedIn() {
		header('Location: index.php');
		exit();
	}

	public function logout(){
		session_unset();
		session_destroy();
	}

}

