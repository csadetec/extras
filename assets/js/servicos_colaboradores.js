$(document).ready(function(){
    
    
    $("#pesquisa_colaborador").on("keyup", function(){
        logged()

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
                //var id_servico = $('#id_servico').val()
                var id_servico = $('h3.modal-title').text()
                id_servico = id_servico.substring(18)
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
        logged()
        var obj = {chapa:chapa, id_servico:id_servico}
        $.post(
            `${site}servicos_colaboradores/cadastrar`,
            obj,
            function(data){
               data = JSON.parse(data)
                if(data.msg){
                    msg = data.msg
                    if(msg != 'cadastrado'){
                        alert(msg)
                        $('#pesquisa_colaborador').val('')
                    }else{
                       $('#pesquisa_colaborador').val('')
                        //$('#pesquisa_colaborador').focusNextInputField()
                        listar_servicos_colaboradores()
                    }
                }
              
            }

        )
    }

    listar_servicos_colaboradores()
    function listar_servicos_colaboradores()
    {   
        logged()
        var id_servico = $('h3.modal-title').text()
        id_servico = id_servico.substring(18)
        if(id_servico > 0){
            $.get(
                `${site}servicos_colaboradores/listar/${id_servico}`,
                function(data){
                    data = JSON.parse(data)
                   // console.log(data)
                    var row = ``
                    var cont = 1
                    for(var i in data){
                        var cargo = data[i].cargo == 'ANALISTA DE ÁREA DO CONHECIMENTO SÊNIOR'?'ANALISTA DE ÁREA':data[i].cargo
                     //   console.log(data)

                      
                        row +=``
                        +`<tr>`
                        +   `<th scope="row">${cont++}</th>`
                        +   `<td class="d-none">${data[i].id_sc}</td>`
                        +   `<td>${data[i].nome_colaborador} | <i>${cargo}</i></td>`
                        //+   `<td>${data[i].data}</td>`
                        +   `<td>${data[i].horas_inicio}</td>`
                        +   `<td>${data[i].horas_fim}</td>`
                        +   `<td>${minutos_horas(data[i].diferenca)}</td>`
                        +`</tr>`
                    }
                
                    $('#lista_servico_colaboradores').empty()
                    $('#lista_servico_colaboradores').prepend(row)
                    $('#lista_servico_colaboradores tr').click(form_servico_colaboradores)
                }
            )
        }
    }

    //montagem do form para editar/excluir colaborador do servico
    function form_servico_colaboradores()
    {
        logged()
        var id_sc = $(this).find('td').eq(0).text()
        var url = `${site}servicos_colaboradores/editar/${id_sc}`
        
        $.get(
            url,
            function(data){
                data = JSON.parse(data)
                sc = data.servico_colaborador
                $('#servicos_colaboradores_form').modal('show')
                $('#sc_cargo').html(`<strong>${sc.cargo}</strong>`)
                $('#sc_id').val(sc.id_sc)
                $('#sc_nome').text(sc.nome_colaborador)
                $('#sc_data').text(sc.nome_motivo+ ' - '+sc.data)
                $('#sc_img').attr('src', `${visiografo}${sc.chapa}.JPG`)
                $('#sc_horas_inicio').val(sc.horas_inicio)
                $('#sc_horas_fim').val(sc.horas_fim)
       
            }

        )
    }

    $('form#servicos_colaboradores_form').submit(function(){
        logged()
        var id_sc = $('#sc_id').val()
        var obj = $(this).serialize()
        var url = `${site}servicos_colaboradores/editar/${id_sc}`
        //console.log(url)
        $.post(
            url,
            obj,
            function(data){
                data = JSON.parse(data)
                var msg = data.msg
                msg = ``
                +`<div class="alert alert-success mt-2 mb-2 modal-title w-100" role="alert" >`
                +`  ${msg}`
                +`</div>`
                $('#alert_servicos_colaboradores').empty()
                $('#alert_servicos_colaboradores').prepend(msg)
            }
        )


        return false
    })


    $('#btn_excluir_sc').click(function(){
        logged()
        var id_sc = $('#sc_id').val()
        var nome = $('#sc_nome').text()
        var cargo = $('#sc_cargo').text()
        var url = `${site}servicos_colaboradores/excluir/${id_sc}`
        //console.log(url)
        var r = confirm(`Deseja excluir do Serviço extra\n${cargo}\n ${nome}?`)
        if(r){
            $.get(
                url,
                function(data){
                    data = JSON.parse(data)
                    var msg = data.msg
                    alert(msg)
                    location.reload()
                    /*
                    msg = ``
                    +`<div class="alert alert-info mt-2 mb-2 modal-title w-100" role="alert" >`
                    +`  ${msg}`
                    +`</div>`
                    /**/
                    /*
                    $('#btn_salvar_sc').attr('disabled', true)
                    $('#alert_servicos_colaboradores').empty()
                    $('#alert_servicos_colaboradores').prepend(msg)
                    /**/
                }
            )
        }
      
        

        return false
    })

    function minutos_horas(m)
    {
      
        var horas = Math.floor(m/60);
        var minutos = m%60;

        horas = horas <= 9 ? `0${horas}`:horas;
        minutos = minutos <= 9 ?`0${minutos}`:minutos;


        return horas+':'+minutos
    }

    function logged()
    {
        //console.log('logado')
        $.get(
            `${site}setup`,
            function(data){
                data = JSON.parse(data)
                if(!data.logged){
                    alert('FAÇA LOGIN NOVAMENTE!')
                    location.reload()
                }
            }

        )
    }

})