<?php  

require_once('Validator.php');

class PasswordValidator extends Validator {
	
	protected $pattern = '/^[a-zA-Z0-9!@#$%^&*\(\)]{5,}$/';

}