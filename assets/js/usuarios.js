$(document).ready(function(){

    //lista de usuarios
    var usuarios = () => {
        var url = `${site}usuarios`
        $.getJSON(
            url,
            function(data){
                var { usuarios } = data
                var cont = 1
                var row = usuarios.map( usuario =>
                    `<tr>`
                    +   `<th scope="row">${cont++}</th>`
                    +   `<td class="d-none">${usuario.id_usuario}</td>`
                    +   `<td>${usuario.nome}</td>`
                    +   `<td>${usuario.usuario}</td>`
                    +   `<td>${usuario.nome_perfil}</td>`
                    +`</tr>`
                )
             
                $('#lista_usuarios').empty()
                $('#lista_usuarios').prepend(row)
                
                $('#lista_usuarios tr').click(lista_usuarios_tr_click)
                
            }

        )
    }
    usuarios()
    //editar usuario
    function lista_usuarios_tr_click(){
        logged()
        var id_usuario = $(this).find('td').eq(0).text()
        var url = `${site}usuarios/${id_usuario}`
     
        $.getJSON(
            url,
            function(data){
     
                var {nome, usuario, id_perfil, id_usuario}  = data.usuario

                $('#usuarios_form').modal('show')
                $('#nome').val(nome)
                $('#cad_usuario').val(usuario).attr('disabled', true)
                $('#id_perfil').val(id_perfil)
                $('#id_usuario').val(id_usuario)
                $('#cad_senha').val('')
                /**/
                //    console.log(usuario)
            }
        )
        
    }

    //login do usuario
    $('form#form_login').submit(function()
    {
        var obj = $(this).serialize()
        //console.log(obj)
        
        var url = `${site}usuarios/login/`
        
        $.post(
            url,
            obj,
            function(data){
                //console.log(data)
                data =  JSON.parse(data)
                var { msg } = data
                if(msg == 'success'){
                    location.href =  `${app}servicos`
                }else{
                    var alert = ``
                    +`<div class="alert alert-info mt-2" role="alert" >`
                    +`  ${msg}`
                    +`</div>`
                    $('#alertLogin').html(alert)
                }
            }
        )
        /**/
        return false
    })

    //cadastro ou update do usuario
    $('form#usuarios_form').submit(function(){
        logged()
        var obj = $(this).serialize()
        var id_usuario = $('#id_usuario').val()
        var url = id_usuario ? `${site}usuarios/editar/${id_usuario}` : `${site}usuarios/cadastrar`

        //   console.log(url)
        $.post(
            url,
            obj,
            function(data)
            {   
                data = JSON.parse(data)
                var msg = data.msg
                var usuario = data.usuario
                console.log(msg)
                if(msg == 'editado' && usuario){
                    var html = ``
                    +`<div><strong>ID: </strong>${usuario.id_usuario}</div>`
                    +`<div><strong>Usuário: </strong>${usuario.usuario}</div>`
                    +`<div><strong>Nome: </strong>${usuario.nome}</div>`
                    +`<div><strong>Perfil: </strong>${usuario.nome_perfil}</div>`

                    $('#usuarios_form').modal('hide')
                    $('#alert_conteudo').prepend(html)
                    $('#alert_head').text('Atualizado com Sucesso')
                    $('#centralModalSuccess').modal('show')
                }else if(usuario){
                    var html = ``
                    +`<div><strong>ID: </strong>${usuario.id_usuario}</div>`
                    +`<div><strong>Usuário: </strong>${usuario.usuario}</div>`
                    +`<div><strong>Nome: </strong>${usuario.nome}</div>`
                    +`<div><strong>Perfil: </strong>${usuario.nome_perfil}</div>`

                    $('#usuarios_form').modal('hide')
                    $('#alert_conteudo').prepend(html)
                    $('#alert_head').text('Cadastrado Com Sucesso')
                    $('#centralModalSuccess').modal('show')
                }else{
                    msg = ``
                    +`<div class="alert alert-info mt-2" role="alert" >`
                    +`  ${msg}`
                    +`</div>`
                    $('#alert_usuarios').html(msg)
                }

                /** */
             
                
            }
        )

        

        return false
    })
    //$('#usuarios_form').modal('show')
  //  $('#centralModalSuccess').modal('show')
    
    $('#btn_cadastrar_usuario').click(function(){
        $('#usuarios_form').modal('show')
    })
    $("#btn_cancelar_cad_usuario").click(function(){
        $('#usuarios_form').modal('hide')
        $('#cad_usuario').attr('disabled', false)
        
    })

    $("#myInput").on("keyup", function(){
        var value = $(this).val().toLowerCase();
        $("#lista_usuarios tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        })
    })
    
    function logged()
    {
        $.getJSON(
            `${site}setup`,
            function(data){
				var {logged, msg} = data
                
                if(!logged){
					alert(msg)
				
                    location.href = `${app}`
                }
                /**/
            }

        )
    }
   
})