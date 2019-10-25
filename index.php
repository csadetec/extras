<?php 
	
$REQUEST_URI = filter_input(INPUT_SERVER, 'REQUEST_URI');

$REQUEST_URI_PASTA = substr($REQUEST_URI, 1);

$url = explode('/', $REQUEST_URI_PASTA);
$url[1] = ($url[1] != '' ? $url[1] : 'servicos');


function base_url($s = ''){

	return 'http://'.$_SERVER['SERVER_NAME'].'/extras/'.$s;
}

//$json = file_get_contents(base_url('api/motivos'));
if ($url[1] == 'servicos' and !isset($url[2])):
	$page = './frontendPhp/servicos/servicos_listar.php';

elseif ($url[1] == 'servicos' and $url[2] ==  'cadastrar'):
	$json = file_get_contents(base_url('api/motivos'));
	$motivos = json_decode($json);
	$title = 'Cadastrar Serviço';
	$page = './frontendPhp/servicos/servicos_form.php';

elseif($url[1] == 'servicos' && $url[2] == 'editar' && $url[3] > 0):
	$json = file_get_contents(base_url('api/motivos'));
	$motivos = json_decode($json);
	$title = 'Editar Serviço Nº '.$url[3];
	$page = './frontendPhp/servicos/servicos_form.php';	
else:
	$page = './frontendPhp/default/404.php';
endif;

require('./frontendPhp/load.php');

/*
echo '<pre>';
print_r($url);
print_r($json);
/**/