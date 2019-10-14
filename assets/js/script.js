$(document).ready(function(){

    site = location.hostname

    if(site == 'localhost' || site == '10.20.0.26' || site == '10.20.0.22'){
        visiografo = `http://${site}/visiografo/`
        site= `http://${site}/extras/`
    }


    
   
})