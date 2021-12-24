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

var form = document.querySelector('#login')
var result = document.getElementById('bienvenue')
form.addEventListener('submit',function(e){
    e.preventDefault()
    result.innerHTML = 'Chargement...'
    var data = new FormData(form)
    var xhr = gethttpRequest()
    xhr.onreadystatechange = function(){
        if (xhr.readyState === 4){
            result.innerHTML = xhr.responseText
        }
    }
    xhr.open('POST',form.getAttribute('action'),true)
    xhr.send(data)
})





