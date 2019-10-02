$(document).ready(function(){

	$('#btn_cadastrar_servico').click(servicos_form)

	servicos_form()
	function servicos_form(){
		
		
		motivos()
		data_horas()
		$("#pesquisa_colaborador").on("keyup", colaboradores)
    
		$('#servicos_form').modal('show')

	}

	function colaboradores(){
		var value = $(this).val().toLowerCase()
		//console.log(value.length)
		if(value.length > 2){
		//	console.log(`${site}colaboradores/pesquisa/${value}`)
			$.getJSON(
				`${site}colaboradores/pesquisa/${value}`,
				function(data){
					//console.log(data)
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
	                    +   `</div>`
	                    +`</li>`

					}
					$('#lista_colaboradores').empty()
					$('#lista_colaboradores').prepend(row)
				
				}
			)
		}
		
	}
	
	function motivos(){
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