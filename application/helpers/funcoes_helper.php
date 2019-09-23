<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function cod_curso($codcur, $codper)
{

    if($codcur == '22' and $codper == '1')return 'EF 1º Ano | CONTAGEM';
    if($codcur == '22' and $codper == '2')return 'EF 2º Ano | CONTAGEM';
    if($codcur == '22' and $codper == '3')return 'EF 3º Ano | CONTAGEM';
    if($codcur == '22' and $codper == '4')return 'EF 4º Ano | CONTAGEM';
    if($codcur == '22' and $codper == '5')return 'EF 5º Ano | CONTAGEM';
    if($codcur == '22' and $codper == '6')return 'EF 6º Ano | CONTAGEM';
    if($codcur == '22' and $codper == '7')return 'EF 7º Ano | CONTAGEM';
    if($codcur == '22' and $codper == '8')return 'EF 8º Ano | CONTAGEM';
    if($codcur == '22' and $codper == '9')return 'EF 9º Ano | CONTAGEM';

    if($codcur == '23' and $codper == '1')return 'EM 1º Série | CONTAGEM';
    if($codcur == '23' and $codper == '2')return 'EM 2º Série | CONTAGEM';
    if($codcur == '23' and $codper == '3')return 'EM 3º Série | CONTAGEM';

    if($codcur == '102' and $codper == '1')return 'EF 1º Ano | GUTIERREZ';
    if($codcur == '102' and $codper == '2')return 'EF 2º Ano | GUTIERREZ';
    if($codcur == '102' and $codper == '3')return 'EF 3º Ano | GUTIERREZ';
    if($codcur == '102' and $codper == '4')return 'EF 4º Ano | GUTIERREZ';
    if($codcur == '102' and $codper == '5')return 'EF 5º Ano | GUTIERREZ';
    if($codcur == '102' and $codper == '6')return 'EF 6º Ano | GUTIERREZ';
    if($codcur == '102' and $codper == '7')return 'EF 7º Ano | GUTIERREZ';
    if($codcur == '102' and $codper == '8')return 'EF 8º Ano | GUTIERREZ';
    if($codcur == '102' and $codper == '9')return 'EF 9º Ano | GUTIERREZ';

    if($codcur == '103' and $codper == '1')return 'EM 1º Série | GUTIERREZ';
    if($codcur == '103' and $codper == '2')return 'EM 2º Série | GUTIERREZ';
    if($codcur == '103' and $codper == '3')return 'EM 3º Série | GUTIERREZ';


    return 'CONFIGURAR CURSO CODCUR '.$codcur.' CODPER '.$codper;
} 

function hide_media_infantil($m = 0)
{
    $CI = & get_instance();
    $codcur = $CI->session->userdata('codcur');
    $codper = $CI->session->userdata('codper');

    if($codcur == 20 or $codcur == 100) return '';
    if(($codcur == 21 or $codcur == 101) and $codper == 1)return '';
    if(($codcur == 21 or $codcur == 101) and $codper == 2)return '';
    if(($codcur == 22 or $codcur == 102) and $codper == 1)return '';

  

    
    return '<strong>'.'Média : '.'</strong>'.$m;


}



function media_atalho($m = 0)
{
    if($m > 81) return '.alta';
    if($m > 71) return '.media';
    return '.baixa';
}

function set_nee($nee = 0, $comportamento = null)
{
    if($nee == 1 and $comportamento) return 'NEE | '.$comportamento;
    if($nee == 1 and !$comportamento) return 'NEE';
    return $comportamento;
    
    //return ''
}
function verifica_login()
{
    $CI = & get_instance();

    if ($CI->session->userdata('logged') != TRUE):
      //  set_msg('Acesso Restrito! Faça Login para continuar. ', 'warning');
        redirect('login');
    endif;
}

function verifica_admin()
{
    $CI = & get_instance();

    if ($CI->session->userdata('nome_perfil') == 'ADMINISTRADOR')return true;

    return false;
}
function strclear($string)
{
    $search = array('Ã','Ç');
    $replace= array('a','c');
    $string = str_replace($search, $replace, $string);
        $string = strtolower($string);

    return $string;
}

function vet_nov($vet_nov){
    if($vet_nov == "VET"):
        return "VETERANO";
    elseif($vet_nov == "NOV"):
        return  "NOVATO";
    else:
        return "EM BRANCO";
    endif;
}
function verifica_turma($tur_ant = null)
{   
    $CI = & get_instance();
    $tam = strlen($tur_ant);

   
    if($tam < 5  ):
    //if($tur_ant == "F7"):
        return "SEM TURMA ANTERIOR";
    elseif($tam > 5):
        return "REPROVADO ".substr($tur_ant, 3);
    else:

        return $tur_ant;
    endif;
}

function enturmacao($alunos, $turmas)
{	
	$q_alunos = sizeof($alunos);
    $q_turmas = sizeof($turmas);
	$q_alunos_sala = round($q_alunos/$q_turmas);
	$cont_aluno = 1;
	$cont_turma = 0;
    /**/
	foreach($alunos as $key => $a):

		$a->id_turma = $turmas[$cont_turma]->id_turma;
		if($cont_aluno == $q_alunos_sala){
			$cont_turma++;
			$cont_aluno=0;
		}
		if($cont_turma >= $q_turmas):
            $cont_turma = 0;
        endif;

		$cont_aluno++;
    endforeach;
 

	return $alunos;
}



?>