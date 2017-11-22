<?php
 use App\Http\Controllers\controller_inventario;
?>
<div class="container">
    <nav aria-label="Page navigation">
        <ul class="pagination" id="pagination"></ul>
    </nav>
</div>
<div id="div_tablas_lista_items">

{{  controller_inventario::cargar_inventario() }} 

    
</div>


 




