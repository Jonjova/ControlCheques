<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CuentasModel extends CI_Model 
{

	public function mostrarCuenta()
	{
		$this->db->select('d.id_datos_cuenta,d.nombre_de,d.digitos_cuenta,tb.nombre_banco');
		$this->db->join('tipo_bancos tb','d.id_tipo_banco = tb.id_tipo_banco');
		$this->db->from('datos_cuenta d');
		$query = $this->db->get();
		//return $query->result_array();
		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
			$data = $query->result_array();
		}
		return $data;
	}

	//Tabla cuenta insertar 
	public function insertarCuenta($data)
	{
		if ($this->db->insert('datos_cuenta',$data)) {
			return true;
		}else{
			return false;
		}	
	}
	
	//Obtener Cheque Id
	public function obtenCuentaId($where)
	{
		$query = $this->db->select('*')
		->from('datos_cuenta d')
		->join('tipo_bancos tb','d.id_tipo_banco = tb.id_tipo_banco')
		->where($where)
		->get();                         
		return $query->row_array();
	}

	//Actualizar
	public function actualizarCuenta($tablename,$data,$where)
	{
		$query = $this->db->update($tablename,$data,$where);
		return $query;
	}
	//buscar  cuenta existente
	public function OIC($valor)
	{
		$this->db->select('d.id_datos_cuenta,d.nombre_de,d.digitos_cuenta,tb.nombre_banco');

		$this->db->from('datos_cuenta d');
		$this->db->join('tipo_bancos tb ', 'd.id_tipo_banco = tb.id_tipo_banco');
		$this->db->like('d.digitos_cuenta', $valor); 
		return $this->db->get()->row_array();
	}


	// VALIDAR CUENTA
	public function findCuenta($valor)
	{
		$this->db->where('digitos_cuenta', $valor);
		return $this->db->get('datos_cuenta')->result();
	}
}