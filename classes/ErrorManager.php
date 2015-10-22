<?php  

class ErrorManager {

	public $errors = [''];

	public function addError($name, $message){
		$this->errors[$name] = $message;
	}

	public function getError($name){
		if(array_key_exists($name)){
			return ($this->errors['$name']);
		}
	}

}

?>