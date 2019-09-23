$(document).ready(function(){
    $('#btn_email').click(function(){
        var hostname = window.location.hostname
        var url = `http://${hostname}/enturmacao/email/`
        console.log('enviar email')
   
        
        $("#btn_email").attr('disabled', true).text('Enviando...')

        
        $.get(url,
            function(data){
                if(data == 'success'){
                    console.log('Email enviado com sucesso')
                    $("#alertEmail").modal('hide')
                    
                    alert("Email Enviado com Sucesso!")

                    location.reload()
                }else{
                    console.log('erro ao enviar email')
                    alert("Erro ao enviar Email")
                    location.reload()
                }
            }
        )
        /** */
    })
    $("#anchor_enviar_email").click(function(){
        //;console.log('teste')
        //alert("teset")

        writeAlertEmail()
        $("#alertEmail").modal('show')
    })

 
    function writeAlertEmail()
    {   
        var url = `http://${location.hostname}/enturmacao/relatorios`

        $.getJSON(
            url,
            function(data){
                var sem_turma = data['GERAL'].sem_turma
                  $("div#alertEmailText").empty()
                if(sem_turma > 1){
                    var notificacao = ``
                    +   `<div class="alert alert-warning" role="alert">`
                    +       `<a href="http://${location.hostname}/enturmacao/alunos" class="anchor-alert">Falta Enturmar <strong>${sem_turma}</strong> Alunos</a>`
                    +   `</div>`
                    $("div#alertEmailText").prepend(notificacao)

                }else if(sem_turma == 1){
                    var notificacao = ``
                    +   `<div class="alert alert-warning" role="alert">`
                    +       `<a href="http://${location.hostname}/enturmacao/alunos" class="anchor-alert">Falta Enturmar <strong>${sem_turma}</strong> Aluno</a>`
                    +   `</div>`
                    $("div#alertEmailText").prepend(notificacao)
                }
                
            
            }
        )
    }
   
})