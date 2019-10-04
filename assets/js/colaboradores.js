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

 
    $("#pesquisa_colaborador").on("keyup", function(){
    
        var value = $(this).val().toLowerCase()
        //console.log('click '+value)
        var escolhido = value
        value = value.replace('analista de área','')
        value = value.replace('professor','')
        value = value.replace('|','')
        $.getJSON(
            `${site}colaboradores/pesquisa/${value}`,
            function(data){
                //console.log(data)
                var options = ``
                var id_servico = $('#id_servico').val()
                for(var i in data){
                    var cargo = data[i].cargo == 'ANALISTA DE ÁREA DO CONHECIMENTO SÊNIOR'?'ANALISTA DE ÁREA':data[i].cargo
                    var colaborador = `${data[i].nome_colaborador} | ${cargo}`
                    options +=`<option value="${colaborador}">`

                    console.log('value '+value)
                    console.log('escolhido '+escolhido)
                    console.log('colaborador '+colaborador)
                    
                    if(colaborador.toLowerCase() == escolhido){
                        console.log('cadastrar no servico')
                    }

                }
                $('datalist#list-colaboradores').empty()
                $('datalist#list-colaboradores').prepend(options)

            
            }
        )
    })

    function cadastrar_colaborador_servico()
    {
        /*
        var chapa = $(this).find('#chapa').text()
        var id_servico = $(this).find('#id_servico').text()
        /**/
        console.log('add')

        //var obj = {chapa:chapa, id_servico:id_servico}

        /*
        $.post(
            `${site}servicos_colaboradores/cadastrar`,
            obj,
            function(data){
                data = JSON.parse(data)
                //console.log(data)
                listar_servicos_colaboradores()
            }

        )
        /**/

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

    $("#btn_cancelar").click(function(){
        $('#colaboradores_form').modal('hide')
       
    })



})