$(document).ready(function(){
    $('#horas_inicio').change(verifica_horas)
    $('#horas_fim').change(verifica_horas)

    function verifica_horas()
    {
        var inicio = $('#horas_inicio').val()
        var fim = $('#horas_fim').val()
        console.log(inicio)
        console.log(fim)
        if(inicio >= fim){
            var msg = ``
            +`<div class="alert alert-danger col-12" role="alert">`                
            +	`Horas Início Inválida`
            +`</div>`
            $('#alert_servico').empty()  
            $("#alert_servico").prepend(msg)
            
        }else{
            $('#alert_servico').empty()  
        }
    }    
   

})