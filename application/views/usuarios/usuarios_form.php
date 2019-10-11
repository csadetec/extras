<!-- Modal -->
<div class="modal fade" id="usuarios_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dados do Usuário</h5>
      </div>
      <div id="alert_usuarios" class="m-2"></div>
      <form id="usuarios_form" class="" action="post">
        <div class="modal-body">
          <div class="form-row mb-3">
            <div class="col-12">
              <label for="cad_usuario">Usuário</label>
              <input type="text" name="cad_usuario" id="cad_usuario" placeholder="nome.sobrenome" class="form-control" required>
            </div>
          </div>
          <div class="form-row mb-3">
            <div class="col-12">
              <label for="cad_senha">Senha</label>
              <input type="password" name="cad_senha" id="cad_senha" class="form-control" required>
            </div>
          </div>
          <hr>
          <div class="form-row mb-3">
            <div class="col-12">
              <label for="nome">Nome</label>
              <input type="text" name="nome" id="nome" placeholder="Nome Completo" class="form-control" required>
            </div>
          </div>
          <div class="form-row mb-3">
            <div class="col-12">
              <label for="nome">PERFIL</label>
              <select name="id_perfil" id="id_perfil"  class="form-control" required>
                <option value="">SELECIONE UM OPÇÃO</option>
                <?php foreach ($perfis as $key => $r): ?>
                  <option value="<?php echo $r->id_perfil ?>"><?php echo $r->nome_perfil ?></option>
                <?php  endforeach; ?>
              </select>
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <input type="hidden" id="id_usuario">
            <button type="submit" class="btn btn-indigo">Salvar</button>
            <button type="reset"  class="btn btn-secondary" id="btn_cancelar_cad_usuario" >Cancelar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
