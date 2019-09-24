$(document).ready(function(){

	main()
	function main()
	{

		url = `http://${location.hostname}/enturmacao/comportamentos/`
		$.getJSON(
			url,
			function(data){

				var options = `<option value="0">SELECIONAR</option>`
				for(var i in data){
					options += `<option value = ${data[i].id_comportamento}>${data[i].nome_comportamento}</options>`
				}
				//console.log(options)
				$("select#id_comportamento").empty()
				$("select#id_comportamento").prepend(options)

			}

		)
	}


})