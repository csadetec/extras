$(document).ready(function(){
	
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
					location.href = `${site}servicos/editar/${servico}`
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
				/** */
			}
		)		
		return false
	})

	//editar servico
	
	$('#lista_servicos tr').click(function(){
		logged()
	
		var id_servico = $(this).find('td').eq(0).text()
		var url = `${site}servicos/editar/${id_servico}`
		$('#id_servico_opcao').val(id_servico)
		$('.modal-title').text(`Serviço N° ${id_servico}`)
		$('#a_editar_servico').attr('href', url )
		$('#servicos_opcoes').modal('show')

	})

    $('#lista_servicos tr').hover(function(){
		logged()
		var id_servico = $(this).find('td').eq(0).text()
		var url = `${site}servicos_colaboradores/listar/${id_servico}`
		var escolhido = $(this)
		
		$.get(
			url,
			function(data)
			{
				var sc = JSON.parse(data)
			//	console.log(sc)
				var title =  sc[0]? `Serviço N° ${id_servico}\n`:`Editar Serviço`
				for(var i in sc){
					title+=`\n`
					+`${sc[i].nome_colaborador} | ${sc[i].chapa}`
				
				}
				escolhido.attr('title',title)
			
			}

		)
		
		
	})



	editar_servico()
	function editar_servico()
	{
		logged()
		var id_servico = $('h3.modal-title').text()
		id_servico = id_servico.substring(18)
		if(id_servico > 0){
			$.get(
				`${site}servicos/listar/${id_servico}`,
				function(data){
					data = JSON.parse(data)
					servico = data.servico
					$('#id_servico').val(servico.id_servico)
					$('#id_motivo').val(servico.id_motivo)

					$('#data').val(servico.data)
					$('#horas_inicio').val(servico.horas_inicio)
					$('#horas_fim').val(servico.horas_fim)
					$('#input_pesquisa').removeClass('d-none')
					$('#add_colaborador').text('ATUALIZAR')
					$('#btn_duplicar_servico').removeClass('d-none')
				}
			)
		}
	}

	$('#btn_duplicate_servico').click(function(){
		logged()
		var id_servico = $('#id_servico_opcao').val()
		location.href = `${site}servicos/duplicar/${id_servico}`

	})
	
	$('form#servico_duplicate_form').submit(function(){

		var obj = $(this).serialize()
		var id_servico = $('#id_servico')
		alert(obj)
		return false
	})

	$("#myInput").on("keyup", function(){
        var value = $(this).val().toLowerCase();
        $("#lista_servicos tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        })
    })


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
    
    function logged()
    {
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