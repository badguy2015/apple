<?php

namespace Model;

Class UserModel extends \core\lib\model
{
	public function __construct()
	{
		$this->table = 'user';
		parent::__construct();
	}
}