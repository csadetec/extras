<div class="row justify-content-center pt-65">
    <div class="col-md-8">
      <a href="<?php echo base_url('servicos/cadastrar') ?>" class="btn btn-primary float-right">CADASTRAR SERVIÇO</a>
    </div>
</div>
<div class="row justify-content-center" id="">
    <div class="col-md-8">
      <input class="form-control form-control-lg mb-2" type="search" placeholder="Pesquisar Serviços" aria-label="Pesquisar Serviços" id="myInput" data-list="list-group">
    </div>
</div>
<div class="row justify-content-center">
  <div class="col-md-8">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">DATA</th>
          <th scope="col">INÍCIO</th>
          <th scope="col">FIM</th>
          <th scope="col">MOTIVO</th>
          <th scope="col">CRIADOR</th>
        </tr>
      </thead>
      <tbody id="lista_servicos" class="cursor-pointer">
        <!--

        <tr>
          <th scope="row">s1</th>
          <td class="d-none">teste</td>
          <td>13:00</td>
          <td>14:00</td>
          <td>AULA EXTRA</td>
          <td>LUCAS TESTE</td>
        </tr>
        <!-- -->
      </tbody>
    </table>
  </div>
</div>
<?php require('servicos_opcoes.php'); ?>
<?php require('servicos_duplicate_form.php'); ?>
