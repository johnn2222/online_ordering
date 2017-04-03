<?php

class connect

{

	private $host;

	private $username;

	private $password;

	private $database;

	public



	function __construct()

	{
            //localhost 
            $this->host = 'localhost';

		$this->username = 'root';

		$this->password = '';

		$this->database = 'online_order';
                
//
//		$this->host = '50.62.209.151:3306';
//
//		$this->username = 'lovash_indian';
//
//		$this->password = 'lovash@indian';
//
//		$this->database = 'online_ordering_lovash';

	}



	public



	function getConnected()

	{

		$this->host = @mysql_pconnect($this->host, $this->username, $this->password) or die(mysql_error());

		$this->db = mysql_select_db($this->database, $this->host) or die(mysql_error());

		if ($this->host && $this->db)

		{

			return true;

		}

		else

		{

			return false;

		}

	}



	public



	function checkConnection()

	{

		if ($this->getConnected())

		{

			return true;

		}

		else

		{

			return false;

		}

	}

}



?>