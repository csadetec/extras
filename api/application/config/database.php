<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$active_group = 'default';

//$active_group = $_SERVER['SERVER_NAME'] == '10.20.0.26' ? 'default' : 'eohost';


$query_builder = TRUE;


$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'userdb',
	'password' => 'userdb_server',
	'database' => 'extras',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);


$db['eohost'] = array(
	'dsn'	=> '',
	'hostname' => 'fdb25.eohost.com',
	'username' => '3188098_csadetec',
	'password' => 'Csact2018',
	'database' => 'extras',
	'dbdriver' => 'mysqli',
	'dbprefix' => 'extras_',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
