$(document).ready(function () {

	$("form#form_arquivos").submit(function(){
		
    
		var url = `http://${location.hostname}/extras/arquivos/cadastrar`
		form = new FormData();
        form.append('userfile', event.target.files[0]);
		 $.ajax({
            url: 'url', // Url do lado server que vai receber o arquivo
            data: form,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                // utilizar o retorno
            }
        });
		/**/
		return false
		
	})


   
})