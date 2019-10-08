<!--Modal: Login with Avatar Form-->
<div class="modal fade" id="servicos_colaboradores_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal modal-avatar" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <img id="sc_img" src="https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.jpg" alt="avatar" class="img-form">
      </div>
      <!--Body-->
      <div class="modal-body mb-1">
        <div class="row">
          <div class="col-9">
            <div id="sc_cargo"></div>
            <div id="sc_nome" ></div>
            <div id="sc_motivo"></div>
            <div id="sc_data"></div>
          </div>
          <div class="col-3">
            <button class="btn btn-danger">EXCLUIR</button>
          </div>
        </div>

       
        <hr>
        <!-- Default form contact -->
        <form id="servicos_colaboradores_form" class="text-center" action="post">
          <div class="form-row mb-3">
            <div class="col-6">
              <label for="horas_inicio" class="float-left">Início</label>
              <input type="time" name="horas_inicio" id="sc_horas_inicio" class="form-control" >
            </div>
            <div class="col-6">
              <label for="horas_fim" class="float-left">Fim</label>
              <input type="time" name="horas_fim" id="sc_horas_fim" class="form-control">
            </div>
          </div>
          <hr>
          <div class="form-row justify-content-center">
            <button class="btn btn-indigo" type="submit">Cadastrar</button>
            <button class="btn btn-secondary" id="btn_cancelar" data-dismiss="modal">Cancelar</button> 
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