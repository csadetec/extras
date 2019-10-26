$(document).ready(function(){

    site = location.hostname
    app = ''
    if(site == 'localhost' || site == '10.20.0.26' || site == '10.20.0.22'){
        visiografo = `http://${site}/visiografo/`
        app = `http://${site}/extras/`
        site= `http://${site}/extras/api/index.php/`
       
    }


    
   
})