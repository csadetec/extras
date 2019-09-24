$(document).ready(function(){
    //login
    $("form#formLogin").submit(function(){
        //alert('teste')
        var obj = $(this).serialize();
        var hostname = location.hostname
        var url = `http://${hostname}/enturmacao/usuarios/login/`
        $.post(
            url,
            obj,
            function(data){
                //console.log(data)
                
                if(data == 'success'){
                    location.href =  `http://${hostname}/enturmacao/alunos/`

                }else{
                    var alert = ``
                    +`<div class="alert alert-info mt-2" role="alert" >`
                    +`  ${data}`
                    +`</div>`
                    $('#alertLogin').html(alert)
                }
                /** */
                
            }
        )
            
        return false
    })

    $("form#formUsuario").submit(function(){
        var obj = $(this).serialize()
        var id_usuario = $("#id_usuario").val()
        var url
        if(id_usuario == ""){
            url = `http://${location.hostname}/enturmacao/usuarios/cadastrar`
        }else{
            url = `http://${location.hostname}/enturmacao/usuarios/editar/${id_usuario}`
        }
        console.log(url)
        $.post(
            url,
            obj,
            function(data){
                if(data == 'editado'){
                    var alert = ``
                    +`<div class="alert alert-success mt-2 modal-title w-100" role="alert" >`
                    +`  Editado com Sucesso!`
                    +`</div>`
                    $('.modal-header').removeClass('text-center')
                    $('.modal-header').html(alert)
                    $("#btnSalvarUsuario").text('SALVANDO...').attr('disabled',true)

                    setTimeout(function(){ location.reload()}, 1500);
                }else if(data == 'cadastrado'){
                    var alert = ``
                    +`<div class="alert alert-success mt-2 modal-title w-100" role="alert" >`
                    +`  Cadastrado com Sucesso!`
                    +`</div>`
                    $('.modal-header').removeClass('text-center')
                    $('.modal-header').html(alert)
                    $("#btnSalvarUsuario").text('SALVANDO...').attr('disabled',true)

                    setTimeout(function(){ location.reload()}, 1500);
                }else{
                    var alert = ``
                    +`<div class="alert alert-info mt-2 modal-title w-100" role="alert" >`
                    +`  ${data}`
                    +`</div>`
                    $('.modal-header').removeClass('text-center')
                    $('.modal-header').html(alert)
                
                
                }
            }
        )
        /** */
        return false
    })       

    $("#list_usuarios tr").click(function(){
        
		var id_usuario = $(this).find('td:eq(0)').text()
        //console.log(id_usuario)
        
		var url = `http://${location.hostname}/enturmacao/usuarios/editar/${id_usuario}`
		$.getJSON(url,
			function (usuario){

				$("#nome").focus().val(usuario.nome)
				$("#usuario").val(usuario.usuario)
                //.attr('disabled', true)
                $("#email").val(usuario.email)
                /*
                $("#senha").hide()
                $("#senha").siblings().hide()
                /**/
			//	$("#senha").val(usuario.senha)
                $("#email_sup").val(usuario.email_sup)
                $("#codcur").val(usuario.codcur).focus()
                $("#codper").val(usuario.codper)
                $("#id_perfil").val(usuario.id_perfil)
                $("#id_usuario").val(usuario.id_usuario)
				
			}
        )
        /** */
    })
    
    $("form#formTrocarCurso").submit(function(){

        var obj = $(this).serialize()

        var url = `http://${location.hostname}/enturmacao/usuarios/cursos`
        $.post(
            url,
            obj,
            function(data){
                if(data.length > 1000){
                    alert('Não foi Possível Trocar de Curso')
                    location.href = `http://${location.hostname}/enturmacao/`
                  
                }else if(data == "trocou"){
                    location.href = `http://${location.hostname}/enturmacao/`

                }else{
                     var alert = ``
                    +`<div class="alert alert-info mt-2 modal-title w-100" role="alert" >`
                    +`  ${data}`
                    +`</div>`
                    $('.modal-header').removeClass('text-center')
                    $('.modal-header').html(alert)
                
                }
           
            }

        )

        return false
    })
   

    $("#myInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#list_usuarios tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    

  
   
})