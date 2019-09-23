<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['sair'] = 'usuarios/sair';
$route['login'] = 'usuarios/login';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
