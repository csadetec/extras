$(document).ready(function(){
	
	$('#btn_cadastrar_servico').click(function(){
		servicos_form()
	})

	servicos_form()

	
	function servicos_form()
	{
		//listar_motivos()
		//	data_horas()
		$("#pesquisa_colaborador").on("keyup", listar_colaboradores)
		$('#servicos_form').modal('show')
	}

	//essa funcao é chamada pelo 	$("#pesquisa_colaborador").on("keyup", listar_colaboradores)

	function listar_colaboradores()
	{
		var value = $(this).val().toLowerCase()
		//console.log(value.length)
		if(value.length > 1){
		//	console.log(`${site}colaboradores/pesquisa/${value}`)
			$.getJSON(
				`${site}colaboradores/pesquisa/${value}`,
				function(data){
					//console.log(data)
					var row = ``
					var id_servico = $('#id_servico').val()
					for(var i in data){
						var cargo = data[i].cargo == 'ANALISTA DE ÁREA DO CONHECIMENTO SÊNIOR'?'ANALISTA DE ÁREA':data[i].cargo
						row +=``
	                    +`<li class="list-group-item list-group-item-action cursor-pointer">`
	                    +   `<div class="row">`
	                    +       `<div   class="col-3 col-md-2" >`
	                    +           `<img class="img-list-form"  src="${visiografo}${data[i].chapa}.JPG">`
	                    +        `</div>`
	                    +        `<div class="col-9 col-md-10 pt-3 pb-3">`
	                    +            `<div class="float-left">${data[i].nome_colaborador} | ${cargo}</div>`
	                    +        `</div>`
	                    +		`<div id="chapa" class="d-none">`
	                    +			`${data[i].chapa}`
	                    +		`</div>`
	                    +		`<div id="id_servico" class="d-none">`
	                    +			`${id_servico}`
	                    +		`</div>`
	                    +   `</div>`
	                    +`</li>`
					}
					$('#lista_colaboradores').empty()
					$('#lista_colaboradores').prepend(row)
					$("#lista_colaboradores li").click(cadastrar_colaborador_servico)
				
				}
			)
		}
	}

	function cadastrar_colaborador_servico()
	{
		var chapa = $(this).find('#chapa').text()
		var id_servico = $(this).find('#id_servico').text()

		var obj = {chapa:chapa, id_servico:id_servico}

		$.post(
			`${site}servicos_colaboradores/cadastrar`,
			obj,
			function(data){
				data = JSON.parse(data)
				//console.log(data)
				listar_servicos_colaboradores()
			}

		)

	}
	function listar_servicos_colaboradores()
	{
		var id_servico = $('#id_servico').val()
		var  url = `${site}servicos_colaboradores/listar/${id_servico}`
		$.get(
			url,
			function(data){
				data = JSON.parse(data)
				console.log(data)
				var row = ``
				for(var i in data){
					var cargo = data[i].cargo == 'ANALISTA DE ÁREA DO CONHECIMENTO SÊNIOR'?'ANALISTA DE ÁREA':data[i].cargo
					row +=``
	                +`<li class="list-group-item list-group-item-action cursor-pointer">`
	                +   `<div class="row">`
	                +       `<div   class="col-3 col-md-2" >`
	                +           `<img class="img-list-form"  src="${visiografo}${data[i].chapa}.JPG">`
	                +        `</div>`
	                +        `<div class="col-9 col-md-10 pt-3 pb-3">`
	                +            `<div class="float-left">${data[i].nome_colaborador} | ${cargo}</div>`
	                +        `</div>`
	                +		`<div id="chapa" class="d-none">`
	                +			`${data[i].chapa}`
	                +		`</div>`
	                +   `</div>`
	                +`</li>`
				}
			
				$('#lista_servico_colaboradores').empty()
				$('#lista_servico_colaboradores').prepend(row)
			}
		)
	}
	

	$('form#servicos_form').click(function(){
       $("#alert_servico").empty()
	})


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
				if(data.msg == 'cadastrado'){
					var msg =  ``
					+`<div class="alert alert-success col-12" role="alert">`                
          			+	`Cadastrado com Sucesso. :)`
          			+`</div>`
	                $("#alert_servico").prepend(msg)
	                $('h5.modal-title').text(`Editar Serviço Nº ${data.id_servico}`)
	                $('#input_pesquisa').removeClass('d-none')
	                $('#id_servico').val(data.id_servico)
	            }else if(data.msg == 'editado'){
					var msg =  ``
					+`<div class="alert alert-info col-12" role="alert">`                
          			+	`Editado com Sucesso. :)`
          			+`</div>`
	                $("#alert_servico").prepend(msg)
	                $('#input_pesquisa').removeClass('d-none')
	                
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
				console.log(data.servico)
				$('h5.modal-title').text(`Editar Serviço Nº ${data.servico.id_servico}`)
				$('#id_motivo').val(data.servico.id_motivo)
				$('#data').val(data.servico.data)
				$('#horas_inicio').val(data.servico.horas_inicio)
				$('#horas_fim').val(data.servico.horas_fim)
				$('#id_servico').val(data.servico.id_servico)
	            $('#input_pesquisa').removeClass('d-none')
	            listar_servicos_colaboradores()
				
			//	console.log(data.servico.id_servico)

			}
		)
	})

	/*
	function data_horas()
	{
		$.getJSON(
			`${site}setup/data`,
			function(data){
				$('#data').val(data.dia)
				$('#horas_inicio').val(data.inicio)
				$('#horas_fim').val(data.fim)
			}
		)
	}
	/**/

	$("#myInput").on("keyup", function(){
        var value = $(this).val().toLowerCase();
        $("#lista_servicos tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        })
    })

})