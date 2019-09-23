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
  <link  href="assets/css/style.css?2019092316" rel="stylesheet">
  <title></title>
</head>
<body>
  <!--Main Navigation-->
  <header>
    <nav class="navbar navbar-expand navbar-dark primary-color fixed-top pt-3 pb-3">
      <a class="navbar-brand" href="" >EXTRAS</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
          aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="basicExampleNav">

        <ul class="navbar-nav mr-auto">
          <li class="nav-item" >
            <a class="nav-link" href="#professores">Alunos
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item" >
            <a class="nav-link" href="<?php echo base_url('turmas');?>">Turmas
              <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item" >
            <a class="nav-link" href="#" data-toggle="modal"  data-target="#relatoriosAlunos" id="btn_open_relatorio">Relatórios
              <span class="sr-only">(current)</span>
            </a>
          </li>

        </ul>
        <!--
    
        <div class="nav-item dropdown">
          <button class="nav-item nav-link">Dropdown 
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
            <a href="#">Link 3</a>
          </div>
        </div> 
    <!-- -->
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              lucas de sousa
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
              <a class="dropdown-item" href="<?php echo base_url("excel") ?>">
                <i class="fas fa-fw fa-file-excel"></i> Gerar excel
              </a>
            
              <a class="dropdown-item" href="<?php echo base_url("sair") ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i> Sair
              </a>
            </div>
          </li>
        </ul>
        <!-- -->
      </div>
    </nav>
    <!--/.Navbar-->
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="mb-5">
    <!--Main container-->
    <div class="container-fluid mt-2">
      
    </div>
    <!--Main container-->
  </main>
  <!--Main layout-->
  <!-- Footer -->
  <footer class="page-footer font-small blue mt-4 fixed-bottom">
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
  <!--
  <script src="<?php echo base_url('/assets/js/turmas.js?20190918');?>"></script>
  <script src="<?php echo base_url('/assets/js/alunos.js?20190918')?>"></script>

  <script src="<?php echo base_url('/assets/js/relatorios.js?20190918')?> "></script>
  <script src="<?php echo base_url('/assets/js/usuarios.js?20190918')?> "></script>
  <script src="<?php echo base_url('/assets/js/email.js?20190901115')?> "></script>
  <script src="<?php echo base_url('/assets/js/comportamentos.js?2019')?> "></script>


  <!-- -->
</body>
</html>