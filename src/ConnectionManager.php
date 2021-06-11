<?php

namespace Engine\Database;

class ConnectionManager
{
	use \Engine\Traits\Singleton;

	private function getConnection()
	{
		$connection_string_parts = 
		[
			"dbname"   => \Engine\ConfigManager::getInstance()->get(\Engine\Database\Config::DATABASE_TABLE),
			"user"     => \Engine\ConfigManager::getInstance()->get(\Engine\Database\Config::DATABASE_USER),
			"password" => \Engine\ConfigManager::getInstance()->get(\Engine\Database\Config::DATABASE_PASSWORD)
		];

		$conn_string = "";

		foreach($connection_string_parts as $key => $value)
		{
			$conn_string .= "{$key}='{$value}'";
		}

		return \pg_connect($conn_string);
	}

	public function execute(\Engine\Database\Query\PreparedQuery $query)
	{
		if(empty($query->getParams()))
			return pg_query($this->getConnection(), $query->getQuery());
		else return pg_query_params($this->getConnection(), $query->getQuery(), $query->getParams());
	}
}