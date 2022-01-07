<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuentas extends CI_Controller {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('CuentasModel','cm',true);
		$this->load->model('AjaxModel','c',true);
	}

	public function index()
	{
		//Encabezado 
		$data = array('title' => 'Cuenta' );
		$this->load->view('layout/header',$data);
		$this->load->view('layout/sidebar');
		//Body
		$this->load->view('Cuentas/MostrarCuenta');
		$this->load->view('Cuentas/AgregarCuenta');
		$this->load->view('Cuentas/ActualizarCuenta');
		//Pie de pagina
		$this->load->view('layout/footer');
	}

		//Mostrar con ajax y datatable
	public function MostrarCuenta()
	{
		$resultList = $this->cm->mostrarCuenta();
		$result = array();
		//$editar = ''; 
		$i = 1;

		foreach ($resultList as $key => $value) {

			$editar = '<a onclick="obtenIdCuenta('.$value['id_datos_cuenta'].')" > <i class="fas fa-edit fa-lg"></i></a> ';
			$result['data'][] = array(
				$i++,
				$value['digitos_cuenta'],
				$value['nombre_de'],
				$value['nombre_banco'],
				$editar 
				);
		}
		echo json_encode($result);
	}

		//LLenar select con ajax 
	public function obtTB()
	{
		$datos = $this->c->tipoBancos();
		echo json_encode($datos);
	}

	//Metodo Guardar Cuenta
	public function Guardar()
	{
		
		$insert = $this->cm->insertarCuenta($_POST);
		if($insert == true )
		{
			echo "true";
		}	
	}

		//Obtener el id un Cheque 
	public function obtenerIdCuenta($id_datos_cuenta)
	{
		$resultData = $this->cm->obtenCuentaId(array('id_datos_cuenta'=>$id_datos_cuenta ));
		//Codificamos a json par aobtener la respuesta. 
		echo json_encode($resultData);	
	}
	
	//Metodo Actualizar 
	public function Actualizar()
	{

		$where =$this->input->post('id_datos_cuenta');
		$editar = $this->cm->actualizarCuenta('datos_cuenta',$_POST,array('id_datos_cuenta'=>$where));

		if ($editar == TRUE) 
		{
			echo "true";
		}else{
			echo "false";
		}

	}

}