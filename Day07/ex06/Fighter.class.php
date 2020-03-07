<?php

abstract class Fighter {
	public $class_name = NULL;

abstract function fight($target);
public function __construct($name) {
	$this->class_name = $name;
        }
}
?>