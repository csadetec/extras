<div class="row justify-content-center pt-list mb-3">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-4">
                <label for="inicio">Início</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="inicio">Fim</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="inicio">Ordenar</label>
                <select name="" id="ordenar">
                    <option value=""></option>
                </select>
            </div>         
        </div>
    </div>
</div>

<div class="row justify-content-center mb-5">

    <div class="col-md-8">
      <input class="form-control form-control-lg" type="search" placeholder="Pesquisar Colaborador" aria-label="Pesquisar Colaborador" id="myInput" data-list="list-group">
    </div>
</div>

<div class="row justify-content-center">

    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">DATA</th>
                    <th scope="col">CHAPA</th>
                    <th scope="col">NOME</th>
                    <th scope="col">MOTIVO</th>
                    <th scope="col">HORAS</th>
                    
                </tr>
            </thead>
            <tbody id="lista_relatorios" class="cursor-pointer">
                
            </tbody>
        </table>
    </div>
</div>


<?php $this->load->view('relatorios/relatorios_listar_modal'); ?>

