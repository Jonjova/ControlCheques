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
		//Body
		$this->load->view('Beneficiario/Mostrar');
		$this->load->view('Beneficiario/Agregar');
		$this->load->view('Beneficiario/Actualizar');
		$this->load->view('Beneficiario/verInfo');
		
		//Pie de pagina
		$this->load->view('layout/footer');
	}
	//LLenar select con ajax 
	public function obtTipoBanco()
	{
		$datos = $this->c->obtTB();
		echo "<option selected disabled value=''>Seleccionar...</option>";
		foreach ($datos as $s) {
			echo "<option value='".$s['idBanco']."'>".$s['nombreBanco']."</option>";
		}
	}
	//Obtener el id un Cehque 
	public function obtenerIdCheque($idCheque)
	{
		$resultData = $this->c->obtenCheqId(array('id_beneficiario'=>$idCheque ,));
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
			$ver = '<a data-backdrop="static" onclick="verInfo('.$value['id_beneficiario'].')"  ><i class="far fa-eye"></i> </a> ';	
			$result['data'][] = array(
				$i++,
				$value['beneficiario'],
				$value['fecha_chueque'],
				$value['foto'],
				$value['monto'],
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
			$datos = array('beneficiario' =>$this->input->post('beneficiario'), 
				'numero_cheque' =>$this->input->post('numero_cheque'),
				'cuenta_bancaria' =>$this->input->post('cuenta_bancaria'),
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
