<?php
class Cliente
{
	private $DNI;
	private $Nombre;
	private $Dirección;
	private $Teléfono;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}