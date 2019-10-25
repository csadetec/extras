<!-- Modal -->
<div class="modal fade" id="servico_duplicate_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog  modal-top modal-notify modal-info" role="document">
    <!--class="modal-dialog modal-full-height modal-top modal-notify modal-success"-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title heading lead" id="exampleModalLabel">Duplicar Serviço</h5>
      </div>
      <div class="modal-body">
        <!-- Default form login -->
        <div class="row" id="alert_servico">
        </div>
        <div class="row">
          <div class="col-12">
            <form id="servico_duplicate_form"  action="post">
              <div class="form-row mb-3">
                <div class="col-6" >
                  <select name="id_motivo" id="duplicate_id_motivo" class="form-control" required>
                  <option value="">SELECIONE O MOTIVO</option>
                  <?php foreach($motivos as $r): ?>
                    <option value="<?php echo $r->id_motivo ?>"><?php echo $r->nome_motivo ?></option>
                  <?php endforeach; ?>

                  </select>
                </div>
                <div class="col-6">
                  <!--<label for="data" class="float-left">Data</label>-->
                  <input type="date" name="data" id="duplicate_data" class="form-control" required>
                </div>
              </div>
              <div class="form-row mb-3">
                <div class="col-6">
                  <label for="horas_inicio">Início</label>
                  <input type="time" name="horas_inicio" id="duplicate_horas_inicio" class="form-control" required>
                </div>
                <div class="col-6">
                  <label for="horas_fim">Fim</label>
                  <input type="time" name="horas_fim" id="duplicate_horas_fim" class="form-control" required>
                </div>
              </div>
              <div id="input_pesquisa" class="form-row d-none">
                <input class="form-control form-control-lg mb-2" type="search" placeholder="Pesquisar Colaborador"  id="pesquisa_colaborador" list="list-colaboradores">
                <datalist id="list-colaboradores">
                </datalist>
              </div>
              <div class="form-row mb-3 justify-content-center">
                <div class="col-12">
                  <input type="hidden" id="duplicate_id_servico">
                  <button type="submit" class="btn btn-indigo" id="add_colaborador">DUPLICAR</button>
                  <button  class="btn btn-secondary" data-dismiss="modal" >Fechar</button>
                  <input type="hidden" id="duplicate_id_servico">
                </div>
              </div>
            </form>
          </div>
          <div class="col-6">
           
            <div class="row">
              <div class="col-12">
                <!--
                <ul class="list-group" id="lista_servico_colaboradores"></ul>
                <!-- -->
                <table class="table">
                  <thead>
                    <tr>
                      <!--
                      <th scope="col">#</th>
                      <th scope="col">NOME</th>
                      <th scope="col">INÍCIO</th>
                      <th scope="col">FIM</th>
                      <!-- -->
                    </tr>
                  </thead>
                  <tbody id="lista_servico_colaboradores" class="cursor-pointer">
                    <!--
                    <tr>
                      <th scope="row">1</th>
                      <td class="d-none">chapa</td>
                      <td>lucas</td>
                      <td>18:00</td>
                      <td>20:00</td>
                    </tr>
                    <!-- -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>