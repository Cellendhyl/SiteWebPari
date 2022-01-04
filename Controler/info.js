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
var button = [];
var cpt = 0;
var links = document.querySelectorAll('.paris')
var result = document.getElementById('res')
var form = document.getElementById('ez')
for (var i = 0; i< links.length; i++){
    var link = links[i]
    link.addEventListener('click',function (e){
        e.preventDefault()
        if(cpt==0){
            form.innerHTML = '<button type="submit" name="valider" value="valider" onclic="verif();">valider</button>' + form.innerHTML;
            cpt++;
        }
        
    })
}

function getValue(cote,id){
    var index = button.indexOf(cote);
    var id1 = id+"a";
    var id2 = id+"b";
    var id3 = id2+"c";
    var div = document.createElement("div");
    if(index==-1){
        document.getElementById(id).style.backgroundColor="red";
        button.push(cote);
        div.innerHTML = 
        '<input id='+ id1 + ' type="number" name='+ id2 +' onkeyup="gain('+ cote + ',this.name,this.value);"  placeholder="Entrez une valeur ici" value="">' +
        '<div id='+ id2 + ' name = "gain" value=""></div>' + 
        '<input id='+ id3 + ' name="xxx[]" type="hidden" value=""></input>';
        form.appendChild(div);
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
function gain(cote,id2,montant){
    document.getElementById(id2).innerHTML ="le gain possible est de : " +  montant*cote;
    document.getElementById(id2+"c").value = montant*cote;
    console.log(document.getElementById(id2+"c").value)
}







