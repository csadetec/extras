$(document).ready(function(){

    $('#lista_relatorios tr').click(function(){
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

    function minutos_horas(m)
    {
      
        var horas = Math.floor(m/60);
        var minutos = m%60;

        horas = horas <= 9 ? `0${horas}`:horas;
        minutos = minutos <= 9 ?`0${minutos}`:minutos;


        return horas+':'+minutos
    }
   


})

