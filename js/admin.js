var gethttpRequest = function (){
    var httpRequest = false; 

    if(window.XMLHttpRequest){ // Firefox et autres
        httpRequest = new XMLHttpRequest(); 
        if (httpRequest.overrideMimeType){
            httpRequest.overrideMimeType('text/xml');
        }
    }
    else if(window.ActiveXObject){ // Internet Explorer 
        try {
            httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } 
        catch (e) {
            try {
                httpRequest = new ActiveXObject("Microsft.XMLHTTP")
            }
            catch(e){}
        }
    }

    if(!httpRequest){
        alert('Abandon, impossible de créer une instance XMLHTTP');
        return false;
    } 

    return httpRequest;
}

var ajouter = document.querySelector('#ajouter');
var enCours = document.querySelector('#listMatchEnCours');
var fini = document.querySelector('#listMatchFini');
var match =  document.querySelector('#ajouterMatch');

var res = document.getElementById('result');
function ajax(doc,div){
    doc.addEventListener('submit',function(e){
        e.preventDefault()
        var data = new FormData(doc);
        var xhr = gethttpRequest();
        div.innerHTML = 'Chargement...'
        xhr.onreadystatechange = function(){
            if (xhr.readyState === 4){
               div.innerHTML = xhr.responseText
            }
        }
        xhr.open('POST',doc.getAttribute('action'),true)
        xhr.send(data)
    })
}

ajax(ajouter,res)
ajax(enCours,res)
ajax(fini,res)
ajax(match,res)







