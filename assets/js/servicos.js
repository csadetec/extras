$(document).ready(function(){
	
	$('#btn_cadastrar_servico').click(servicos_form)

	servicos_form()

	
	function servicos_form()
	{
		listar_motivos()
		data_horas()
		$("#pesquisa_colaborador").on("keyup", listar_colaboradores)
		$('#servicos_form').modal('show')
	}

	function listar_colaboradores()
	{
		var value = $(this).val().toLowerCase()
		//console.log(value.length)
		if(value.length > 2){
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
					$("#lista_colaboradores li").click(colaboradores_servico)
				
				}
			)
		}
	}

	function colaboradores_servico()
	{
		var chapa = $(this).find('#chapa').text()
		var id_servico = $(this).find('#id_servico').text()

		var obj = {chapa:chapa, id_servico:id_servico}

		$.post(
			`${site}servicos_colaboradores/cadastrar`,
			obj,
			function(data){
				console.log(data)
			}

		)
	}
	
	function listar_motivos(){
		$.getJSON(
			`${site}motivos`,
			function(data){
				$('div#motivos').empty()

				var options = `<option value="">SELECIONE O MOTIVO</option>`
				for(var i in data){
					options +=`<option value=${data[i].id_motivo}>${data[i].nome_motivo}</option>`
				}
				
				$('select#id_motivo').prepend(options)
			}
		)
	}
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
					var msg = `Cadastrado com Sucesso. <a href=""> <strong><i class="fas fa-times"></i> Fechar Formulário</a></strong>` 
	                $("div#alert_servico_cadastro").removeClass('d-none')
	                $("div#alert_servico_cadastro").empty()
	                $("div#alert_servico_cadastro").prepend(msg)
	                $('h5.modal-title').text(`Editar Serviço Nº ${data.id_servico}`)
	                $('button#btn_add_colaboradores').hide()
	                $('#input_pesquisa').removeClass('d-none')
	                $('#id_servico').val(data.id_servico)
	            }else if(data.msg == 'editado'){
					var msg = `Editado com Sucesso. <a href=""> <strong><i class="fas fa-times"></i> Fechar Formulário</a></strong>` 
	                $("div#alert_servico_cadastro").removeClass('d-none')
	                $("div#alert_servico_cadastro").empty()
	                $("div#alert_servico_cadastro").prepend(msg)
	                $('#btn_add_colaboradores').hide()
	                $('#input_pesquisa').removeClass('d-none')
	                
				}else if(data.msg){
					var msg = `${data.msg}<a href=""><strong><i class="fas fa-times"></i> Fechar Formulário</a></strong>` 
	                $("div#alert_servico_cadastro").removeClass('d-none')
	                $("div#alert_servico_cadastro").empty()
	                $("div#alert_servico_cadastro").prepend(msg)
				}else{
					var msg = `NÃO POSSÍVEL CADASTRAR!!! <a href=""><strong><i class="fas fa-times"></i> Fechar Formulário</a></strong>` 
	                $("div#alert_servico_cadastro").removeClass('d-none')
	                $("div#alert_servico_cadastro").empty()
	                $("div#alert_servico_cadastro").prepend(msg)
	             //   setTimeout(function(){location.reload()}, 3000)
				}

				console.log(data)
				console.log(url)
			}
		)		
		return false
	})
	$('#btn_cancelar_servico').click(function(){
		$('#servicos_form').modal('hide')
	})

	$("#myInput").on("keyup", function(){
        var value = $(this).val().toLowerCase();
        $("#lista_servicos tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        })
    })

})