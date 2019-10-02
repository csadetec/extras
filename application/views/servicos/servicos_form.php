<!-- Modal -->
<div class="modal fade" id="servicos_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-full-height modal-top modal-notify modal-success" role="document">
    <!--class="modal-dialog modal-full-height modal-top modal-notify modal-success"-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title heading lead" id="exampleModalLabel">Cadastrar Serviço</h5>
      </div>
      <div class="modal-body">
        <!-- Default form login -->
        <div class="row">
          <div class="col-6">
            <form id="colaboradores_form" class="text-center" action="post">
              <div class="form-row mb-3">
                <button type="button" class="btn btn-success">Salvar</button>
                <button type="reset" class="btn btn-secondary" id="btn_cancelar_servico">Cancelar</button>
              </div>
              <div class="form-row mb-3">
                <div class="col-12" >
                  <select name="id_motivo" id="id_motivo"  class="form-control">
                    
                 
                  </select>
                </div>
              </div>
              <div class="form-row mb-3">
                <div class="col-12">
                  <label for="data" class="float-left">Data</label>
                  <input type="date" name="data" id="data" class="form-control" value="<?php echo date('Y-m-d') ?>" >
                </div>
              </div>
              <!-- -->
              <div class="form-row mb-3">
                <div class="col-6">
                  <label for="horas_inicio" class="float-left">Início</label>
                  <input type="time" name="horas_inicio" id="horas_inicio" class="form-control" value="<?php echo date('H:i') ?>" >
                </div>
                <div class="col-6">
                  <label for="horas_fim" class="float-left">Fim</label>
                  <input type="time" name="horas_fim" id="horas_fim" class="form-control">
                </div>
              </div>
              <!--
              <div class="modal-footer">
                <button type="button" class="btn btn-success">Salvar</button>
                <button type="reset" class="btn btn-secondary" id="btn_cancelar_servico">Cancelar</button>
              </div>
              <!-- -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>