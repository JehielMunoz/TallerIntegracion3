 $(document).ready(function () {
     $('#sidebarCollapse').on('click', function () {
         $('#sidebar').toggleClass('active');
     });
     $('#nPersonal').on('input', function () {
         var Nombres = [];
         var Rut = [];
         var urlAutocompletar = "{{ route('autocompletar') }}" + "?Nombre_Personal=" + $(this).val(); // limitar caracteres, minimo 3 o 2 

         $.getJSON(urlAutocompletar, function (Personal) {

             for (var x = 0; x < Personal.length; x++) {
                 Nombres.push(Personal[x].Nombre);
                 Rut.push(Personal[x].Rut);
             }
         });
         console.log(Nombres);
         console.log(Rut);

         $(this).autocomplete({
             source: Nombres,
             change: function () {}
         });

     });
 });