<div class="row justify-content-center pt-list">
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
        </tr>
      </thead>
      <tbody id="lista_servicos" class="cursor-pointer">

        <?php foreach($servicos as $r): ?>
        <tr>
          <th scope="row"><?php echo 's'.$r->id_servico ?></th>
          <td class="d-none"><?php echo $r->id_servico ?></td>
          <td><?php echo $r->data ?></td>
          <td><?php echo $r->horas_inicio ?></td>
          <td><?php echo $r->horas_fim ?></td>
          <td><?php echo $r->nome_motivo ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php $this->load->view('servicos/servicos_opcoes'); ?>
<?php $this->load->view('servicos/servicos_duplicate_form'); ?>
