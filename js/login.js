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
var erreur = document.getElementById('erreur')
form.addEventListener('submit',function(e){
    e.preventDefault()
    var data = new FormData(form)
    var xhr = gethttpRequest()
    erreur.innerHTML = 'Chargement...'
    xhr.onreadystatechange = function(){
        if (xhr.readyState === 4){
            if (xhr.responseText == "Erreur de login/mot de passe" || xhr.responseText == "Erreur de login/mot de passe"){
                erreur.innerHTML = xhr.responseText
            }
            else {
                window.location.href = "../View/parieur.php";
            }
           
        }
    }
    xhr.open('POST',form.getAttribute('action'),true)
    xhr.send(data)
})





