<?php

class loginDB
{
private $logindb;

public function __construct()
{
	$this->logindb = new mysqli("localhost","root","Rootsql2019.","NewDB");

	if ($this->logindb->connect_errno != 0)
	{
		echo "Error connecting to database: ".$this->logindb->connect_error.PHP_EOL;
		exit(1);
	}
	echo "correctly connected to database".PHP_EOL;
}

public function validateLogin($username,$password)
{
	$un = $this->logindb->real_escape_string($username);
	$pw = $this->logindb->real_escape_string($password);
	$statement = "select * from users where username = '$un' and password = '$pw' ";
	$response = $this->logindb->query($statement);

	while ($row = $response->fetch_assoc())
	{
		echo "checking if user $un is in the database...\n";

		if($row["username"] == $un)
		{
			echo "$un is in the database.\n";
			//return 1;	
		}

		else
		{
			echo "$un is not in the database.\n";
		}	
		
		echo "checking password for $username".PHP_EOL;

		if ($row["password"] == $pw)
		{
			echo "passwords match for $username".PHP_EOL;
			return 1;
		}
		
		
		echo "passwords did not match for $username".PHP_EOL;		
		
	}

	return 0;//no users matched username
}

public function validateRegister($username,$password)
{
	$un = $this->logindb->real_escape_string($username);
	$pw = $this->logindb->real_escape_string($password);
	$statement = "select * from users where username = '$un'";
	$response = $this->logindb->query($statement);

	if( $response->num_rows == 0) #account doesn't exist already, createone
	{
	
		$statement = "INSERT INTO users (username, password) VALUES('$un', '$pw') ";
		$this->logindb->query($statement) or die ($this->logindb->error);
		echo "Account created successfully".PHP_EOL;
		return 1;
	}

	else
	{
		echo "Account already exists".PHP_EOL;
		return 0;// Account already exists.
	}


}




}
?>
