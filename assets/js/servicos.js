$(document).ready(function(){
	
	//listar servicos
	var servicos = () =>{
		logged()
		var url = `${site}servicos`
		$.getJSON(
			url,
			function(data){
				var {servicos} = data
				var cont = 1
				var orange = `<i class="fas fa-exclamation-circle icon-orange">`
				var green = `<i class="fas fa-check-circle icon-green">`

				var row = servicos.map( servico => 
					`<tr>`
			        +  `<th scope="row">s${servico.id_servico}</th>`
			        +  `<td class="d-none">${servico.id_servico}</td>`
			        +  `<td class="d-none">${servico.status}</td>`
		        	+  `<td>${servico.data || 'DEFINIR'}</td>`
		        	+  `<td>${servico.horas_inicio}</td>`
		        	+  `<td>${servico.horas_fim}</td>`
		        	+  `<td>${servico.nome_motivo}</td>`
		        	+  `<td>${servico.nome}</td>`
		        	+  `<td>${servico.status == 1 ? green : orange}</i></td>`
			        +`</tr>`
				)
				$("#lista_servicos").empty()
				$("#lista_servicos").prepend(row)
				$("#lista_servicos tr").click(duplicar_editar_servico)
				$("#lista_servicos tr").hover(listar_sc)
			}

		)
	}
	servicos()

	//cadastrar e editar o servico
	$('form#servicos_form').submit(function(){
		logged()
		var obj = $(this).serialize()
		var id_servico = $('#id_servico').val()
		var url = id_servico ? `${site}servicos/editar/${id_servico}` : `${site}servicos/cadastrar`
		
		$.post(
			url,
			obj,
			function(data)
			{	
				data = JSON.parse(data)
				console.log(data)
				
				var msg = data.msg
				var servico = data.servico
				
				
				if(msg == 'cadastrado'){
					location.href = `${app}servicos/editar/${servico}`
	            }else if(msg == 'editado' && servico){
					var html = ``
					+`<div><strong>N°. Serviço: </strong>${servico.id_servico}</div>`
					+`<div><strong>Motivo: </strong>${servico.nome_motivo}</div>`
                    +`<div><strong>Data: </strong>${servico.data_editada}</div>`
                    +`<div><strong>Início: </strong>${servico.horas_inicio}</div>`
					+`<div><strong>Fim: </strong>${servico.horas_fim}</div>`
					+`<hr>`
					+`<div><strong>TODOS OS COLABORADORES DESSE SERVIÇO FORAM ATUALIZADOS</div>`
                    $('#alert_conteudo').prepend(html)
                    $('#alert_head').text('Atualizado com Sucesso')
                    $('#centralModalSuccess').modal('show')

				}else if(msg){
					var msg =  ``
					+`<div class="alert alert-warning col-12" role="alert">`                
          			+	`${data.msg}`
					+`</div>`
					$('#alert_servico').empty()  
	                $("#alert_servico").prepend(msg)
				}
				/**/
			}
		)		
		return false
	})

	$("#lista_servicos tr").hover(function(){
		alert('tests')
	})

	//$('#servicos_opcoes').modal('show')

	var teste =  () => {
		logged()
		var id_servico = 5
		var url = `${site}../../servicos/editar/${id_servico}`
		$('#id_servico_opcao').val(id_servico)
		$('.modal-title').text(`Serviço N° ${id_servico}`)
		$('#a_editar_servico').attr('href', url )
		$('#servicos_opcoes').modal('show')
	}

	//teste()
	//Atualiza o status do servico
	/*
	$('select#validation_service').change(function(){
		var id_servico = $('#id_servico').val()
		var status = $(this).val()
		var url = `${site}servicos/editar_status/${id_servico}`

		var obj = {status:status }
		//console.log(url)		
	
		$.post(
			url,
			obj,
			function(data){
				data = JSON.parse(data)
				var { msg } = data;
				if(msg == 'editado'){
					servicos()				
				}else{
					//alert(data)
					//alert('ERRO AO ATUALIZAR O STATUS')
					console.log(data)
					//location.reload()
				}
			}
		)
	})
	*/	

	//opcao servico
	
	function duplicar_editar_servico(){
		logged()
		var id_servico = $(this).find('td').eq(0).text()
		var status = $(this).find('td').eq(1).text()

		//console.log(status)
		var url = `${app}servicos/editar/${id_servico}`

		$('#id_servico').val(id_servico)
		$('.modal-title').text(`Serviço N° ${id_servico}`)
		$('#a_editar_servico').attr('href', url )
		$('#validation_service').val(status)
		$('#servicos_opcoes').modal('show')
	}

	//Quando o úsuario passar o mouse em cima de um serviço, listar o nome dos colaboradores
    function listar_sc(){
		logged()
		var id_servico = $(this).find('td').eq(0).text()
		var url = `${site}servicos_colaboradores/listar/${id_servico}`
		var escolhido = $(this)

		$.getJSON(
			url,
			function(data)
			{	
				var { sc } = data
			
				var title =  sc[0]? `Serviço N° ${id_servico}\n\n`:`Editar Serviço`
				for(var i in sc){
					title += `${sc[i].nome_colaborador} | ${sc[i].nome_motivo} ${sc[i].cargo != 'PROFESSOR'?' | ANALISTA':''}\n`
				}

				escolhido.attr('title',title)
				/** */
			}

		)
	}

	//editar serviço
	editar_servico()
	function editar_servico()
	{
		logged()
		var id_servico = $('h3.modal-title').text()
		id_servico = id_servico.substring(18)
		if(id_servico > 0){
			$.getJSON(
				`${site}servicos/${id_servico}`,
				function(data){
					var { servico } = data
					if(!servico)location.href = `${app}servicos`
					var criador_status = `<strong>Criador: </strong> ${servico.nome}`

					$('#criador_status').html(criador_status)
					$('select#status').val(servico.status)
					$('#id_servico').val(servico.id_servico)
					$('#id_motivo').val(servico.id_motivo)

					$('#data').val(servico.data)
					$('#horas_inicio').val(servico.horas_inicio)
					$('#horas_fim').val(servico.horas_fim)
					$('#obs').val(servico.obs)
					$('#input_pesquisa').removeClass('d-none')
					$('select#status').removeClass('d-none')
					

					$('#add_colaborador').text('ATUALIZAR')
					$('#btn_duplicar_servico').removeClass('d-none')
					/** */
				}
			)
		}
	}

	//Quando usuario quiser duplicar o serviço, carregando motivo, horas e colobaradores, necessitando 
	//setar a nova data do evento 
	$('#btn_duplicate_servico').click(function(){
		logged()
		var id_servico = $('#id_servico_opcao').val()
		var url = `${site}servicos/duplicar/${id_servico}`
		console.log(url)
		/*
		$.getJSON(
			url,
			function(data)
			{
				var {servico_duplicado, msg} = data
	
				if(msg == 'duplicado'){
					location.href = `${app}servicos/editar/${servico_duplicado}`
				}else{
					alert(msg)
				}
			}
		)

		//location.href = `${api}servicos/duplicar/${id_servico}`
		/**/
	})

	//Filtro para pesquisar serviços
	$("#myInput").on("keyup", function(){
        var value = $(this).val().toLowerCase();
        $("#lista_servicos tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        })
    })

	//botao para abrir modal de exclusão do serviço
    $('#btn_excluir_servico').click(function(){
        logged()
		var id_servico = $('#id_servico').val()
        var text = `<div><strong>Deseja Excluir o Serviço N° ${id_servico}</strong></div>`

		$('#alert_conteudo_danger').empty()
		$('#alert_conteudo_danger').prepend(text)
		$('#btn_excluir_sc_confirma').addClass('d-none')
		$('#btn_excluir_servico_confirma').removeClass('d-none')
		$('#centralModalDanger').modal('show')      
    })

	//btn para confirmar exclusão do serviço
	$('#btn_excluir_servico_confirma').click(function(){
        logged()
        var id_servico = $('#id_servico').val()
        var url = `${site}servicos/excluir/${id_servico}`
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
    
	//caso tenha feito alguma alteração no formulário, hide input q busca os colaboradores para add.
	$('#id_motivo, #data, #horas_inicio, #horas_fim, #obs').change(function(){
		$('#pesquisa_colaborador').hide()
	})

    function logged()
    {
        $.getJSON(
            `${site}setup`,
            function(data){
				var {logged, msg} = data
                
                if(!logged){
					alert(msg+'PARA VISUALIZAR O SERVIÇOS')

   	               location.href = `${app}login`

                }
                /**/
            }

        )
    }

})