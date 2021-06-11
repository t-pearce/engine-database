<?php

namespace Engine\Database\Model;

class RowDefinition extends \Engine\Model\Model
{
	public string $name;
	public string $type;
	public array $constraints = [];

	public function __toString()
	{
		return "{$this->name} {$this->type} " . implode(" ", $this->constraints);
	}
}