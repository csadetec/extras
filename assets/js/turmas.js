$(document).ready(function(){
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
    $("#list_turmas tr").click(function(){
        
        var nome_turma = $(this).find('td:eq(0)').text()
        var turno = $(this).find('td:eq(1)').text()
        var id_turma = $(this).find('td:eq(2)').text()
         $('form#formTurmas')[0].reset();
        $("#nome_turma").val(nome_turma)
        $("#turno").val(turno)
        $("#id_turma").val(id_turma)

        $(".btn-outline-danger").removeClass('d-none')
        $(".btn-danger").removeClass('d-none')
       
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