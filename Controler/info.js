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
var button =[]
var links = document.querySelectorAll('.paris')
var result = document.getElementById('res')
for (var i = 0; i< links.length; i++){
    var link = links[i]
    link.addEventListener('click',function (e){
        e.preventDefault()
        result.innerHTML = somme(button)
    })
}

function somme(liste){
    var res =0;
    for (var i = 0; i< liste.length; i++){
        res+=parseInt(liste[i])
    }
    return res;
}

function getValue(value,id){
    var index = button.indexOf(value);
    if(index==-1){
        document.getElementById(id).style.backgroundColor="red";
        button.push(value);
    }
    else{
        button.splice(index, 1);
        document.getElementById(id).style.backgroundColor="white";
    }
    
}





