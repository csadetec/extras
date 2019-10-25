$(document).ready(function(){
 
    var colaboradores_form = function()
    {
        var chapa = $(this).find('#chapa').text()
        var url = `${site}/colaboradores/listar/${chapa}`

        $.getJSON(
            url,
            function(data){

                $('#nome_form').text(data.nome_colaborador)
                //$('#chapa_gargo').html(`<sub>${data.gargo} | ${chapa}</sub>`)
                $('#chapa_gargo').html(`${set_cargo(data.gargo)} | ${chapa}`)
                
                $('.img-form').attr('src', `${visiografo}${chapa}.JPG`)
                $('#colaboradores_form').modal('show')
            }
        )
    }

 
   

    $("form#colaboradores_form").submit(function(){
        var obj = $(this).serialize();
        console.log(obj)

        /*
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
        /**/

        return false
    })

  



})