<div class="row justify-content-center pt-list" id="">
    <div class="col-md-8">
      <input class="form-control form-control-lg mb-2" type="search" placeholder="Pesquisar Colaborador" aria-label="Pesquisar Colaborador" id="myInput" data-list="list-group">
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <ul class="list-group" id="lista_colaboradores">
          
            <?php foreach ($colaboradores as $r) : ?>
         
            <li class="list-group-item list-group-item-action cursor-pointer">
                <div class="row">
                    <div class="col-3 col-md-2">
                        <img class="img-list"  src="<?php echo base_url('../visiografo/'.$r->chapa.'.JPG') ?>">
                    </div>
                    <div class="col-9 col-md-10">
                        <div class="float-right"><?php echo $r->cargo ?></div>
                        <div><?php echo $r->nome_colaborador ?></div>
                        <div id="chapa"><?php echo $r->chapa  ?></div>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
            <!-- -->
        </ul>
    </div>
</div>




