$(document).ready(function(){
	$("#myInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#listAlunos li").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
	
	$("#listAlunos > li").click(function(){
			
		var matricula = $(this).find("#matricula").text()
		var url = `http://${location.hostname}/enturmacao/alunos/listar/${matricula}`

		$.getJSON(
			url,
			function(aluno){
				console.log(aluno)

				var vet_nov = aluno.vet_nov == 'vet'?'VETERANO':'NOVATO'
				var nee = aluno.nee == '1'?' | NEE':''
				var tur_ant = aluno.tur_ant == null ? '':aluno.tur_ant
				$("#nomeAluno").text(aluno.nome)
				$("#turmaAnterior").text(aluno.turno+' | '+vet_nov+' | '+tur_ant)
				$("#nee").val(aluno.nee)
				$("#id_comportamento").val(aluno.id_comportamento)
				$("#form_matricula").val(aluno.matricula)
				$("#imgAvatar").attr('src', `http://${location.hostname}/visiografo/${aluno.matricula}.JPG`)

			}
		)
	})

	$("select#id_turma").change(function(){
		//console.log('mudou')
		var matricula = $(this).attr('name')
		var turma = $(this).val()
		var hostname = location.hostname
		var url = `http://${hostname}/enturmacao/alunos/editar/`
		var obj = {matricula:matricula, id_turma:turma}
				
		$.post(
		  url,
		  obj,
		  function(data){
	
			if(data == "success"){
				console.log("update com sucesso");
			  	makeNavBar()
			}else{
				//console.log(data)
			  	alert(data);
			}
		  }
		)
		/**/
	})

	$("form#form_alunos").submit(function(){
		//console.log('submit')
		var obj = $(this).serialize()
		var url = `http://${location.hostname}/enturmacao/alunos/editar/`
		console.log(obj)
		
		$.post(
		  	url,
		  	obj,
		  	function(data){
		 		
				if(data == "success"){
					var msg = ``
	            	+`<div class="alert alert-success mt-2" role="alert" >`
	                +`	Salvo com Sucesso`
	                +`</div>`
	                $('#alert_alunos').html(msg)
	                setTimeout(function(){location.reload()}, 1500)
	
				}else{
					var msg = ``
	            	+`<div class="alert alert-info mt-2" role="alert" >`
	                +`  ${data}`
	                +`</div>`
	                $('#alert_alunos').html(msg)
	
				}
		  	}
		)
		/**/
		return false
	})

	makeNavBar()
	function makeNavBar()
	{
		var url = `http://${location.hostname}/enturmacao/turmas/listar`
		$.getJSON(
			url,
			function(data){
				//console.log(data)
				$("#link_turmas_nav").empty()

				var link = ''
				for(var i in data){
    				link += ``     				
	    			+`<li class="breadcrumb-item">`
    				+	`<a href="http://${location.hostname}/enturmacao/alunos/turma/${data[i].id_turma}">`
        			+		`${data[i].nome_turma} <span class="badge badge-pill badge-primary ml-2">${data[i].qtd}</span>`
      				+	`</a>`
		   			+`</li>`

    			}

				var nav = ``
				+ 	`<ol class="breadcrumb">`
    			+			link					
				+	`</ol>`

				$("#link_turmas_nav").prepend(nav)

			}

		)
	}



})
