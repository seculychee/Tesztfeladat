<?php

require_once("Config/database.php");

class User{
	private $email;
	
	function __construct($email){
		$this->email = $email;
	}
	public function getEmail(){
		return $this->email;
	}

	public static function login($email,$password){
		$db = DB::get();
        $selectString ="
		SELECT ID 
			FROM users 
				WHERE 
					email='".$email."' 
					AND 
					password='".$password."'
		";
        if($db->getNumRow($selectString) > 0)
			return true;

		else 
			return false;
	}
	public static function insertUser($firstname,$lastname, $email, $password){

		$db = db::get();
		$insertString= "INSERT INTO `users` (`firstname`,`lastname`,`email`,`password`) VALUES ('".$firstname."','".$lastname."', '".$email."','".$password."')";	;
		$result = $db->query($insertString);
		return $result;


}
}

 ?>