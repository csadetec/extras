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
        <div class="row" id="alert_servico">
        </div>
        <div class="row">
          <div class="col-6">
            <form id="servicos_form" class="text-center" action="post">
              <div class="form-row mb-3">
                <div class="col-6" >
                  <select name="id_motivo" id="id_motivo" class="form-control">
                    <option value="">SELECIONE O MOTIVO</option>
                    <optgroup label="Ensino Fundamental I">
                      <option value="1">APLICAÇÃO DE PROVA EF I </option>
                      <option value="4">ATIVIDADE EXTRA EF I</option>
                      <option value="14">REUNIÕES INF/EF I</option>
                      <option value="11">SUBSTITUIÇÃO INF/EF I</option>
                      <option value="8">AULA EXTRA EF I</option>
                    </optgroup>
                    <optgroup label="Ensino Fundamental II">
                      <option value="2">APLICAÇÃO DE PROVA EF II </option>
                      <option value="15">REUNIÕES EF II</option>
                      <option value="12">SUBSTITUIÇÃO EF II</option>
                      <option value="9">AULA EXTRA EF II</option>
                      <option value="5">ATIVIDADE EXTRA EF II</option>
                    </optgroup>
                    <optgroup label="Ensino Médio">
                      <option value="10">AULA EXTRA EM</option>
                      <option value="6">ATIVIDADE EXTRA EM</option>
                      <option value="13">SUBSTITUIÇÃO EM</option>
                      <option value="3">APLICAÇÃO DE PROVA EM</option>
                      <option value="16">REUNIÕES EM</option>
                    </optgroup>
                    <optgroup label="TODOS">
                      <option value="7">ATIVIDADES EXTRA</option>
                      <option value="17">FALTAS</option>
                    </optgroup>
                  </select>
                </div>
                <div class="col-6">
                  <!--<label for="data" class="float-left">Data</label>-->
                  <input type="date" name="data" id="data" class="form-control">
                </div>
              </div>

              <div class="form-row mb-3">
                <div class="col-6">
                  <label for="horas_inicio" class="float-left">Início</label>
                  <input type="time" name="horas_inicio" id="horas_inicio" class="form-control">
                </div>
                <div class="col-6">
                  <label for="horas_fim" class="float-left">Fim</label>
                  <input type="time" name="horas_fim" id="horas_fim" class="form-control">
                </div>
              </div>
              <div id="input_pesquisa" class="form-row ">
                <input class="form-control form-control-lg mb-2" type="search" placeholder="Pesquisar Colaborador"  id="pesquisa_colaborador" list="list-colaboradores">
                <datalist id="list-colaboradores">

                 
                </datalist>
              </div>
              <div class="form-row mb-3">
                <button type="submit" class="btn btn-success">Salvar</button>
                <button type="reset" class="btn btn-secondary" id="btn_cancelar_servico" onclick="location.reload()">Fechar</button>
                <input type="hidden" id="id_servico">
              </div>
              <div class="form-row">
                <div class="col-12">
                  <ul class="list-group" id="lista_colaboradores">
                    <!-- -
                    <li class="list-group-item list-group-item-action cursor-pointer">
                      <div class="row justify-content-center">
                        <div class="col-3 col-md-2">
                          <img class="img-list"  src="#">
                        </div>
                        <div class="col-9 col-md-10">
                          <div class="float-left " >nome do colaborador | cargo</div>
                        </div>
                      </div>
                    </li>
                    <!-- -->
                  </ul>
                </div>
              
              </div>
            </form>
          </div>
          <div class="col-6">
           
            <div class="row">
              <div class="col-12">
                <ul class="list-group" id="lista_servico_colaboradores"></ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>