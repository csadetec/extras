<div class="row justify-content-center pt-list">
  <div class="col-md-8">
    <button id="btn_gerar_pdf_" class="btn btn-outline-danger float-right" onclick="gerarPdf()">Gerar PDF</button>
    <!--<a class="btn btn-outline-danger float-right" href="/extras/relatorios/pdf" target="_blank">Gerar PDF</a>-->
  </div>
</div>
<div class="row justify-content-center mb-3">
  <div class="col-md-8">
    <form method="post" id="relatorios_form" class="">
      <div class="form-row">
        <div class="col-md-6">
          <label for="inicio">Início</label>
          <input type="date" id="relatorio_inicio" class="form-control">
        </div>
        <div class="col-md-6">
          <label for="inicio">Fim</label>
          <input type="date" id="relatorio_fim" class="form-control">
        </div>
      </div>
    </form>
  </div>
</div>

<div class="row justify-content-center mb-5">

  <div class="col-md-8">
    <input class="form-control form-control-lg d-none" type="search" placeholder="Pesquisar Colaborador" id="input_relatorio">
  </div>
</div>

<div class="row justify-content-center">

  <div class="col-md-8" id="table_relatorios">

  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>
<script>
  const gerarPdf = () => {

    let start = document.getElementById('relatorio_inicio').value
    let end = document.getElementById('relatorio_fim').value
    let dados = document.getElementById('table_relatorios').innerHTML
    start = start && `${start}/`
    end = end && ``

    let url = `/extras/relatorios/pdf/${start}${end}`

    //console.log(url)
    window.open(url)

  }
</script>