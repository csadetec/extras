$(document).ready(function(){
	
	$('#btn_cadastrar_servico').click(function(){
		servicos_form()
	})

//	servicos_form()

	function servicos_form()
	{
		
		$('#servicos_form').modal('show')
	}

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
	                $('h5.modal-title').text(`Editar Serviço Nº ${data.id_servico}`)
	                $('#input_pesquisa').removeClass('d-none')
	                $('#add_colaborador').text('SALVAR')
	                $('#id_servico').val(data.id_servico)
	            }else if(data.msg == 'editado'){
					var msg =  ``
					+`<div class="alert alert-info col-12" role="alert">`                
          			+	`Editado com Sucesso. :)`
          			+`</div>`
	                $("#alert_servico").prepend(msg)
	                $('#input_pesquisa').removeClass('d-none')
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
	$('#btn_cancelar_servico').click(function(){
		$('#servicos_form').modal('hide')
	})

	//editar servico
	$('#lista_servicos tr').click(function(){
		var id_servico = $(this).find('td').eq(0).text()
		var url = `${site}/servicos/editar/${id_servico}`

		$.get(
			url,
			function(data){
				servicos_form()
				data = JSON.parse(data)
				//console.log(data.msg)
				$('h5.modal-title').text(`Editar Serviço Nº ${data.servico.id_servico}`)
				$('#id_motivo').val(data.servico.id_motivo)
				$('#data').val(data.servico.data)
				$('#horas_inicio').val(data.servico.horas_inicio)
				$('#horas_fim').val(data.servico.horas_fim)
				$('#id_servico').val(data.servico.id_servico)
	            $('#input_pesquisa').removeClass('d-none')
	            $('#add_colaborador').text('SALVAR')
	            
	         //   listar_servicos_colaboradores()
	         	
			//	console.log(data.servico.id_servico)

			}
		)
	})



	$("#myInput").on("keyup", function(){
        var value = $(this).val().toLowerCase();
        $("#lista_servicos tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        })
    })

})