<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// la "c" es un alias para poder hacer mas corto el nombre del modelo 
		$this->load->model('AjaxModel','c',true);
	}

	public function index()
	{
		//Encabezado 
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		//Body

		$this->load->view('Beneficiario/Mostrar');
		$this->load->view('Beneficiario/Agregar');
		$this->load->view('Beneficiario/Actualizar');
		$this->load->view('Beneficiario/verInfo');
		
		//Pie de pagina
		$this->load->view('layout/footer');
	}
	public function Inicio()
	{
		//Encabezado 
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		//Body

		$this->load->view('Inicio');
		//Pie de pagina
		$this->load->view('layout/footer');
	}

	
	//LLenar select con ajax 
	public function obtTBancos()
	{
		$datos = $this->c->tipoBancos();
		echo json_encode($datos);
	}
	//LLenar select con ajax 
	public function obtNombreDe()
	{

		$id_datos_cuenta = $this->input->post('id_tipo_banco');
		$datos = $this->c->obtDatosCuenta($id_datos_cuenta);
		echo json_encode($datos);
		
	}
	//Obtener el id un Cheque 
	public function obtenerIdCheque($idCheque)
	{
		$resultData = $this->c->obtenCheqId(array('id_cheques'=>$idCheque ));
		//Codificamos a json par aobtener la respuesta. 
		echo json_encode($resultData);	
	}
	
	//Mostrar con ajax y datatable
	public function MostrarCheques()
	{
		$resultList = $this->c->mostrarCheques();
		$result = array();
		//$ver = ''; 
		$i = 1;

		foreach ($resultList as $key => $value) {
			//boton para ver detalles de cheques
			$ver = '<a data-backdrop="static" onclick="verInfo('.$value['id_cheques'].')"  ><i class="far fa-eye"></i> </a> ';	
			$fcheque = date_format(date_create_from_format('Y-m-d', $value['fecha_chueque']), 'd-m-Y');
			$result['data'][] = array(
				$i++,
				$value['nombre_banco'],
				$value['nombre_de'],
				$fcheque,
				'$'.$value['monto'],
				$ver 
				);
		}
		echo json_encode($result);
	}

	//Metodo Guardar 
	public function Guardar()
	{
		//Datos de tabla  "Cheque"
		$config = [
		"upload_path" => "uploads/",
		'allowed_types' => "png|jpg"
		];

		$this->load->library("upload",$config);
		if ($this->upload->do_upload('foto')) {
			$data = array("foto" => $this->upload->data());
			//$imagen = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', $_FILES['foto']['name']);
			$datos = array('numero_cheque' =>$this->input->post('numero_cheque'),
				'id_datos_cuenta' =>$this->input->post('nombre_de'),
				'fecha_chueque' => date('Y-m-d'),
				'foto' =>$data['foto']['file_name'], 
				'monto' =>$this->input->post('monto')
				);

			$insert = $this->c->insertarCheques($datos);
			if($insert == TRUE )
			{
				echo "true";
			}

		}else{
			echo $this->upload->display_errors();
		}
		
	}

}
