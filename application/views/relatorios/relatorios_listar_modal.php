<!--Modal: Login / Register Form-->
<div class="modal fade" id="relatorios_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cascading-modal modal-lg" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Modal cascading tabs-->
      <div class="modal-c-tabs">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab">
              Somado
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel8" role="tab">
              Individual
            </a>
          </li>
        </ul>


        <!-- Tab panels -->
        <div class="tab-content">
          <!--Panel 7-->
          <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
  
            <!--Body-->
            <div class="modal-body mb-1">
              <h5 class="modal-title"></h5>
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">MOTIVO</th>
                    <th scope="col">TOTAL</th>
                  </tr>
                </thead>
                <tbody id="lista_relatorios_somado" class="">
                  
                </tbody>
            </table>
            </div>
            <!--Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Fechar</button>
            </div>

          </div>
          <!--/.Panel 7-->

          <!--Panel 8-->
          <div class="tab-pane fade" id="panel8" role="tabpanel">

            <!--Body-->
            <div class="modal-body">
              <h5 class="modal-title"></h5>
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">DATA</th>
                    <th scope="col">SERVIÇO</th>
                    <th scope="col">MOTIVO</th>
                    <th scope="col">INÍCIO</th>
                    <th scope="col">FIM</th>
                    <th scope="col">DIFERENÇA</th>
                  </tr>
              </thead>
              <tbody id="lista_relatorios_individual" class="">
            
              </tbody>
            </table>
            </div>
            <!--Footer-->
            <div class="modal-footer">
           
              <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Fechar</button>
            </div>
          </div>
          <!--/.Panel 8-->
        </div>

      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: Login / Register Form-

<div class="text-center">
  <a href="" class="btn btn-default btn-rounded my-3" data-toggle="modal" data-target="#modalLRForm">Launch
    Modal LogIn/Register</a>
</div>

<!--

<div class="modal fade" id="relatorios_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">DATA</th>
                <th scope="col">SERVIÇO</th>
                <th scope="col">MOTIVO</th>
                <th scope="col">INÍCIO</th>
                <th scope="col">FIM</th>
                <th scope="col">DIFERENÇA</th>
              </tr>
          </thead>
          <tbody id="lista_relatorios_modal" class="cursor-pointer">
            
          </tbody>
        </table>
      </div>
      <div class="modal-footer justify-content-center">
        <input type="hidden" id="id_servico">
        <button  class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!-- -->