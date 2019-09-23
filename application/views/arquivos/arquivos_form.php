<div class="row justify-content-center pt-list">
  <div class="col-md-8">
    <h4 class="">ATENÇÃO!</h4>
    <h5>Após o upload do arquivo, será atualizado todos os <b>ALUNOS</b>.</h5>
    <hr>
  </div>
</div>
<!-- Default form login -->
<div class="row justify-content-center mb-2">
  <div class="col-md-8">
    <form  action="<?php echo base_url($action) ?>" enctype="multipart/form-data"  method="post" class="text-center border border-light p-5">

      <p class="h4 mb-4">Escolha o Arquivo EXCEL (.xls ou .xlsx)</p>

      <!-- Email -->
      <input type="file" id="userfile" name="userfile" class="form-control mb-4" placeholder="Arquivo">

  
      <!-- Sign in button -->
      <button class="btn btn-info btn-block my-4" type="submit">Atualizar</button>
      <a href="<?php echo base_url('alunos') ?> " class="btn btn-secondary btn-block">Cancelar</a>
    </form> 
  </div>
</div>

