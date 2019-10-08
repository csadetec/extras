$(document).ready(function(){
	
	$('form#servicos_form').click(function(){
       $("#alert_servico").empty()

	})


	//cadastrar e editar o servico

	$('form#servicos_form').submit(function(){
		var obj = $(this).serialize()
		var id_servico = $('#id_servico').val()
		var url = ''
		if(id_servico > 0){
			var url = `${site}servicos/editar/${id_servico}`
		}else{
			var url = `${site}servicos/cadastrar`
		}

		$.post(
			url,
			obj,
			function(data){
				data = JSON.parse(data)
				console.log(data.msg)
				if(data.msg == 'cadastrado'){
					var msg =  ``
					+`<div class="alert alert-success col-12" role="alert">`                
          			+	`Esta indo tudo certo. 	&#128521 <br>Agore Pesquise os nomes das pessoas.`
          			+`</div>`
	                $("#alert_servico").prepend(msg)
	                $('h3.modal-title').text(`Editar Serviço Nº ${data.id_servico}`)
	                $('#input_pesquisa').removeClass('d-none')
	                $('#add_colaborador').text('SALVAR')
	                $('#id_servico').val(data.id_servico)
	            }else if(data.msg == 'editado'){
					var msg =  ``
					+`<div class="alert alert-info col-12" role="alert">`                
          			+	`Editado com Sucesso. :)`
          			+`</div>`
	                $("#alert_servico").prepend(msg)
	                //$('#input_pesquisa').removeClass('d-none')
	                setTimeout(function(){location.reload()}, 2000)
				//	$('#servicos_form').modal('hide')
					servicos_form()
	                
				}else if(data.msg){
					var msg =  ``
					+`<div class="alert alert-warning col-12" role="alert">`                
          			+	`${data.msg}`
          			+`</div>`
	                $("#alert_servico").prepend(msg)
				}else{
					var msg =  ``
					+`<div class="alert alert-danger col-12" role="alert">`                
          			+	`Não é Possível Cadastrar`
          			+`</div>`
	                $("#alert_servico").prepend(msg)
				}

			}
		)		
		return false
	})

	//editar servico
	
	$('#lista_servicos tr').click(function(){
		var id_servico = $(this).find('td').eq(0).text()
		var url = `${site}servicos/editar/${id_servico}`

		location.href = url
	})
	/**/


	editar_servico()
	function editar_servico()
	{
		var id_servico = $('h3.modal-title').text()
		id_servico = id_servico.substring(18)
		if(id_servico > 0){
			$.get(
				`${site}servicos/listar/${id_servico}`,
				function(data){
					data = JSON.parse(data)
					if(data.servico){
						servico = data.servico
						$('#id_servico').val(servico.id_servico)
						$('#id_motivo').val(servico.id_motivo)
						$('#data').val(servico.data)
						$('#horas_inicio').val(servico.horas_inicio)
						$('#horas_fim').val(servico.horas_fim)
						$('#input_pesquisa').removeClass('d-none')
	                	$('#add_colaborador').text('SALVAR')
					}else{
						alert('Faça login Novamente')
						location.href = '${site}login'
					}
				//	console.log(data)
				}
			)


		}
	//	console.log(id_servico)
	}

	$("#myInput").on("keyup", function(){
        var value = $(this).val().toLowerCase();
        $("#lista_servicos tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        })
    })

})