<?php 

error_reporting(E_ALL);
 
/* Habilita a exibição de erros */
ini_set("display_errors", 1);
	
require_once './dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$REQUEST_URI = filter_input(INPUT_SERVER, 'REQUEST_URI');

$REQUEST_URI_PASTA = substr($REQUEST_URI, 1);

$url = explode('/', $REQUEST_URI_PASTA);
$url[1] = ($url[1] != '' ? $url[1] : 'login');



function base_url($s = ''){

	return 'http://'.$_SERVER['SERVER_NAME'].'/extras/'.$s;
}

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

elseif($url[1] == 'relatorios' and !isset($url[2])):
	$page = './frontendPhp/relatorios/relatorios_listar.php';
	require('./frontendPhp/load.php');
elseif($url[1] == 'relatorios' and $url[2] == 'pdf'):
	
	$start = $url[3];
	$end = isset($url[4]) ? $url[4]:'';
	$data = file_get_contents(base_url('api/index.php/relatorios/filter/'.$start.'/'.$end));
	$data = json_decode($data);


	// instantiate and use the dompdf class
	$dompdf = new Dompdf();

	ob_start();
	require __DIR__.'/frontendPhp/relatorios/relatorios_listar_pdf.php';
	$dompdf->loadHtml(ob_get_clean());

	$dompdf->setPaper('A4');

  $dompdf->render();

	// Output the generated PDF to Browser
	$dompdf->stream($start.' | '.$end.'.pdf', ['Attachment'=>false]);
	/** */

else:
	$page = './frontendPhp/default/404.php';
	require('./frontendPhp/load.php');

endif;
