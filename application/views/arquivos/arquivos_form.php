
<!-- Default form login -->
<div class="row justify-content-center mb-2 pt-list">
  <div class="col-md-8">
    <form  id="form_arquivos" action="#" enctype="multipart/form-data"  method="post" class="text-center border border-light p-5">

      <p class="h4 mb-4">Escolha o Arquivo EXCEL (.xls ou .xlsx)</p>

      <!-- Email -->
      <input type="file" id="userfile" name="userfile" class="form-control mb-4" placeholder="Arquivo">

  
      <!-- Sign in button -->
      <button class="btn btn-info btn-block my-4" type="submit" id="btn_form_arquivos">Atualizar</button>
      <a href="<?php echo base_url('professres') ?> " class="btn btn-secondary btn-block">Cancelar</a>
    </form> 
  </div>
</div>

