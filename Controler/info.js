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
       result.innerHTML = 'input type"button" name="ok"';
    })
}

function somme(liste){
    var res =0;
    for (var i = 0; i< liste.length; i++){
        res+=parseInt(liste[i])
    }
    return res;
}

function getValue(cote,id){
    var index = button.indexOf(cote);
    var id1 = id+"a";
    var id2 = id+"b";
    var a = ";";
    var div = document.createElement("div");
    if(index==-1){
        document.getElementById(id).style.backgroundColor="red";
        button.push(cote);
        div.innerHTML = 
        '<input id='+ id1 + ' type="number" name='+ id2 +' onkeyup="gain('+ cote + ',this.name,this.value);"  placeholder="Entrez une valeur ici" value="">' +
        '<div id='+ id2 + ' name = "gain"></div>';
        result.appendChild(div);
        var a = document.getElementById(id2);
        console.log(a)
        }
    else{
        button.splice(index, 1);
        var div = document.getElementById(id1)
        var div2 = document.getElementById(id2)
        div.remove()
        div2.remove()
        document.getElementById(id).style.backgroundColor="white";
    }
    
}
function gain(cote,id,montant){
    document.getElementById(id).innerHTML ="le gain possible est de : " +  montant*cote;
}





