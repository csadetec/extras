<div class="row pt-65 pb-2">
  <div class="col-12 breadcrumb">
    <h3 class="modal-title"><?php echo $title ?></h3>
  </div>
</div>
<div class="row" id="alert_servico"></div>
<div class="row">
  <div class="col-6">
    <form id="servicos_form" class="text-center" action="post">
      <div class="form-row mb-3">
        <div class="col-6" >
          <select name="id_motivo" id="id_motivo" class="form-control" required>
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
          <input type="date" name="data" id="data" class="form-control" required>
        </div>
      </div>
      <div class="form-row mb-3">
        <div class="col-6">
          <label for="horas_inicio" class="float-left">Início</label>
          <input type="time" name="horas_inicio" id="horas_inicio" class="form-control" required>
        </div>
        <div class="col-6">
          <label for="horas_fim" class="float-left">Fim</label>
          <input type="time" name="horas_fim" id="horas_fim" class="form-control" required>
        </div>
      </div>
      <div id="input_pesquisa" class="form-row d-none">
        <input class="form-control form-control-lg mb-2" type="search" autocomplete="off" placeholder="Pesquisar Colaborador"  id="pesquisa_colaborador" list="list-colaboradores">
        <datalist id="list-colaboradores">
        </datalist>
      </div>
      <div class="form-row mb-3">
        <input type="hidden" id="id_servico">
        <button type="submit" class="btn btn-indigo" id="add_colaborador">Adicionar Colaboradores</button>
        <a href="<?php echo base_url('servicos/') ?>"  class="btn btn-secondary">Fechar</a>
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
<?php $this->load->view('servicos/servicos_colaboradores_form'); ?>
<?php $this->load->view('servicos/alert_danger'); ?>
<?php $this->load->view('servicos/alert_info'); ?>


