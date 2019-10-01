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
  <link  href="assets/css/style.css?201909281403" rel="stylesheet">
  <title></title>
</head>
<body>

  <main class="mb-5">
    <!--Main container-->
    <div class="container-fluid mt-2" id="conteudo">
        <div class="row">
            <div class="col-12" id="alertLogin">

            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-5">
                <!-- Material form login -->
                <div class="card">
                    <h5 class="card-header info-color white-text text-center py-4">
                        <strong>Login</strong>
                    </h5>

                    <!--Card content-->
                    <div class="card-body px-lg-5 pt-0">
                        <!-- Form -->
                        <form class="text-center" style="color: #757575;" action="" id="form_login" method="post">
                            <!-- Email -->
                            <div class="md-form">
                                <input type="text" id="usuarioLogin" name="usuarioLogin" class="form-control" autofocus >
                                <label for="usuarioLoginI" >Usuário</label>
                            </div>
                            <!-- Password -->
                            <div class="md-form">
                                <input type="password" id="senhaLogin" name="senhaLogin" class="form-control" autofocus > 
                                <label for="senhaLogin">Password</label>
                            </div>

                            <!-- Sign in button -->
                            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Entrar</button>

                        </form>
                        <!-- Form -->
                    </div>
                </div>
                <!-- Material form login -->
            </div>
        </div><!-- row -->
    </div>
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
  <script src="assets/js/script.js?201909"></script>
  <script src="assets/js/usuarios.js?201909302153"></script>
  <script src="assets/js/colaboradores.js?201909301932"></script>

  <!-- -->
</body>
</html>

