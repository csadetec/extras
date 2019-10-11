<div class="row justify-content-center pt-list" >
    <div class="col-md-8">
      <input class="form-control form-control-lg mb-2" type="search" placeholder="Pesquisar Colaborador" aria-label="Pesquisar Colaborador" id="myInput" data-list="list-group">
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">CHAPA</th>
                    <th scope="col">NOME</th>
                    <th scope="col">CARGO</th>
                </tr>
            </thead>
            <tbody id="lista_relatorios" class="cursor-pointer">
                <?php foreach($colaboradores as $key=>$r): ?>
                <tr>
                    <th scope="row"><?php echo ++$key ?></th>
                    <td><?php echo $r->chapa ?></td>
                    <td><?php echo $r->nome_colaborador ?></td>
                    <td><?php echo $r->cargo ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<?php $this->load->view('relatorios/relatorios_listar_modal'); ?>

