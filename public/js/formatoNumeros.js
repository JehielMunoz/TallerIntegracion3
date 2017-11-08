$(document).ready(Principal);

//main de funciones
function Principal(){
	formatearDinero();
	formatearRut();
}

function formatearDinero(){
	aDineros = $('[id="formatoDinero"]')
    if(aDineros[0].value[0] != "$"){
        for(var i=0; i<aDineros.length; i+=1){
        aDineros[i].value = aDineros[i].value.replace(/\./g,'');
        aDineros[i].value = aDineros[i].value.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
        aDineros[i].value = "$"+aDineros[i].value.split('').reverse().join('').replace(/^[\.]/,'');
        //console.log("index " + i + " val:" + aDineros[i].value)
        }
    }
}
function formatearRut() {
    rut = $("#Ruta");
    //console.log(rut[0].value.length);
    if(rut[0].value[0] == "0"){
        rut[0].value = rut[0].value.substring(1,rut[0].value.length)
    }
    dv = rut[0].value[rut[0].value.length-1]
    rut[0].value = rut[0].value.substring(0,rut[0].value.length-1)
    rut[0].value  = rut[0].value.replace(/\./g,'');
    rut[0].value = rut[0].value.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
    rut[0].value = rut[0].value.split('').reverse().join('').replace(/^[\.]/,'') + "-"+ dv;   
}

