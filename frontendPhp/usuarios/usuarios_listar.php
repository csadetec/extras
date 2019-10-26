<div class="row justify-content-center pt-list">
    <div class="col-md-8">
      <a href="#" id="btn_cadastrar_usuario" class="btn btn-primary float-right">CADASTRAR USUÁRIO</a>
    </div>
</div>
<div class="row justify-content-center" id="">
    <div class="col-md-8">
      <input class="form-control form-control-lg mb-2" type="search" placeholder="Pesquisar Usuários" aria-label="Pesquisar Usuários" id="myInput" data-list="list-group">
    </div>
</div>
<div class="row justify-content-center">
  <div class="col-md-8">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">NOME</th>
          <th scope="col">USUÁRIO</th>
          <th scope="col">PERFIL</th>
        </tr>
      </thead>
      <tbody id="lista_usuarios" class="cursor-pointer">
        <?php foreach($usuarios as $i=>$r): ?>
        <tr>
          <th scope="row"><?php echo ++$i ?></th>
          <td class="d-none"><?php echo $r->id_usuario ?></td>
          <td><?php echo $r->nome ?></td>
          <td><?php echo $r->usuario ?></td>
          <td><?php echo $r->nome_perfil ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php require('usuarios_form.php'); ?>

