$(document).ready(function(){
 


    var colaboradores_form = function()
    {
        var chapa = $(this).find('#chapa').text()
        var url = `${site}/colaboradores/listar/${chapa}`

        $.getJSON(
            url,
            function(data){

                $('#nome_form').text(data.nome_colaborador)
                //$('#chapa_gargo').html(`<sub>${data.gargo} | ${chapa}</sub>`)
                $('#chapa_gargo').html(`${set_cargo(data.gargo)} | ${chapa}`)
                
                $('.img-form').attr('src', `${visiografo}${chapa}.JPG`)
                $('#colaboradores_form').modal('show')
            }
        )
    }

    var pesquisa = function()
    {
        var value = $(this).val().toLowerCase();
        $("#lista_colaboradores li").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    }

    function set_cargo(g)
    {
        if(g == 'ANALISTA DE ÁREA DO CONHECIMENTO SÊNIOR')return 'ANALISTA DE ÁREA'
        return g
    }

     

    $("form#colaboradores_form").submit(function(){
        var obj = $(this).serialize();
        console.log(obj)

        /*
        $.post(
            url,
            obj,
            function(data){

                if(data == 'editado'){
                    var alert = ``
                    +`<div class="alert alert-success mt-2 modal-title w-100" role="alert" >`
                    +`  Editado com Succeso!`
                    +`</div>`
                    $('.modal-header').removeClass('text-center')
                    $('.modal-header').html(alert)
                    $("#btnSalvarTurma").attr('disabled',true).text('SALVANDO...')
            
                    setTimeout(function(){ location.reload()}, 1500);
                }else if(data == 'cadastrado'){
                    var alert = ``
                    +`<div class="alert alert-success mt-2 modal-title w-100" role="alert" >`
                    +`  Cadastrado com Succeso!`
                    +`</div>`
                    $('.modal-header').removeClass('text-center')
                    $('.modal-header').html(alert)
                    $("#btnSalvarTurma").attr('disabled',true).text('SALVANDO...')
            
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
        /**/

        return false
    })

    $("#btn_cancelar").click(function(){
        $('#colaboradores_form').modal('hide')
       
    })

    /*
    $('#a_colaboradores').click(function colaboradores(){ 

        $('#conteudo').empty()  
       
        var url = `${site}/colaboradores`

        $.getJSON(
            url,
            function(data){


                var row = ``
                for(var i in data){
                    var nome = data[i].nome_colaborador
                    var chapa = data[i].chapa 
                    var cargo = set_cargo(data[i].gargo)
                    row += ``
                    +`<li class="list-group-item list-group-item-action cursor-pointer">`
                    +   `<div class="row">`
                    +       `<div   class="col-3 col-md-2" >`
                    +           `<img class="img-list"  src="${visiografo}${chapa}.JPG">`
                    +        `</div>`
                    +        `<div class="col-9 col-md-10">`
                    +            `<div class="float-right">${cargo}</div>`
                    +            `<div>${nome}</div>`
                    +            `<div id="chapa">${chapa}</div>`
                    +        `</div>`
                    +   `</div>`
                    +`</li>`
                }
                var html = ``
                +`<div class="row justify-content-center pt-list" id="">`
                +   `<div class="col-md-8">`
                +`      <input class="form-control form-control-lg mb-2" type="search" placeholder="Pesquisar Colaborador" aria-label="Pesquisar Colaborador" id="myInput" data-list="list-group">`
                +   `</div>`
                +`</div>`
                +`<div class="row justify-content-center">`
                +   `<div class="col-md-8" >`
                +      `<ul class="list-group" id="lista_colaboradores">`
                +           `${row}`
                +       `</ul>`
                +    `</div>`
                +`</div>`

                $("div#conteudo").prepend(html)
                $("#lista_colaboradores li").click(colaboradores_form)
                $("#myInput").on("keyup", pesquisa)
    

               
            }

        )
    })
    /**/

 

})