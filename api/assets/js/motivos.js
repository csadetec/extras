$(document).ready(function(){
	
	function listar_motivos(){
		$.getJSON(
			`${site}motivos`,
			function(data){
				$('div#motivos').empty()

				var options = `<option value="">SELECIONE O MOTIVO</option>`
				for(var i in data){
					options +=`<option value=${data[i].id_motivo}>${data[i].nome_motivo}</option>`
				}

				//return options
				$('select#id_motivo').prepend(options)
			}
		)
	}
})