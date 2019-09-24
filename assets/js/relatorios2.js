$(document).ready(function(){
    $("#aRelatorios").click(function(){
        var url = `http://${location.hostname}/enturmacao/relatorios`
        $("#tableRelatorio").empty()
        $("#alertSemEnturmar").empty()
        $.getJSON(
            url,
            function(data){
        
                var head = ``
                var total = ``
                var veteranos = ``
                var novatos = ``
                var masculinos = ``
                var femininos = ``
                var media_70 = ``
                var media_80 = ``
                var media_100 = ``
                var sem_turma = ``
                for(let row in data){
                    head += `<th scope="col">${data[row].turma}</th>`
                    total += `<td>${data[row].total_alunos}</td>`    
                    veteranos += `<td name = '${data[row].turma}'>${data[row].veteranos}</td>`    
                    novatos += `<td name = '${data[row].turma}'>${data[row].novatos}</td>`    
                    masculinos += `<td name='${data[row].turma}'>${data[row].masculino}</td>`    
                    femininos += `<td name='${data[row].turma}'>${data[row].feminino}</td>`    
                    media_100 += `<td name='${data[row].turma}'>${data[row].media_100}</td>`    
                    media_80 += `<td name='${data[row].turma}'>${data[row].media_80}</td>`    
                    media_70 += `<td name='${data[row].turma}'>${data[row].media_70}</td>`    
                    sem_turma = data[row].sem_turma
                }

                var table = ``
                //+`<canvas id="pieChart"></canvas>`
                +`<table class="table">`
                +   `<thead>`
                +      `<tr>`
                +          `<th scope="col">#</th>`
                +           `${head}`
                +       `</tr>`
                +   `</thead>`
                +   `<tbody>`
                +       `<tr name = "total">`
                +           `<th scope="row">TOTAL DE ALUNOS</th>`
                +           `${total}`
                +        `</tr>`
                +       `<tr name = 'veteranos'>`
                +           `<th scope="row">VETERANOS</th>`
                +           `${veteranos}`
                +        `</tr>`
                +       `<tr name = 'novatos'>`
                +           `<th scope="row">NOVATOS</th>`
                +           `${novatos}`
                +        `</tr>`
                +       `<tr name = 'masculinos'>`
                +           `<th scope="row">MASCULINOS</th>`
                +           `${masculinos}`
                +        `</tr>`
                +       `<tr name = 'femininos'>`
                +           `<th scope="row">FEMININOS</th>`
                +           `${femininos}`
                +        `</tr>`
                +       `<tr name = 'media_70'>`
                +           `<th scope="row">Média Até 70</th>`
                +           `${media_70}`
                +        `</tr>`
                +       `<tr name = 'media_80'>`
                +           `<th scope="row">Média Entre 71 e 80</th>`
                +           `${media_80}`
                +        `</tr>`
                +       `<tr name = 'media_100'>`
                +           `<th scope="row">Média Maior 80</th>`
                +           `${media_100}`
                +        `</tr>`
                +    `</tbody>`
                +`</table>`
            
              
                //console.log(table)
           
                $("#tableRelatorio").prepend(table)
                if(sem_turma > 2){
                    var alert = ``
                    +   `<div class="alert alert-warning" role="alert">`
                    +       `Falta Enturmar <strong>${sem_turma}</strong> Alunos`
                    +   `</div>`
                    $("#tableRelatorio").prepend(alert)
                }else if(sem_turma == 1){
                    var alert = ``
                    +   `<div class="alert alert-warning" role="alert">`
                    +       `Falta Enturmar <strong>${sem_turma}</strong> Aluno`
                    +   `</div>`
                    $("#tableRelatorio").prepend(alert)
                }

                $("table tbody tr").click(gerarGrafico)
            }
        )
       
    })

})

function nameLabelGrafico(n){
    if(n == 'veteranos')return 'GRÁFICO VETERANOS'
    return n
}
function gerarGrafico(){
    
    var name = $(this).attr('name')   
    var url = `http://${location.hostname}/enturmacao/relatorios/listar/${name}`
    $('#labelGraficos').text(nameLabelGrafico(name))
    $("#relatoriosAlunosGraficos").modal('show')
    $("#relatoriosAlunos").modal('hide')

    var nome_turma = null
    var qtd = null

    nome_turma = [];
    qtd = []
    qtd = []
    $.getJSON(
        url,
        function(data){
           // console.log(data)
            
            for(i in data){
               // console.log(data[i].nome_turma+' '+data[i].qtd)
                nome_turma[i] = data[i].nome_turma+' - '+data[i].qtd
                qtd[i] = data[i].qtd
                   
            }
            var ctxP = document.getElementById("pieChart").getContext('2d');
            var myPieChart = new Chart(ctxP, {
                type: 'pie',
                data: {
                    labels:nome_turma,
                    datasets: [{
                        data:qtd,
                        backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                      //  backgroundColor:coresGraficos(),
                      //  hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                    }]
                },
                options: {
                    responsive: true
                }
            });
           
        }
    );

}



$("#btnCloseGraficos").click(function(){
    $("#relatoriosAlunosGraficos").modal('hide')
    $("#relatoriosAlunos").modal('show')

})

