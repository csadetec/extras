$(document).ready(function(){

	$('#btn_cadastrar_servico').click(servicos_form)

	servicos_form()
	function servicos_form(){
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
		$.getJSON(
			`${site}setup/data`,
			function(data){
				$('#data').val(data.dia)
				$('#horas_inicio').val(data.inicio)
				$('#horas_fim').val(data.fim)
			}
		)


		$('#servicos_form').modal('show')

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