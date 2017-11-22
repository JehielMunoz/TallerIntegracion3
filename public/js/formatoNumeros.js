$(document).ready(Principal);

//main de funciones
function Principal(){
	formatearDinero();
	formatearRut();
<<<<<<< HEAD
    //formatearDineroV();
    formatearRutV();
    //console.log($("#formatoDinerov").attr('value')[0]);
=======
>>>>>>> 0636651b8425d00814f07e848defbfd3ec0acc69
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
<<<<<<< HEAD

function formatearDineroV(){ //para vista previa
    //var aDineros = []
    aDineros = $('[id="formatoDineroV"]');
    
    
    console.log(aDineros[0].innerHTML);
    for(var i=0; i<aDineros.length; i+=1){
        aDineros[i].innerHTML = "$"+aDineros[i].innerHTML.trim();

    }
    

}

=======
>>>>>>> 0636651b8425d00814f07e848defbfd3ec0acc69
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

<<<<<<< HEAD
function formatearRutV(){
    arut = $("[id='Rutv']");
    console.log(arut);
    for(var i=0; i<arut.length;i+=1){
        console.log(typeof(arut[i].innerHTML));
        if(arut[i].innerHTML[0] == "0"){
            arut[i].innerHTML = arut[i].innerHTML.substring(1,arut[i].innerHTML.length);
        }

        dv = arut[i].innerHTML[arut[i].innerHTML.length-1]
        arut[i].innerHTML = arut[i].innerHTML.substring(0,arut[i].innerHTML.length-1)
        arut[i].innerHTML = arut[i].innerHTML.replace(/\./g,'');
        arut[i].innerHTML = arut[i].innerHTML.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
        arut[i].innerHTML = arut[i].innerHTML.split('').reverse().join('').replace(/^[\.]/,'') + "-"+ dv;
    }

}
=======
>>>>>>> 0636651b8425d00814f07e848defbfd3ec0acc69
