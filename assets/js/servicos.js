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
				var msg = data.msg
				var servico = data.servico

				if(msg == 'cadastrado'){
					location.href = `${site}servicos/editar/${servico}`
	            }else if(data.msg == 'editado' && servico){
					var html = ``
                    +`<div><strong>N°. Serviço: </strong>${servico.id_servico}</div>`
                    +`<div><strong>Data: </strong>${servico.data_editada}</div>`
                    +`<div><strong>Início: </strong>${servico.horas_inicio}</div>`
					+`<div><strong>Fim: </strong>${servico.horas_fim}</div>`
					+`<hr>`
					+`<div><strong>TODOS OS COLABORADORES DESSE SERVIÇO FORAM ATUALIZADOS</div>`
                    $('#alert_conteudo').prepend(html)
                    $('#alert_head').text('Atualizado com Sucesso')
                    $('#centralModalSuccess').modal('show')

				}else if(data.msg){
					var msg =  ``
					+`<div class="alert alert-warning col-12" role="alert">`                
          			+	`${data.msg}`
          			+`</div>`
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

		location.href = url
	})
	/**/


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
                	$('#add_colaborador').text('SALVAR')
				}
			)
		}
	}

	$("#myInput").on("keyup", function(){
        var value = $(this).val().toLowerCase();
        $("#lista_servicos tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        })
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