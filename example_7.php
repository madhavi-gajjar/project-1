<?php
class Person{
	public function __construct($name){
		$this->name= $name;
	}
}

class Company{
	protected $staff;
	public function _construct(Staff $staff){
		
	}
	public function hire(Person $person){
	$this->staff->add($person);	
	}
}

class Staff{
	protected  $members= array();
	public function add(Person $person){
		$this->staff= $person;
	}
}
?>
