<!-- Central Modal Small -->
<div class="modal fade" id="relatoriosAlunos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg " role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">DADOS GERAIS</h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
        <div id="tableRelatorio"></div> 
       
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary " data-dismiss="modal">FECHAR</button>
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->