<?php

class DbConnect{
	public $_db=null;
	public $_sql="";
	public $_cursor=null;
	function DBconnect()
	{
		//construct new PDO
		$this->_db = new PDO('mysql:host=localhost;dbname=etutor', 'root', '');
		//set the collation by utf8
		$this->_db->query('set names "utf8"');
	}
	public function setQuery($sql)
	{
		//set the query
		$this->_sql = $sql;
	}
	public function execute($options=array())
	{
		$this->_cursor=$this->_db->prepare($this->_sql);
		//set the parameter if the query has parameter
		if($options)
			for($i=0;$i<count($options);$i++)
				$this->_cursor->bindParam($i+1, $options[$i]);

			//execute sql statement
			$this->_cursor->execute();
			return $this->_cursor;
	}
	public function getAllRows($options=array())
	{
		if(!$options)
		{
			if(!$result=$this->execute())
				return false;
		}
		else
		{
			if(!$result=$this->execute($options))
				return false;
		}
		//call fetchALL to return data by list of object
		return $result->fetchAll(PDO::FETCH_OBJ);
	}
	public function getOneRow($options=array())
	{
		if(!$options)
		{
			if(!$result=$this->execute())
				return false;
		}
		else
		{
			if(!$result=$this->execute($options))
				return false;
		}
		//call fetchALL to return data by list of object
		return $result->fetch(PDO::FETCH_OBJ);
	}
	public function getLastInserted()
	{
		return $this->_db->lastInsertId();

	}
	public function dbDisconnect()
	{
		$this->_db=null;
	}
}

?>