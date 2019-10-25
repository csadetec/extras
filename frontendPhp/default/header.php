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
  <link  href="assets/css/style.css" rel="stylesheet">
  <title>Serviços Extras</title>
</head>
<body>
  <!--Main Navigation-->
  <header>
    <?php //$this->load->view('navbar'); ?>
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="mb-5">
    <!--Main container-->
    <div class="container-fluid mt-2" id="conteudo">
      <div class="row" id="alerts"></div>
        <?php require($page) ?>
    
 