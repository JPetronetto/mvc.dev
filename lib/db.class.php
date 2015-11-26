<?php 

Class DB extends PDO
{
	
	private static $instance;
	
	public function DB($dsn = "", $username = "", $password = "", $options = "") 
	{
		// The PDO constructor.
		parent::__construct($dsn, $username, $password, $options);
	}

	public static function getInstance() 
	{
		// If the instance don't exists a one new is created.
		if(!isset(self::$instance)) 
		{
			try 
			{
				self::$instance = new DB(Config::get('db.dsn'), Config::get('db.user'), Config::get('db.pass'), Config::get('db.opt'));
			}
			catch (PDOException $e) 
			{
				echo 'Could not connect the database. Error: ' . $e->getMessage();
				exit ();
			}
		}
		// If the instance already exists, this is returned.
		return self::$instance;
	}

	public function query($sql)
	{
		if (!self::$instance) 
		{
			return false;
		}

		try
		{
			$result = self::$instance->prepare($sql);
			$result->execute();
		}
		catch (PDOException $e) 
		{
			echo 'Could not perform the query. Error: ' . $e->getMessage();
			exit ();
		}

		if (is_bool($result)) 
		{
			return $result;
		}

		$data = array();

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			$data[] = $row;
		}

		return $data;
	}
}