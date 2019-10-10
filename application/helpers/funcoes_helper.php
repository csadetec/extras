<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function rename_title($t)
{
    $t = strtolower($t);
    if($t == 'nome')return 'nome_colaborador';
    if($t == 'nome funcao')return 'cargo';
    if($t == 'descricao secao')return 'descricao_secao';
    
    return $t;
}

function diff_date($inicio, $fim)
{
        
    $dif =  gmdate('H:i', strtotime($fim) - strtotime($inicio));
    return $dif;
}

function verifica_login()
{
    $CI = & get_instance();

    if (!$CI->session->userdata('logged'))redirect('login');
}

function is_admin($leave  = false)
{
    verifica_login();
    $CI = & get_instance();


    if($CI->session->userdata('nome_perfil') == 'ADMINISTRADOR')return true;
    if($leave)redirect('');
    return false;
}
function strclear($string)
{
    $search = array('Ã','ã','Ç','ç');
    $replace= array('a','a','c', 'c');
    $string = str_replace($search, $replace, $string);
    $string = strtolower($string);

    return $string;
}

function verifica_disponibilidade($sc, $inicio_new, $fim_new)
{
    foreach ($sc as $r) {
        if($r->horas_inicio <= $inicio_new && $inicio_new <= $r->horas_fim)return $r;
        if($r->horas_inicio <= $fim_new && $fim_new <= $r->horas_fim)return $r;
    }
   
  
    return false;
}
?>