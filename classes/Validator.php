<?php  

class Validator {

	protected $pattern = '';

	public function isValid($x){
		return preg_match($this->pattern, $x);
	}	

}