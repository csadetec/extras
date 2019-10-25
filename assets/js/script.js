$(document).ready(function(){

    site = location.hostname
    api = ''
    if(site == 'localhost' || site == '10.20.0.26' || site == '10.20.0.22'){
        visiografo = `http://${site}/visiografo/`
        site= `http://${site}/extras/api/index.php/`
        app = `http://${site}/extras/`
    }


    
   
})