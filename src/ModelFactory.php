<?php  

namespace App;

class ModelFactory 
{

	private $query = "";
	private $params = []; //Ainda não Implementado totalmente
	private $bind_params = []; //Ainda não Implementado totalmente

	public function select($table, Array $fields = [])
	{
		if(!$fields) {
			$this->query = "SELECT * FROM {$table}";
			$this->params = [];
			$this->bind_params = [];

			return $this;
		}

		$this->query = "SELECT ";

		foreach($fields as $field)  {
			$this->query.="{$field},"; 
		}
		
		$this->query = substr($this->query, 0, -1);
		$this->query.=" FROM {$table}";

		return $this;
	}

	public function insert($table, Array $fields)
	{
		$this->query = "INSERT INTO {$table} (";

		foreach($fields as $field) {
			$this->query.="{$field},";
		}

		$this->query = substr($this->query, 0, -1);
		$this->query.= ") VALUES(";

		foreach($fields as $field) {
			$this->query.=":{$field},";
		}

		$this->query = substr($this->query, 0, -1);	
		$this->query.=")";

		return $this;
	}

	public function update($table, Array $fields)
	{
		$this->query = "UPDATE {$table} SET ";

		foreach($fields as $field) {
			$this->query.="{$field} = :{$field}, ";
		}

		$this->query = substr($this->query, 0, -2);
	
		return $this;
	}

	public function delete($table) 
	{
		$this->query = "DELETE FROM {$table}";

		return $this;
	}

	public function where(Array $params)
	{
		$this->params = $params;
		$this->query.=" WHERE ";

		foreach ($this->params as $field => $value) {

			$this->query.="{$field} = :{$field} AND ";
			$this->bind_params[":{$field}"]=$value; 

		}

		$this->query = substr($this->query, 0, -4);

		return $this;
	}

	public function execute()
	{
		return $this->query;
	}


}

