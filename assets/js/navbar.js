$(document).ready(function(){
	var usuario = () => {
		var url = `${site}setup`
		$.getJSON(
			url,
			function(data){

				var link_usuarios = `<a class="dropdown-item" href="${app}usuarios">Usuários</a>`

				var navitem = ``
		  	    +`<li class="nav-item dropdown">`
	        	+	`<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
	         			 aria-haspopup="true" aria-expanded="false">`
	        			+`<i class="fas fa-user"></i> ${data.nome_usuario}`
	        		+`</a>`
			        +`<div class="dropdown-menu dropdown-menu-right dropdown-default"
			          aria-labelledby="navbarDropdownMenuLink-333">`
			        	+`<a class="dropdown-item" href="#">${data.perfil}</a>`
			        	+`${data.usuario != 'ADMINISTRADOR' ? link_usuarios : ''}`
			        +`</div>`
	            +`</li>`

	            $('ul.ml-auto').empty()
	         	$('ul.ml-auto').prepend(navitem)
	               
			}
		)
	}

	usuario()

})


