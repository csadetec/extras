$(document).ready(function(){

    $('#lista_usuarios tr').click(function(){
        logged()
        var id_usuario = $(this).find('td').eq(0).text()

        $.get(
            `${site}usuarios/listar/${id_usuario}`,
            function(data)
            {
                usuario = JSON.parse(data)
                $('#usuarios_form').modal('show')
                $('#nome').val(usuario.nome)
                //$('#id_perfil').va(usuario.id_perfil)

                console.log(usuario)
            }
        )
    })

    $('form#form_login').submit(function()
    {
        var obj = $(this).serialize()
        //console.log(obj)
        
        var url = `${site}usuarios/login/`
        $.post(
            url,
            obj,
            function(data){
                console.log(data)
               
                if(data == 'success'){
                
                    location.href =  `${site}`
                }else{
                    var alert = ``
                    +`<div class="alert alert-info mt-2" role="alert" >`
                    +`  ${data}`
                    +`</div>`
                    $('#alertLogin').html(alert)
                }
            }
        )
        /**/
        return false
    })

    $('form#usuarios_form').submit(function(){
        logged()
        var obj = $(this).serialize()
        var id_usuario = $('#id_usuario').val()
        var url = id_usuario ? `${site}usuarios/editar/${id_usuario}` : `${site}usuarios/cadastrar`

        console.log(url)
        $.post(
            url,
            obj,
            function(data)
            {   
                data = JSON.parse(data)
                console.log(data)
                
                var msg = data
                if(msg == 'cadastrado'){
                    $('#usuarios_form').modal('hide')
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
    })

    $("#myInput").on("keyup", function(){
        var value = $(this).val().toLowerCase();
        $("#lista_usuarios tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        })
    })
    function logged()
    {
        $.get(
            `${site}setup`,
            function(data){
                data = JSON.parse(data)
                if(!data.logged){
                    alert('FAÇA LOGIN NOVAMENTE!')
                    location.reload()
                }
            }

        )
    }
   
})