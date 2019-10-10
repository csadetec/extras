<!-- Modal -->
<div class="modal fade" id="usuarios_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
       
      </div>
      <form id="usuarios_form" class="" action="post">
        <div class="modal-body">
          <div class="form-row mb-3">
            <div class="col-12">
              <label for="nome">Nome</label>
              <input type="text" name="nome" id="nome" class="form-control" required>
            </div>
          </div>
          <div class="form-row mb-3">
            <div class="col-12">
              <label for="senha">Senha</label>
              <input type="password" name="senha" id="senha" class="form-control">
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <input type="hidden" id="id_servico">
            <button type="submit" class="btn btn-indigo">Salvar</button>
            <button  class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
P