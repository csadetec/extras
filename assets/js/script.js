$(document).ready(function(){


    function main(){
       // $("#alunosListar").removeClass('d-none')
        $("#monitores").removeClass('d-none')
       // $("#relatorios").addClass('d-none')

       var ano = new Date()
       $('.footer-copyright').html(`&copy ${ano.getFullYear()}: Lucas de Sousa`)
    }
	/*
    
    $(".nav-link").click(function(){
        var link = $(this).attr('href')
        link = link.replace('#','')

        $("#aAlunos").removeClass('active')
        $("#aMonitores").removeClass('active')
        $("#aRelatorios").removeClass('active')

        $("#alunosListar").addClass('d-none')
        $("#monitores").addClass('d-none')
        $("#relatorios").addClass('d-none')
        if(link == 'alunos'){
            $("#alunosListar").removeClass('d-none')
            $("#aAlunos").addClass('active')
            $('title').text('Alunos')

        }else if(link == 'monitores'){
            $("#monitores").removeClass('d-none')
            $("#aMonitores").addClass('active')
            $('title').text('Monitores')
        }else if(link == 'relatorios'){
            $("#relatorios").removeClass('d-none')
            $("#aRelatorios").addClass('active')
            $('title').text('Relatórios')
        }
    })
	/*
    $("#aAlunos").click(function(){
        $("#aRelatorios").removeClass('active')
        $("#aAlunos").addClass('active')
        $('title').text('Alunos')

        $("#alunosListar").removeClass('d-none')
        $("#relatoriosListar").addClass('d-none')  
    })
   
    $("#aRelatorios").click(function () {
        $("#aRelatorios").addClass('active')
        $("#aAlunos").removeClass('active')
        $('title').text('Relatórios')

        $("#alunosListar").addClass('d-none')
        $("#relatoriosListar").removeClass('d-none')
    
    })

  
	/*
    $("#inputRelatorios").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#listRelatorios li").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
	/**/
})