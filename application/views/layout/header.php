<!DOCTYPE html>
<html>
<head>
	
	<title><?= $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Icono USAM -->
	<link rel="icon" type="image/gif" href="<?php echo base_url();?>assets/img/libro.png">
	<!--dataTables para búsqueda y paginación al mostrar los datos -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
	<!--Recursos Diseño y alertas -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/sweetalert2.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/Estilo.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-select.css');?>">
	<!--Para evitar cualquier bloqueo al DOM se incluye aqui-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--Mascará de campos-->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.maskedinput.js"></script>
</head>
