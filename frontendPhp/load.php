<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="assets/imagens/icons/favicon.ico">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/css/mdb.min.css" rel="stylesheet">
  <link  href="<?php echo base_url('assets/css/style.css')  ?>" rel="stylesheet">
  <title>Serviços Extras</title>
</head>
<body>
  <!--Main Navigation-->
  <header class="">
    <?php require('navbar.php'); ?>
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="mb-5">
    <!--Main container-->
    <div class="container-fluid" id="conteudo">
      <div class="row" id="alerts"></div>
        <?php require($page) ?>
        <?php //$this->load->view('alerts/success', FALSE); ?> 
    </div>
    <!--Main container-->
  </main>
  <!--Main layout-->
  <!-- Footer -->
  <footer class="page-footer font-small primary-color mt-4 fixed-bottom">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
      2019 Copyright: Beard Dev
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

  <!-- JQuery -->
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/js/mdb.min.js"></script> 
  <script src="<?php echo base_url('assets/js/script.js?2302')?>"></script>
  <script src="<?php echo base_url('assets/js/servicos.js?201910282055') ?>"></script>
  <script src="<?php echo base_url('assets/js/servicos_colaboradores.js?2345') ?>"></script>
  <script src="<?php echo base_url('assets/js/usuarios.js?2302') ?>"></script>
  <script src="<?php echo base_url('assets/js/colaboradores.js?2302') ?>"></script>
  <script src="<?php echo base_url('assets/js/relatorios.js?2302') ?>"></script>
  <script src="<?php echo base_url('assets/js/modals.js?2302') ?>"></script>

  
  <!-- -->
</body>
</html>