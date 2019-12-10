<div class="row justify-content-center pt-list mb-3">
    <div class="col-md-8">
        <form method="post" id="relatorios_form" class="">
            <div class="form-row">
                <div class="col-md-6">
                    <label for="inicio">Início</label>
                    <input type="date" id="relatorio_inicio" class="form-control" >
                </div>
                <div class="col-md-6">
                    <label for="inicio">Fim</label>
                    <input type="date" id="relatorio_fim" class="form-control" >
                </div>
                <!--
                <div class="col-md-4">
                    <label for="inicio">Ordenar</label>
                    <select name="" id="relatorio_ordenar" class="form-control">
                        <option value="">Selecione</option>
                        <option value="data">Data</option>
                        <option value="id_motivo">Motivo</option>
                    </select>
                </div>
                <!-- -->
            </div>
       </form>
    </div>
</div>

<div class="row justify-content-center mb-5">

    <div class="col-md-8">
      <input class="form-control form-control-lg d-none" type="search" placeholder="Pesquisar Colaborador" id="input_relatorio">
    </div>
</div>

<div class="row justify-content-center">

    <div class="col-md-8" id="table_relatorios">
       
    </div>
</div>


<?php $this->load->view('relatorios/relatorios_listar_modal'); ?>

