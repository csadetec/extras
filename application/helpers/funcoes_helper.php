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

function diff_hours($inicio, $fim)
{
        
    $dif =  gmdate('H:i', strtotime($fim) - strtotime($inicio));
    list($h, $m) = explode(':', $dif);
    $minutos_total = $h*60+$m;
    return $minutos_total;
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

function verifica_all_sc($sc, $post, $tipo)
{
    //crie a var $post para relacionar com a funcao verifica_disponibilidade()
    //
    foreach($sc as $r):
        $post['chapa'] = $r->chapa;
        $post['id_servico'] = $r->id_servico;
        // return $post;
        $d = verifica_disponibilidade($post, $tipo);
        if(!$d['status'])return $d;
          /** */  
    endforeach;
    return array('status'=> 'true');
}

function verifica_disponibilidade($post, $tipo)
{
    $CI = & get_instance();
    
    $inicio_new = strtotime($post['horas_inicio']);
    $fim_new = strtotime($post['horas_fim']);

    if($CI->servicos_colaboradores_model->select_chapa_id_servico($post['chapa'], $post['id_servico']) and $tipo == 'insert')return  array('msg'=>'Colaborador Já esta agendado neste serviço', 'status'=>false);

    //verifica se sc antes de inserir
    $sc_match = $CI->servicos_colaboradores_model->select_data_chapa($post['data'], $post['chapa']);
    if($sc_match and $tipo == 'insert'):
        foreach($sc_match as $r):
            $v = verifica_horas($r, $inicio_new, $fim_new);
            if(!$v['status'])return $v;
        endforeach;
    endif;

    //verifica sc antes de editar
    $sc_match = $CI->servicos_colaboradores_model->select_data_chapa_id_servico_diferente($post['data'], $post['chapa'], $post['id_servico']);
   // return array($sc_match, $post);
    if($sc_match and $tipo == 'update'):
        foreach($sc_match as $r):
            $v = verifica_horas($r, $inicio_new, $fim_new);
            if(!$v['status'])return $v;
        endforeach;
    endif;

    return array('status'=>true);
    
}

function verifica_horas($sc, $inicio_new, $fim_new)
{
    $inicio = strtotime($sc->horas_inicio);
    $fim = strtotime($sc->horas_fim);        

    if($inicio < $inicio_new && $inicio_new < $fim)return array('status'=>false, 'msg'=>msg($sc));          
    if($inicio < $fim_new && $fim_new < $fim)return array('status'=>false, 'msg'=>msg($sc));          
    if($inicio_new < $inicio && $inicio < $fim_new)return array('status'=>false, 'msg'=>msg($sc));          
    if($inicio_new < $fim && $fim < $fim_new)return array('status'=>false, 'msg'=>msg($sc));          
    return array('status'=>true);
}

function msg($sc)
{
    return  $sc->nome_colaborador.'<hr> Esta agendado neste horário<br>No serviço N° '.$sc->id_servico.'<br>Data: '.$sc->data_editada.'<br>Horário: '.$sc->horas_inicio.' às '.$sc->horas_fim; 
}
?>