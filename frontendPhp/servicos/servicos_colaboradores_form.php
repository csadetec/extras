<!--Modal: Login with Avatar Form-->
<div class="modal fade" id="servicos_colaboradores_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog cascading-modal modal-avatar" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <img id="sc_img" src="https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.jpg" alt="avatar" class="img-form">
      </div>
      <!--Body-->
      <div class="modal-body mb-1">
        <div class="row" id="alert_servicos_colaboradores"></div>
        <div class="row">
          <div class="col-9">
            <div id="sc_cargo"></div>
            <div id="sc_nome" ></div>
            <div id="sc_motivo"></div>
            <div id="sc_data"></div>
          </div>
          <div class="col-3">
            <button class="btn btn-danger" id="btn_excluir_sc">EXCLUIR</button>
          </div>
        </div>

       
        <hr>
        <!-- Default form contact -->
        <form id="servicos_colaboradores_form" action="post">
          <div class="form-row mb-3">
            <label for="id_motivo">Centro de Custo</label>
            <select name="id_motivo" id="sc_id_motivo" class="form-control">
              <option value="">SELECIONE</option>
              <?php foreach ($motivos as $key => $row): ?>
                <option value="<?php echo $row->id_motivo ?>"><?php echo $row->nome_motivo ?></option>
              <?php endforeach; ?>              
            </select>
            <?php  ?>
          </div>
          <div class="form-row mb-3">
            <div class="col-6">
              <label for="horas_inicio" >Início</label>
              <input type="time" name="horas_inicio" id="sc_horas_inicio" class="form-control" >
            </div>
            <div class="col-6">
              <label for="horas_fim" >Fim</label>
              <input type="time" name="horas_fim" id="sc_horas_fim" class="form-control">
            </div>
          </div>
          <hr>
          <div class="form-row justify-content-center">
            <input type="hidden"  id="sc_id">
            <button class="btn btn-indigo" type="submit" id="btn_salvar_sc">Salvar</button>
            <button class="btn btn-secondary" type="button" onclick="location.reload()">Fechar</button> 
          </div>
          <!-- -->
        </form>
        <!-- Default form contact -->
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: Login with Avatar Form-->