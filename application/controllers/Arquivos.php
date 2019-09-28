<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arquivos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	
		$this->load->library('PHPExcel');
		$this->load->helper(array('download','funcoes_helper'));
		$this->load->model(array('colaboradores_model'));
		/*
		verifica_login();
		verifica_admin();
		/**/
	}

	public function index()
	{	
	}

	public function cadastrar()
	{

        $config['upload_path']          = './assets/planilhas/uploads/';
        $config['allowed_types']        = 'xlsx|xls|XLSX|XLS';
        $config['max_size']             = 0;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['overwrite']           = true;


        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile')):
            $error = array('error' => $this->upload->display_errors());
           	echo $error['error'];
        else:
            $data = array('upload_data' => $this->upload->data());
            //set_msg('Alunos Atualizados com Sucesso!','success');
            redirect('arquivos/atualizar/'.$data['upload_data']['file_name']);
   
        endif;
        //endif;

        $this->load->view('load', FALSE);
    }

	public function atualizar($arquivo='')
	{
		if($arquivo == null)redirect('arquivos/cadastrar');
		
		$this->load->library('PHPExcel');
		$full_path = './assets/planilhas/uploads/'.$arquivo;
		$excelReader = PHPExcel_IOFactory::createReaderForFile($full_path);
		
		$excelObj = $excelReader->load($full_path);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();

		$letras = range('A','Z');
		/**/
		foreach ($letras as $key => $l):
			if($worksheet->getCell($l.'1')->getValue() != null):
				$t = $worksheet->getCell($l.'1')->getValue();
				$t = strclear($t);
				$t = rename_title($t);
				$titulo[] = $t;
			endif;
		endforeach;
	
		$cont_aluno = 1;
        for ($row = 2; $row <= $lastRow; $row++):

            if($worksheet->getCell('A'.$row)->getValue() != null):
                for($cont = 0; $cont < sizeof($titulo); $cont++):
                    $alunos[$cont_aluno][$titulo[$cont]] =  $worksheet->getCell($letras[$cont].$row)->getValue();
					
				endfor;
		//		$alunos[$cont_aluno]['id_turma'] = '0';
                $cont_aluno++;

            endif;

		endfor;
		
		/**
		echo '<pre>';
		print_r($titulo);
		print_r($alunos);
		echo '</pre>';
		/**/
		
		$msg = 'Atualizado com Sucesso';
		foreach ($alunos as $key => $row):

			if($this->colaboradores_model->select_chapa($row['chapa'])):
				
				if($this->colaboradores_model->update($row, $row['chapa']) == false):
					$msg = "Falha ao Atualizar";
					break;
				endif;
			else:
				if($this->colaboradores_model->insert($row) == false):
					$msg = "Falha ao cadastrar";
					break;
				endif;
			endif;
		
		endforeach;

		echo '<script>alert("'.$msg.'")</script>';
		$server = 'http://'.$_SERVER['SERVER_NAME'].'/extras';
		echo '<script>location.href = "'.$server.'"</script>';
		/**/
	}

}



/* End of file Excel.php */
/* Location: ./application/controllers/Excel.php */