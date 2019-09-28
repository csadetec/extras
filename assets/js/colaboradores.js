$(document).ready(function(){
 
  //  colaboradores()
    var colaboradores = function()
    {   
       
        var url = `${site}/colaboradores`

        $.getJSON(
            url,
            function(data){


                var row = ``
                for(var i in data){
                    var nome = data[i].nome_colaborador
                    var chapa = data[i].chapa
                    var cargo = data[i].gargo
                    row += ``
                    +`<li class="list-group-item list-group-item-action cursor-pointer">`
                    +   `<div class="row">`
                    +       `<div   class="col-3 col-md-2" >`
                   // +           //`<img class="imgAlunos cursor-pointer" title="Editar nformações" src="#">`
                    +        `</div>`
                    +        `<div class="col-9 col-md-10">`
                    +            `<div class="float-right">${cargo}</div>`
                    +            `<div>${nome}</div>`
                    +            `<div id="chapa">${chapa}</div>`
                    +        `</div>`
                    +   `</div>`
                    +`</li>`
                }

                var html = ``
                +`<div class="row justify-content-center pt-list">`
                +   `<div class="col-md-8" >`
                +      `<ul class="list-group" id="lista_colaboradores">`
                +           `${row}`
                +       `</ul>`
                +    `</div>`
                +`</div>`

                $("div#conteudo").prepend(html)
                $("#lista_colaboradores li").click(form_colaborador)
               
            }

        )
    }

    colaboradores()

    var form_colaborador = function(){

<div class="modal fade" id="formTurmas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">DADOS DA TURMA</h4>
      
        <button onclick="location.reload()" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body mx-3">
        <div class="row justify-content-end">
          <div class="col-4">
            <button id="btnExcluir"  class="btn btn-danger d-none">Excluir</button>    
            
          </div>
        </div>

        <form method="post" id="formTurmas">
          <div class="md-form mb-5">
            <input type="text" id="nome_turma" class="form-control" name="nome_turma" autofocus>
            <label data-error="wrong" data-success="right" for="nome_turma">Nome</label>
          </div>
          <div class="form-row">
            <select id="turno" name="turno" class="custom-select ">
              <option value="" selected>SELECIONE O TURNO </option> 
              <option value="MANHÃ">MANHÃ</option> 
              <option value="TARDE">TARDE</option>
            </select>
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <input type="hidden" id="id_turma" name="id_turma">
            <button type="submit" class="btn btn-indigo" id="btnSalvarTurma" >SALVAR <i class="fas fa-paper-plane-o ml-1"></i></button>
            <button type="button" onclick="location.reload()" class="btn btn-info" data-dismiss="modal" aria-label="Close">
              CANCELAR     
            </button>
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>


        var chapa = $(this).find('#chapa').text()
        console.log(chapa)

    }


 

    $("form#formTurmas").submit(function(){
        var obj = $(this).serialize();
        var id_turma = $("#id_turma").val()
        var url
        if(id_turma == ''){
            url = `http://${location.hostname}/enturmacao/turmas/cadastrar`
        }else{
            url = `http://${location.hostname}/enturmacao/turmas/editar/${id_turma}`
        }

        $.post(
            url,
            obj,
            function(data){

                if(data == 'editado'){
                    var alert = ``
                    +`<div class="alert alert-success mt-2 modal-title w-100" role="alert" >`
                    +`  Editado com Succeso!`
                    +`</div>`
                    $('.modal-header').removeClass('text-center')
                    $('.modal-header').html(alert)
                    $("#btnSalvarTurma").attr('disabled',true).text('SALVANDO...')
            
                    setTimeout(function(){ location.reload()}, 1500);
                }else if(data == 'cadastrado'){
                    var alert = ``
                    +`<div class="alert alert-success mt-2 modal-title w-100" role="alert" >`
                    +`  Cadastrado com Succeso!`
                    +`</div>`
                    $('.modal-header').removeClass('text-center')
                    $('.modal-header').html(alert)
                    $("#btnSalvarTurma").attr('disabled',true).text('SALVANDO...')
            
                    setTimeout(function(){ location.reload()}, 1500);

                }else{
                    var alert = ``
                    +`<div class="alert alert-info mt-2 modal-title w-100" role="alert" >`
                    +`  ${data}`
                    +`</div>`
                    
                    $('.modal-header').removeClass('text-center')
                    $('.modal-header').html(alert)

                }
            
              

            }
        )


        return false
    })

    $("#btnExcluir").click(function(){
        var id_turma = $("#id_turma").val()
        var url = `http://${location.hostname}/enturmacao/turmas/apagar/${id_turma}`
        var result = confirm('Tem certeza?')

        if(result){

            $.get(
                url,
                function(data){
                    if(data == 'deletado'){
                        //alert('Deletado Com Succeso')
                        location.reload()
                    }else{
                        alert(data)
                        location.reload()
                    }
                    console.log(data)
                }
            )
        }
    })
 

})