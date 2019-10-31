<div class="row breadcrumb pt-65 pb-2">
  <div class="col-md-6">
    <h3 class="modal-title"><?php echo $title ?></h3>
    <p id="criador_status"></p>
    <select  id="validation_service" class="select-status">
      <option value=0>PENDENTE</option>
      <option value=1>VALIDADO</option>
    </select>
  </div>
  <div class="col-md-6 ">
    <button id="btn_excluir_servico" class="btn btn-danger float-right">Excluir Serviço</button>
    <a href="<?php echo base_url('servicos/cadastrar') ?>" class="btn btn-primary float-right">Cadastrar outro Serviço</a>
  </div>
</div>
<div class="row" id="alert_servico"></div>
<div class="row">
  <div class="col-md-5">
    <form id="servicos_form"  action="post">
      <div class="form-row mb-3">
        <div class="col-6" >
          <select name="id_motivo" id="id_motivo" class="form-control" required>
            <option value="">SELECIONE O MOTIVO</option>
            
            <?php foreach($motivos as $r): ?>
              <option value="<?php echo $r->id_motivo ?>"><?php echo $r->nome_motivo ?></option>
            <?php endforeach; ?>
            <!-- -->
          </select>
        </div>
        <div class="col-6">
          <input type="date" name="data" id="data" class="form-control" required>
        </div>
      </div>
      <div class="form-row mb-3">
        <div class="col-6">
          <label for="horas_inicio" >Início</label>
          <input type="time" name="horas_inicio" id="horas_inicio" class="form-control" required>
        </div>
        <div class="col-6">
          <label for="horas_fim">Fim</label>
          <input type="time" name="horas_fim" id="horas_fim" class="form-control" required>
        </div>
      </div>
      <div class="form-row mb-3">
        <div class="col-md-12">
          <label for="obs">Observações</label>
          <textarea class="form-control" name="obs" id="obs"></textarea>       
        </div>
      </div>
      <div id="input_pesquisa" class="form-row d-none">
        <input class="form-control form-control-lg mb-2" type="search" autocomplete="off" placeholder="Pesquisar Colaborador"  id="pesquisa_colaborador" list="list-colaboradores">
        <datalist id="list-colaboradores">
        </datalist>
      </div>
      <div class="form-row mb-3">
        <input type="hidden" id="id_servico">
        <div class="col-md-6">
          <button type="submit" class="btn btn-indigo btn-block" id="add_colaborador">Adicionar Colaboradores</button>
        </div>
        <div class="col-md-6">
          <a href="<?php echo base_url('servicos') ?>"  class="btn btn-secondary btn-block">Fechar</a>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-7">
   
    <div class="row">
      <div class="col-12">
        <table class="table">
          <thead>
            <tr>
              <!--              
              <th scope="col">#</th>
              <th scope="col">NOME</th>
              <th scope="col">MOTIVO</th>
              <th scope="col">INÍCIO</th>
              <th scope="col">FIM</th>
              <th scope="col">DIFERANÇA</th>
              <!-- -->
            </tr>
          </thead>
          <tbody id="lista_servico_colaboradores" class="cursor-pointer">
    
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php require('servicos_colaboradores_form.php'); ?>
<?php require('alert_danger.php'); ?>
<?php require('alert_info.php'); ?>
<?php require('alert_success.php'); ?>


