<?php

namespace Engine\Database\Query;

class CustomPreparedQuery extends PreparedQuery
{
	public function setQuery(string $query) : self
	{
		$this->query = $query;
	
		return $this;
	}
	public function setParams(array $params) : self
	{
		$this->params = $params;
	
		return $this;
	}
}