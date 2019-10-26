<?php 
	
$REQUEST_URI = filter_input(INPUT_SERVER, 'REQUEST_URI');

$REQUEST_URI_PASTA = substr($REQUEST_URI, 1);

$url = explode('/', $REQUEST_URI_PASTA);
$url[1] = ($url[1] != '' ? $url[1] : 'servicos');


function base_url($s = ''){

	return 'http://'.$_SERVER['SERVER_NAME'].'/extras/'.$s;
}

//usuario lista
if($url[1] == 'usuarios'):
	$data = file_get_contents(base_url('api/index.php/perfis'));
	$data = json_decode($data);
	$perfis = $data->perfis;
	$page = './frontendPhp/usuarios/usuarios_listar.php';
	require('./frontendPhp/load.php');

//login do usuario
elseif($url[1] == 'login'):
	require('./frontendPhp/usuarios/usuarios_login.php');

//servicos listar
elseif ($url[1] == 'servicos' and !isset($url[2])):
	$data = file_get_contents(base_url('api/servicos'));
	$data = json_decode($data);
	$servicos = $data->servicos;
	$page = './frontendPhp/servicos/servicos_listar.php';
	require('./frontendPhp/load.php');

elseif ($url[1] == 'servicos' and $url[2] ==  'cadastrar'):
	$json = file_get_contents(base_url('api/motivos'));
	$motivos = json_decode($json);
	$title = 'Cadastrar Serviço';
	$page = './frontendPhp/servicos/servicos_form.php';
	require('./frontendPhp/load.php');

elseif($url[1] == 'servicos' && $url[2] == 'editar' && $url[3] > 0):
	$json = file_get_contents(base_url('api/motivos'));
	$motivos = json_decode($json);
	$title = 'Editar Serviço Nº '.$url[3];
	$page = './frontendPhp/servicos/servicos_form.php';	
	require('./frontendPhp/load.php');

elseif($url[1] == 'relatorios'):
	$page = './frontendPhp/relatorios/relatorios_listar.php';
	require('./frontendPhp/load.php');
else:
	$page = './frontendPhp/default/404.php';
	require('./frontendPhp/load.php');

endif;

/*
echo '<pre>';
$url = base_url('api/index.php/setup');
$data = file_get_contents(base_url('api/index.php/setup'));
$data = json_decode($data);
print_r($data);
/**/