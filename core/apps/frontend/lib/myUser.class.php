<?php

class myUser extends sfBasicSecurityUser
{ 
	public function setName($name)
	{
		$this->setAttribute('name',$name);
	}
	
	public function getName()
	{
		return $this->getAttribute('name','Test User');
	}
}
