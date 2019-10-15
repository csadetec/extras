$(document).ready(function(){

    $('#lista_relatorios tr').click(function(){
        logged()
        var chapa = $(this).find('td').eq(0).text()
        $.get(
            `${site}/relatorios/listar/${chapa}`,
            function(data)
            {
                data  = JSON.parse(data)
                individual = data.individual
                somado = data.somado
  
                $('#relatorios_modal').modal('show')
                $('.modal-title').text(`${individual[0].nome_colaborador} | ${individual[0].chapa}`)
                
                var td = ``
                var cont = 0
                for(var i in individual)
                {
                    td += ``
                    +`<tr>`
                    +   `<th scope="row">${++cont}</th>`
                    +    `<td>${individual[i].nome_motivo}</td>`
                    +    `<td>${individual[i].data}</td>`
                    +    `<td>N° ${individual[i].id_servico}</td>`
                    +    `<td>${individual[i].horas_inicio}</td>`
                    +    `<td>${individual[i].horas_fim}</td>`
                    +    `<td>${minutos_horas(individual[i].diferenca)}</td>`
                    +`</tr>`
                    /**/
                }
                cont = 0
                var td2 = ``
                for(var i in somado)
                {
                    td2 += ``
                    +`<tr>`
                    +   `<th scope="row">${++cont}</th>`
                    +    `<td>${somado[i].nome_motivo}</td>`
                    +    `<td>${minutos_horas(somado[i].diferenca)}</td>`
                    +`</tr>`
                    /**/
                }
                $('#lista_relatorios_individual').empty()
                $('#lista_relatorios_individual').prepend(td)

                $('#lista_relatorios_somado').empty()
                $('#lista_relatorios_somado').prepend(td2)
            }
        )
    })
    
    $('#relatorio_inicio, #relatorio_fim, #relatorio_ordenar').change(function(){
        relatorios_listar()
    })
  //  relatorios_listar()
    function relatorios_listar()
    {
        logged()
        var inicio = $('#relatorio_inicio').val()
        var fim = $('#relatorio_fim').val()
        var ordernar = $('#relatorio_ordenar').val()

        var url =  `${site}relatorios/filter/${inicio}/${fim}/${ordernar}`
       
        $.get(
            url,
            function(data)
            {
                data = JSON.parse(data)
                colaboradores = data.colaboradores
                if(colaboradores != ''){
                    var row = ``
                    var cont = 0
                    for(var i in colaboradores)
                    {   
                        row +=``
                        +`<tr>`
                        +   `<th scope="row">${++cont}</th>`
                        +   `<td class="d-none">${colaboradores[i].id_servico}</td>`
                        +   `<td>${colaboradores[i].chapa}</td>`
                        +   `<td>${colaboradores[i].nome_colaborador}</td>`
                        +   `<td>${colaboradores[i].data}</td>`
                        +   `<td>${colaboradores[i].nome_motivo}</td>`
                        +   `<td>${minutos_horas(colaboradores[i].diferenca)}</td>`
                        +`</tr>`
                    }
                    var html =``
                    +`<table class="table">`
                    +   `<thead>`
                    +       `<tr>`
                    +           `<th scope="col">#</th>`
                    +           `<th scope="col">CHAPA</th>`
                    +           `<th scope="col">NOME</th>`
                    +           `<th scope="col">DATA</th>`
                    +           `<th scope="col">MOTIVO</th>`
                    +           `<th scope="col">HORAS</th>`
                    +       `</tr>`
                    +    `</thead>`
                    +    `<tbody id="lista_relatorios" >`
                    +       `${row}`
                    +    `</tbody>`
                    +`</table>`
                    $('#input_relatorio').removeClass('d-none')
                    
                }else{
                    $('#input_relatorio').addClass('d-none')

                    var html = ``
                    +`<div class="alert alert-info" role="alert">`                
          			+	`Nada Encontrado`
					+`</div>`
                }
                
                $('#table_relatorios').empty()
                $('#table_relatorios').prepend(html)
                $('#lista_relatorios tr').hover(listar_relatorios_hover)
       

            }

        )



    }
    function listar_relatorios_hover()
    {
        logged()
        var id_servico = $(this).find('td').eq(0).text()
        var title  = $(this)
        
        $.get(
            `${site}/servicos/listar/${id_servico}`,
            function(data)
            {
                data  = JSON.parse(data)
                var servico = data.servico
                var html = ``
                +`Serviço N° ${servico.id_servico}\n`
                +`Data: ${servico.data_editada}\n`
                +`Horário: ${servico.horas_inicio} às ${servico.horas_fim}\n`
                
                $(title).attr('title', html)
            }
        )
        /** */
    }
  
    function minutos_horas(m)
    {
      
        var horas = Math.floor(m/60);
        var minutos = m%60;

        horas = horas <= 9 ? `0${horas}`:horas;
        minutos = minutos <= 9 ?`0${minutos}`:minutos;


        return horas+':'+minutos
    }
   
    
    
	$('#input_relatorio').on("keyup", function(){
        logged()
        var value = $(this).val().toLowerCase();
        $("#lista_relatorios tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        })
    })
    $('#lista_relatorios tr').click(function(){
        logged()
        var chapa = $(this).find('td').eq(0).text()
        $.get(
            `${site}/relatorios/listar/${chapa}`,
            function(data)
            {
                data  = JSON.parse(data)
                individual = data.individual
                somado = data.somado
  
                $('#relatorios_modal').modal('show')
                $('.modal-title').text(`${individual[0].nome_colaborador} | ${individual[0].chapa}`)
                
                var td = ``
                var cont = 0
                for(var i in individual)
                {
                    td += ``
                    +`<tr>`
                    +   `<th scope="row">${++cont}</th>`
                    +    `<td>${individual[i].nome_motivo}</td>`
                    +    `<td>${individual[i].data}</td>`
                    +    `<td>N° ${individual[i].id_servico}</td>`
                    +    `<td>${individual[i].horas_inicio}</td>`
                    +    `<td>${individual[i].horas_fim}</td>`
                    +    `<td>${minutos_horas(individual[i].diferenca)}</td>`
                    +`</tr>`
                    /**/
                }
                cont = 0
                var td2 = ``
                for(var i in somado)
                {
                    td2 += ``
                    +`<tr>`
                    +   `<th scope="row">${++cont}</th>`
                    +    `<td>${somado[i].nome_motivo}</td>`
                    +    `<td>${minutos_horas(somado[i].diferenca)}</td>`
                    +`</tr>`
                    /**/
                }
                $('#lista_relatorios_individual').empty()
                $('#lista_relatorios_individual').prepend(td)

                $('#lista_relatorios_somado').empty()
                $('#lista_relatorios_somado').prepend(td2)
            }
        )
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

