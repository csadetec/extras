<nav class="navbar navbar-expand navbar-dark primary-color fixed-top pt-3 pb-3">
  <a class="navbar-brand" href="<?php echo base_url('') ?>" >ENTURMAÇÃO</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
      aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="basicExampleNav">

    <ul class="navbar-nav mr-auto">
      <li class="nav-item " id="aAlunos">
        <a class="nav-link" href="<?php echo base_url('alunos');?>">Alunos
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
  </div>
</nav>

