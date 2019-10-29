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
                msg = data.msg
                if(msg == 'cadastrado'){
                    $('#pesquisa_colaborador').val('')
                    listar_servicos_colaboradores()
                }else{
                    $('#alert_conteudo_info').empty()
                    $('#alert_conteudo_info').prepend(msg)
                    $('#centralModalInfo').modal('show')
                    $('#pesquisa_colaborador').val('')
                }
                /** */
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
            $.getJSON(
                `${site}servicos_colaboradores/listar/${id_servico}`,
                function(data){
                   
                    var { sc } = data
                    var cont = 1
                    var row = sc.map(sc =>
                        `<tr>`
                        +   `<th>${cont++}</td>`
                        +   `<td class="d-none">${sc.id_sc}</td>`
                        +   `<td>${sc.nome_colaborador}${sc.cargo != 'PROFESSOR' ? ' | ANALISTA': ''}</td>` 
                        +   `<td>${sc.nome_motivo}</td>`
                        +   `<td>${sc.horas_inicio}</td>`
                        +   `<td>${sc.horas_fim}</td>`
                        +   `<td>${minutos_horas(sc.diferenca)}</td>`
                        +`<tr>`
                    )
                    $('#lista_servico_colaboradores').empty()
                    $('#lista_servico_colaboradores').prepend(row)
                    $('#lista_servico_colaboradores tr').click(form_servico_colaboradores)
                    /**/
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
                sc = data.sc
                console.log(sc)
                $('#servicos_colaboradores_form').modal('show')
                $('#sc_cargo').html(`<strong>${sc.cargo}</strong>`)
                $('#sc_id').val(sc.id_sc)
                $('#sc_nome').text(sc.nome_colaborador)
                $('#sc_data').text(sc.nome_motivo+ ' - '+sc.data_editada)
                $('#sc_img').attr('src', `${visiografo}${sc.chapa}.JPG`)
                $('#sc_id_motivo').val(sc.id_motivo)                
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
                console.log(data)
                var msg = data.msg
                var sc = data.sc
                if(msg=='editado' && sc){
                    var html = ``
                    +`<div><strong>Cargo: </strong>${sc.cargo}</div>`
                    +`<div><strong>Nome </strong>${sc.nome_colaborador}</div>`
                    +`<div><strong>N°. Serviço: </strong>${sc.id_servico}</div>`
                    +`<div><strong>Data: </strong>${sc.data_editada}</div>`
                    +`<div><strong>Motivo: </strong>${sc.nome_motivo}</div>`
                    +`<hr>`
                    +`<div><strong>Início: </strong>${sc.horas_inicio}</div>`
					+`<div><strong>Fim: </strong>${sc.horas_fim}</div>`
				
                    $('#servicos_colaboradores_form').modal('hide')
                    $('#alert_conteudo').prepend(html)
                    $('#alert_head').text('Atualizado com Sucesso')
                    $('#centralModalSuccess').modal('show')

                    
                }else{
                    msg = ``
                    +`<div class="alert alert-warning mt-2 mb-2 modal-title w-100" role="alert" >`
                    +`  ${msg}`
                    +`</div>`
                    $('#alert_servicos_colaboradores').empty()
                    $('#alert_servicos_colaboradores').prepend(msg)
                }

               
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
        $('#btn_excluir_sc_confirma').removeClass('d-none')
		$('#btn_excluir_servico_confirma').addClass('d-none')
        var text = ``
        +`<div><strong>Deseja Excluir do Serviço Extra</strong></div>`
        +`${cargo}<br>`
        +`${nome}`
        $('#alert_conteudo_danger').empty()
        $('#alert_conteudo_danger').prepend(text)
        $('#centralModalDanger').modal('show')      
    })

    $('#btn_excluir_sc_confirma').click(function(){
        logged()
        var id_sc = $('#sc_id').val()
        var url = `${site}servicos_colaboradores/excluir/${id_sc}`
        $.get(
            url,
            function(data)
            {
                data = JSON.parse(data)
                msg = data.msg
                if(msg == 'deletado'){
                    location.reload()
                }else{
                    alert(msg)
                }
            }

        )
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
        $.getJSON(
            `${site}setup`,
            function(data){
				var {logged, msg} = data
                
                if(!logged){
					alert(msg)		
                    location.href = `${app}login`

                }
                /**/
            }

        )
    }

})