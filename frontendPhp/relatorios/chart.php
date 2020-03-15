<!-- Central Modal Small -->
<div class="modal fade" id="relatoriosAlunosGraficos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="static" data-keyboard="false">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="labelGraficos">DADOS GERAIS</h4>
      </div>
      <div class="modal-body">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item" >
              <?php echo anchor('alunos',  'TODOS ALUNOS');?>
              <?php foreach($turmas as $t):?>
              <li class="breadcrumb-item active">
                <?php echo anchor('alunos/turma/'.$t->id_turma, $t->nome_turma); ?>
              </li>
            <?php endforeach;?> 
            </li>
          </ol>
        </nav>
        <div id="alertSemEnturmar"></div>
        <canvas id="pieChart"></canvas>
       
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCloseGraficos" onclick="location.reload()">FECHAR</button>
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->