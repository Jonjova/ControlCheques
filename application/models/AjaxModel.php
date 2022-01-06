<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxModel extends CI_Model 
{
	//Mostrar la vista de Cheques
	// result_array devuelve datos de tipo de matriz asociativa. 
	public function mostrarCheques()
	{
		$this->db->select('c.id_cheques,t.nombre_banco,d.digitos_cuenta as numero_cuenta,d.nombre_de,c.fecha_chueque,c.monto');
		$this->db->join('datos_cuenta d','c.id_datos_cuenta = d.id_datos_cuenta');
		$this->db->join('tipo_bancos t','d.id_tipo_banco = t.id_tipo_banco');
		$this->db->from('cheques c');
		$query = $this->db->get();
		//return $query->result_array();
		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
			$data = $query->result_array();
		}
		return $data;
	}

	//llenado Select  
	public function tipoBancos()
	{
		$datos = $this->db->get('tipo_bancos');
		return $datos->result_array();
	}

	//llenado Select  Datos cuentas
	public function obtDatosCuenta($id_tipo_banco)
	{
		/*$datos = $this->db->get('datos_cuenta');
		return $datos->result_array();*/
		$query = $this->db->get_where('datos_cuenta',array('id_tipo_banco' => $id_tipo_banco));
		return $query->result_array();
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
		->from('cheques c')
		->join('datos_cuenta d','c.id_datos_cuenta = d.id_datos_cuenta')
		->join('tipo_bancos t','d.id_tipo_banco = t.id_tipo_banco')
		->where($where)
		->get();                         
		return $query->row_array();
	}

}
?>