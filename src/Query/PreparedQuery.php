<?php

namespace Engine\Database\Query;

class PreparedQuery
{
	private string $query;
	private array $params = [];
	
	public function getParams() : array
	{
		return $this->params;
	}
	public function getQuery() : string
	{
		return $this->query;
	}
}