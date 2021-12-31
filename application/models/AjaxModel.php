<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxModel extends CI_Model 
{
	//Mostrar la vista de Cheques
	// result_array devuelve datos de tipo de matriz asociativa. 
	public function mostrarCheques()
	{
		
		$this->db->select('*');
		$this->db->from('cheques');
		$query = $this->db->get();
		//return $query->result_array();
		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
			$data = $query->result_array();
		}

		return $data;
	}

	//llenado Select 
	public function obtTB()
	{
		$datos = $this->db->get('TipoBanco');
		return $datos->result_array();
	}

	//Tabla cheques insertar 
	public function insertarCheques($data)
	{
		if ($this->db->insert('cheques',$data)) {
			return true;
		}else{
			return false;
		}
		
	}
	
	//Obtener Cheque Id
	public function obtenCheqId($where)
	{
		$query = $this->db->select('*')
		->from('cheques')
		->where($where)
		->get();                         
		return $query->row_array();

	}

}
?>