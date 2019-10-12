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

function verifica_disponibilidade_group($sc)
{
    foreach($sc as $r):
        
    endforeach;
}

function verifica_disponibilidade($post, $tipo)
{
    $CI = & get_instance();

    //verifica se sc ja esta no servico
    if($s = $CI->servicos_colaboradores_model->select_chapa_id_servico($post['chapa'], $post['id_servico']) and $tipo == 'insert')return  array('msg'=>'Colaborador Já esta agendado neste serviço', 'status'=>false);

    //verifica se sc antes de inserir
    $sc_match = $CI->servicos_colaboradores_model->select_data_chapa($post['data'], $post['chapa']);
    if($sc_match and $tipo == 'insert'):
        foreach($sc_match as $r):
            if($r->horas_inicio <= $post['horas_inicio'] && $post['horas_inicio'] <= $r->horas_fim):    
                return array('msg'=>'Colaborador Já esta agendado neste horário<br>No serviço N° '.$r->id_servico.'<br>Data: '.$r->data_editada.'<br>Início: '.$r->horas_inicio.'<br>Fim: '.$r->horas_fim, 'status'=>false);          
            endif;
            if($r->horas_inicio <= $post['horas_fim'] && $post['horas_fim'] <= $r->horas_fim):    
                return array('msg'=>'Colaborador Já esta agendado neste horário<br>No serviço N° '.$r->id_servico.'<br>Data: '.$r->data_editada.'<br>Início: '.$r->horas_inicio.'<br>Fim: '.$r->horas_fim, 'status'=>false);         
            endif;
        endforeach;
    endif;

    //verifica sc antes de editar
    $sc_match = $CI->servicos_colaboradores_model->select_data_chapa_id_servico_diferente($post['data'], $post['chapa'], $post['id_servico']);
    if($sc_match and $tipo == 'update'):
        foreach($sc_match as $r):
            if($r->horas_inicio <= $post['horas_inicio'] && $post['horas_inicio'] <= $r->horas_fim):    
                return array('msg'=>'Colaborador Já esta agendado neste horário<br>No serviço N° '.$r->id_servico.'<br>Data: '.$r->data_editada.'<br>Início: '.$r->horas_inicio.'<br>Fim: '.$r->horas_fim, 'status'=>false);          
            endif;
            if($r->horas_inicio <= $post['horas_fim'] && $post['horas_fim'] <= $r->horas_fim):    
                return array('msg'=>'Colaborador Já esta agendado neste horário<br>No serviço N° '.$r->id_servico.'<br>Data: '.$r->data_editada.'<br>Início: '.$r->horas_inicio.'<br>Fim: '.$r->horas_fim, 'status'=>false);         
            endif;
        endforeach;
    endif;

    return array('status'=>true);
    //return  array('msg'=>'nao foi cadastrado neste serviço');

  

    /*
    foreach ($sc as $r) {
        if($r->horas_inicio <= $inicio_new && $inicio_new <= $r->horas_fim)return $r;
        if($r->horas_inicio <= $fim_new && $fim_new <= $r->horas_fim)return $r;
    }
   
  
    return false;
    /** */
}
?>