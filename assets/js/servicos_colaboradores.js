$(document).ready(function(){
    

    $("#servicos_form").on('shown.bs.modal', function(){
        listar_servicos_colaboradores()
    })

    
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
            
                    if(colaborador.toLowerCase() == escolhido){
                       
                       cadastrar_colaborador_servico(data[i].chapa, id_servico)
                    }

                }
                $('datalist#list-colaboradores').empty()
                $('datalist#list-colaboradores').prepend(options)

            
            }
        )
    })



    function cadastrar_colaborador_servico(chapa, id_servico)
    {

        var obj = {chapa:chapa, id_servico:id_servico}
        console.log(obj)
        
        $.post(
            `${site}servicos_colaboradores/cadastrar`,
            obj,
            function(data){
                data = JSON.parse(data)
                console.log(data)
                $('#pesquisa_colaborador').val('')
                //$('#pesquisa_colaborador').focusNextInputField()
                listar_servicos_colaboradores()
            }

        )
        /**/
    }


    function listar_servicos_colaboradores()
    {
        var id_servico = $('#id_servico').val()
        var  url = `${site}servicos_colaboradores/listar/${id_servico}`
        $.get(
            url,
            function(data){
                data = JSON.parse(data)
             //   console.log(data)
                var row = ``
                var cont = 1
                for(var i in data){
                    var cargo = data[i].cargo == 'ANALISTA DE ÁREA DO CONHECIMENTO SÊNIOR'?'ANALISTA DE ÁREA':data[i].cargo

                    row +=``
                    +`<tr>`
                    +   `<th scope="row">${cont++}</th>`
                    +   `<td class="d-none">${data[i].id_sc}</td>`
                    +   `<td>${data[i].nome_colaborador}</td>`
                    +   `<td>${data[i].horas_inicio}</td>`
                    +   `<td>${data[i].horas_fim}</td>`
                    +`</tr>`
                }
            
                $('#lista_servico_colaboradores').empty()
                $('#lista_servico_colaboradores').prepend(row)
                $('#lista_servico_colaboradores tr').click(form_servico_colaboradores)
            }
        )
    }

    //montagem do form para editar/excluir colaborador do servico
    function form_servico_colaboradores()
    {
        var id_sc = $(this).find('td').eq(0).text()
        var url = `${site}servicos_colaboradores/editar/${id_sc}`
        $.get(
            url,
            function(data){
                data = JSON.parse(data)
                console.log(data.servico_colaborador)

            }

        )

    }

 
      
    function teste()
    {
        console_log('teste')
    }






})