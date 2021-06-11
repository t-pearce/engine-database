<?php

namespace Engine\Database\Query;

use Engine\Database\Model\RowDefinition;

class CreateTableQuery extends PreparedQuery
{
	private string $tableName;
	/** @var RowDefinition[] */
	private array $rowDefinitions;

	public function getQuery() : string
	{
		$rowDefinitionPrepared = [];

		foreach($this->rowDefinitions as $key => $rowDefintion)
		{
			$rowDefinitionPrepared[] = $rowDefintion->__toString();
		}

		return "CREATE TABLE {$this->tableName} (
			" . implode("\n", $rowDefinitionPrepared) . "
		)";
	}
	
	public function getRowDefinitions() : array
	{
		return $this->rowDefinitions;
	}
	public function setRowDefinitions(array $rowDefinitions) : self
	{
		$this->rowDefinitions = $rowDefinitions;
	
		return $this;
	}
	
	public function getTableName() : string
	{
		return $this->tableName;
	}
	public function setTableName(string $tableName) : self
	{
		$this->tableName = $tableName;
	
		return $this;
	}
}