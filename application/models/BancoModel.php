<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BancoModel extends CI_Model 
{

	public function mostrarBanco()
	{
		$this->db->select('*');
	
		$this->db->from('tipo_bancos');
		$query = $this->db->get();
		//return $query->result_array();
		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
			$data = $query->result_array();
		}
		return $data;
	}

	//Tabla banco insertar 
	public function insertarBanco($data)
	{
		if ($this->db->insert('tipo_bancos',$data)) {
			return true;
		}else{
			return false;
		}	
	}

	//Obtener banco Id
	public function obtenBancoId($where)
	{
		$query = $this->db->select('*')
		->from('tipo_bancos')
		->where($where)
		->get();                         
		return $query->row_array();

	}

		//Actualizar
	public function actualizarBanco($tablename,$data,$where)
	{
		$query = $this->db->update($tablename,$data,$where);
		return $query;
	}
}