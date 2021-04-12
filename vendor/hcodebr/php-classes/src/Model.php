<?php

namespace Hcode;

class Model{

	private $valores = [];

	public function __call($nome, $args)
	{

		$tipo_do_metodo = substr($nome, 0, 3);
		$nomecampo = substr($nome, 3, strlen($nome));

		switch ($tipo_do_metodo) 
		{
		
			case 'get':
				return $this->valores[$nomecampo];
			break;
			
			case 'set':
				$this->valores[$nomecampo] = $args[0];
			break;
		}

	}

	public function setData($data = array()){
		foreach ($data as $indice_do_campo => $valor_do_campo){
			$this->{"set".$indice_do_campo}($valor_do_campo);
		}
	}

	public function getValues(){
		return $this->valores;
	}

}

?>
