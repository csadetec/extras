<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color fixed-top">
  <a class="navbar-brand" href="<?php echo base_url('page') ?>">Extras</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('page/servicos') ?>">Serviços</a>
      </li>
      <!--
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('page/colaboradores') ?>">Colaboradores</a>
      </li>
      <!-- -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('page/relatorios') ?>">Relatórios</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i><?php echo $this->session->userdata('nome'); ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="#"><?php echo $this->session->userdata('nome_perfil'); ?></a>
          <?php if(is_admin()): ?>
            <a class="dropdown-item" href="<?php echo base_url('page/usuarios') ?>">Usuários</a>
            <a class="dropdown-item" href="<?php echo base_url('testes/restart') ?>">RESTART</a>
          <?php endif; ?>
          <a class="dropdown-item" href="<?php echo base_url('sair') ?>">Sair</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->