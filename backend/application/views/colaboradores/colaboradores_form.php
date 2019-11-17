<!--Modal: Login with Avatar Form-->
<div class="modal fade" id="colaboradores_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal modal-avatar" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <img id="" src="https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.jpg" alt="avatar" class="img-form">
      </div>
      <!--Body-->
      <div class="modal-body mb-1">
        <h5 class="mt-1 mb-2 text-center" id="nome_form" ></h5>
        <div class="text-center" id="chapa_gargo"></div>
        <hr>
        <!-- Default form contact -->
        <form id="colaboradores_form" class="text-center" action="post">

          <div class="form-row mb-3">
            <div class="col-12">
              <select name="id_motivo" id="motivo" class="form-control">
                <option value="">SELECIONE O MOTIVO</option>
              </select>
            </div>
          </div>   
          <div class="form-row mb-3">
            <div class="col-12">
              <label for="data" class="float-left">Data</label>
              <input type="date" name="data" id="data" class="form-control" >
            </div>
          </div>
          <!-- -->
          <div class="form-row mb-3">
            <div class="col-6">
              <label for="horas_inicio" class="float-left">Início</label>
              <input type="time" name="horas_inicio" id="horas_inicio" class="form-control" >
            </div>
            <div class="col-6">
              <label for="horas_fim" class="float-left">Fim</label>
              <input type="time" name="horas_fim" id="horas_fim" class="form-control">
            </div>
          </div>
          <hr>
          <div class="form-row justify-content-center">
            <button class="btn btn-indigo" type="submit">Cadastrar</button>
            <button class="btn btn-info" id="btn_cancelar" type="reset">Cancelar</button> 
          </div>
          <!-- -->
        </form>
        <!-- Default form contact -->
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: Login with Avatar Form-->