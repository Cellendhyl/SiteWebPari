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
        if(button.length !=0){
            if(cpt == 0){
                form.innerHTML = '<button type="submit" id="valider" name="valider" value="valider">valider</button>' + form.innerHTML;
                cpt=1;
            }
           
        }
        else {
            var submit = document.getElementById("valider");
            submit.remove()
            if (button.length ==0) cpt=0;
        }
        
    })
}
form.addEventListener('submit',function(e){
    e.preventDefault()
    result.innerHTML = 'Chargement...'
    var data = new FormData(form)
    var xhr = gethttpRequest()
    xhr.onreadystatechange = function(){
        if (xhr.readyState === 4){
            if (xhr.responseText != ""){
                result.innerHTML = xhr.responseText
            }
            else {
               window.location.href = "../View/parieur.php?notif=Les paris ont été enregistrés avec succès.";
            }
        }
    }
    xhr.open('POST',form.getAttribute('action'),true)
    xhr.send(data)
    })




function getValue(cote,id){
    var index = button.indexOf(cote);
    var id1 = id+"a";
    var id2 = id+"b";
    var id3 = id+"c";
    var div = document.createElement("div");
    if(index==-1){
        document.getElementById(id).style.backgroundColor="red";
        button.push(cote);
        div.innerHTML = 
        '<input id='+ id1 + ' type="number" name='+ id +' onkeyup="gain('+ cote + ',this.name,this.value);"  placeholder="Entrez une valeur ici" value="" required>' +
        '<div id='+ id2 + ' name = "gain" value=""></div>' + 
        '<input id='+ id3 + ' name="xxx[]" type="hidden" value=""></input>'+
        '<input id='+ id3 + ' name="pari[]" type="hidden" value="'+id+'"></input>';
        form.appendChild(div);
    
        }
    else{
        button.splice(index, 1);
        var div = document.getElementById(id1)
        var div2 = document.getElementById(id2)
        var div3 = document.getElementById(id3)
        div.remove()
        div2.remove()
        div3.remove()
        document.getElementById(id).style.backgroundColor="white";
        
    }
    
}
function gain(cote,id,montant){
    document.getElementById(id+"b").innerHTML ="le gain possible est de : " +  montant*cote;
    document.getElementById(id+"c").value = montant*cote;
}







