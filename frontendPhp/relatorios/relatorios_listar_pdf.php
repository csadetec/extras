<style>
  * {
    font-family: Roboto, sans-serif;
    font-size: 10px;
  }

  div {
    width: 95%;
    margin: auto;
  }

  table {
    border-collapse: collapse;
    width: 100%;
  }

  th,
  td {

    text-align: left;
    border-bottom: 1px solid #ddd;
    padding-top: 15px;
    padding-bottom: 15px;
  }
  div#assinatura{
    margin-top: 30px;
    width: 50%;

  }
</style>
<div>
  <?php  ?>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">NOME</th>
        <th scope="col">MOTIVO</th>
        <th scope="col">DATA</th>
        <th scope="col">HORAS</th>
      </tr>
    </thead>
    <tbody>
      <?php

      foreach ($data->colaboradores as $key => $r) {
      ?>
        <tr>
          <td><b><?php echo ++$key ?></b></td>
          <td><?php echo $r->nome_colaborador ?> | <?php echo $r->chapa ?></td>
          <td><?php echo $r->nome_motivo ?></td>
          <td><?php echo $r->data ?></td>
          <td><?php echo minutos_horas($r->diferenca) ?></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

</div>
<div id="assinatura">
  <hr>
</div>
<?php



function minutos_horas($m)
{

  $horas = floor($m / 60);
  $minutos  = $m % 60;

  $horas = $horas <= 9  ? '0' . $horas : $horas;
  $minutos = $minutos <= 9 ? '0' . $minutos : $minutos;
  return $horas . ':' . $minutos;
  /** */
}

?>