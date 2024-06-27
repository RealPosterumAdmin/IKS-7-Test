<?php

class User
{
	private $id, $name, $email;

	function __construct($id, $name, $email)
	{
		$this->id = $id;
		$this->name = $name;
		$this->email = $email;
	}

	function id()
	{
		return $this->id;
	}

	function name()
	{
		return $this->name;
	}

	function email()
	{
		return $this->email;
	}
}
