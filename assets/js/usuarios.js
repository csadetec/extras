$(document).ready(function(){

    $('#lista_usuarios tr').click(function(){
        logged()
        var id_usuario = $(this).find('td').eq(0).text()

        $.get(
            `${site}usuarios/listar/${id_usuario}`,
            function(data){
                usuario = JSON.parse(data)
                $('#usuarios_form').modal('show')
                $('.modal-title').text(usuario.usuario)
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
        console.log('submittt')
        return false
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