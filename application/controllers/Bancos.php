<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bancos extends CI_Controller {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('BancoModel','bm',true);
	}

	public function index()
	{
		//Encabezado 
		$data = array('title' => 'Banco' );
		$this->load->view('layout/header',$data);
		$this->load->view('layout/sidebar');
		//Body
		$this->load->view('Bancos/MostrarBancos');
		$this->load->view('Bancos/AgregarBancos');
		$this->load->view('Bancos/ActualizarBancos');
		//Pie de pagina
		$this->load->view('layout/footer');
	}
	//Mostrar con ajax y datatable
	public function MostrarBancos()
	{
		$resultList = $this->bm->mostrarBanco();
		$result = array();
		$editar = ''; 
		$i = 1;

		foreach ($resultList as $key => $value) {

			$editar = '<a onclick="obtenIdBanco('.$value['id_tipo_banco'].')" > <i class="fas fa-edit fa-lg"></i></a> ';
			$result['data'][] = array(
				$i++,
				$value['nombre_banco'],
				$editar 
				);
		}
		echo json_encode($result);
	}

	//Metodo Guardar Cuenta
	public function Guardar()
	{
		
		$insert = $this->bm->insertarBanco($_POST);
		if($insert == true )
		{
			echo "true";
		}	
	}
	//Metodo Actualizar 
	public function Actualizar()
	{

		$where =$this->input->post('id_tipo_banco');
		$editar = $this->bm->actualizarBanco('tipo_bancos',$_POST,array('id_tipo_banco'=>$where));

		if ($editar == TRUE) 
		{
			echo "true";
		}else{
			echo "false";
		}

	}
	//Obtener el id un banco 
	public function obtenerIdBanco($idBanco)
	{
		$resultData = $this->bm->obtenBancoId(array('id_tipo_banco'=>$idBanco ));
		//Codificamos a json par aobtener la respuesta. 
		echo json_encode($resultData);
	}

}