$(document).ready(function(){

    
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
                    //console.log('success')
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
 
   
})