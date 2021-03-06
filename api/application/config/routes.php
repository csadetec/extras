<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'servicos';
$route['servicos/(:num)'] = 'servicos/index/$1';
$route['usuarios/(:num)'] = 'usuarios/index/$1';
$route['colaboradores'] = 'servicos/index/';

$route['sair'] = 'usuarios/sair';
$route['login'] = 'usuarios/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
