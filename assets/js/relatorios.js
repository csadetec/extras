$(document).ready(function(){


   $("a#btn_open_relatorio").click(function(){
    gerarRelatorios()
   })

    function gerarRelatorios()
    {
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
                var nee = ``
                var demonstra_dificuldade = ``
                var em_aquisicao = ``
                var bom_desempenho = ``
                console.log(data)
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
                    nee += `<td name='${data[row].turma}'>${data[row].nee}</td>`    
                    demonstra_dificuldade += `<td name='${data[row].turma}'>${data[row].demonstra_dificuldade}</td>`    
                    em_aquisicao += `<td name='${data[row].turma}'>${data[row].em_aquisicao}</td>`           
                    bom_desempenho += `<td name='${data[row].turma}'>${data[row].bom_desempenho}</td>`    

                    sem_turma = data[row].sem_turma
                }
                    console.log(media_70)

                if(media_70 != "<td name='GERAL'>undefined</td>"){
                    var medias = ``
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

                }else{
                    medias = ``
                }
               
                var table = ``
                //+`<canvas id="pieChart"></canvas>`
                +`<table class="table" id="tableRelatorioLista">`
                +   `<thead>`
                +      `<tr>`
                +          `<th scope="col">#</th>`
                +           `${head}`
                +       `</tr>`
                +   `</thead>`
                +   `<tbody class="cursor-pointer">`
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
                +        `${medias}`
                +       `<tr name = 'nee'>`
                +           `<th scope="row">NEE</th>`
                +           `${nee}`
                +        `</tr>`
                +       `<tr name = 'demonstra_dificuldade'>`
                +           `<th scope="row">DEMONSTRA DIFICULDADE</th>`
                +           `${demonstra_dificuldade}`
                +        `</tr>`
                +       `<tr name = 'em_aquisicao'>`
                +           `<th scope="row">EM AQUISIÇÃO</th>`
                +           `${em_aquisicao}`
                +        `</tr>`
                +       `<tr name = 'bom_desempenho'>`
                +           `<th scope="row">BOM DESEMPENHO</th>`
                +           `${bom_desempenho}`
                +        `</tr>`
                +    `</tbody>`
                +`</table>`
            
              
            
           
                $("#tableRelatorio").prepend(table)
                if(sem_turma > 1){
                    var alert = ``
                    +   `<div class="alert alert-warning" role="alert">`
                    +       `<a href="http://${location.hostname}/enturmacao/alunos" class="anchor-alert">Falta Enturmar <strong>${sem_turma}</strong> Alunos</a>`
                    +   `</div>`
                    $("#tableRelatorio").prepend(alert)
                }else if(sem_turma == 1){
                    var alert = ``
                    +   `<div class="alert alert-warning" role="alert">`
                    +       `<a href="http://${location.hostname}/enturmacao/alunos" class="anchor-alert">Falta Enturmar <strong>${sem_turma}</strong> Aluno</a>`
                    +   `</div>`
                    $("#tableRelatorio").prepend(alert)
                }

                $("#tableRelatorioLista tbody tr").click(gerarGrafico)
            }
        )
       
    }
    function nameLabelGrafico(n){
        if(n == 'total')return 'TOTAL DE ALUNOS'
        if(n == 'media_70')return 'MÉDIA ATÉ 70'
        if(n == 'media_80')return 'MÉDIA ENTRE 71 E 80'
        if(n == 'media_100')return 'MÉDIA MAIOR 80'
        if(n == 'demonstra_dificuldade')return 'DEMONSTRA DIFICULDADE'
        if(n == 'em_aquisicao')return 'EM AQUISIÇÃO'
        if(n == 'bom_desempenho')return 'BOM DESEMPENHO'
        
        return  n.toUpperCase()
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
      
        $.getJSON(
            url,
            function(data){
               // console.log(data)
                
                for(i in data){
                    nome_turma[i] = data[i].nome_turma
                    qtd[i] = data[i].qtd
                       
                }
           
                var ctxP = document.getElementById("pieChart").getContext('2d');
                var myPieChart = new Chart(ctxP, {
                    type: 'pie',
                    data: {
                        labels:nome_turma,
                        datasets: [{
                            data:qtd,
                    //        backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C"]
                            backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                          //  backgroundColor:coresGraficos(),
                            //hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });
               
            }
        );

    }
   


})

