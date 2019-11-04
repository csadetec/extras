<style>
    *{
        font-family: Roboto,sans-serif;
        font-size: 10px;
    }
    div{
        width: 95%;
        margin: auto;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        padding-top: 20px;
        padding-bottom: 20px; 
    }
</style>
<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NOME</th>
                <th scope="col">MOTIVO</th>
                <th scope="col">DATA</th>
                <th scope="col">HORAS</th>
            </tr>
        </thead>
        <tbody>
     
            <tr>
                <td><b>1</b></td>
                <td>MARIA DO CARMO FERNANDES NUNES ROLLA | 0022923</td>
                <td>APLICAÇÃO DE PROVA EF II </td>
                <td>02/11/2019</td>
                <td>02:00</td>
            </tr>
        </tbody>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script>
    
    var doc = new jsPDF()

    doc.text('Hello world!', 10, 10)
    doc.save('a4.pdf')
    var get_url_pdf = () => {
        var url_atual = location.href;
        var url_array = url_atual.split('/')
        var inicio = url_array[6]
        var fim = url_array[7]
        var url =  `http://${location.hostname}/api/relatorios/filter/${inicio}/${fim}/`
       
        $.getJSON(
            url,
            function(data)
            {
                var { colaboradores } = data
                
                if(colaboradores.length == 0) return false
                var cont = 0
                var row = colaboradores.map(c => 
                    `<tr>`
                    +   `<td>${++cont}</td>`
                    +   `<td>${c.nome_colaborador} | ${c.chapa}</td>`
                    +   `<td>${c.nome_motivo}</td>`
                    +   `<td>${c.data}</td>`
                    +   `<td>${minutos_horas(c.diferenca)}</td>`
                    +`</tr>`
                )
                $('tbody').empty()
                $('tbody').prepend(row)
           

            }
                  
        )
    }
    function minutos_horas(m)
    {
      
        var horas = Math.floor(m/60);
        var minutos = m%60;

        horas = horas <= 9 ? `0${horas}`:horas;
        minutos = minutos <= 9 ?`0${minutos}`:minutos;


        return horas+':'+minutos
    }
    
        
    get_url_pdf()

</script>