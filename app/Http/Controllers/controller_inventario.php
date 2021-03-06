<?php
namespace App\Http\Controllers;
header('content-type: application/json; charset=utf-8');
use Illuminate\Http\Request;
use DB;
use Log;
class controller_inventario extends Controller
{
    public static function num_inventario_tablas(){
        $item = new \stdClass(); 
        $items= DB::table('tInventario')->get();
        $count = count($items);
        $ntablas = 1;
        
        for ($i = 0; $i < $count; $i++) {
            if($i == $ntablas*10){
                $ntablas+=1;
            }
        }
        return $ntablas;
    }
    
    public static function cargar_modificar($Serial){
        $item= DB::table('tInventario')->where("Serial",'=',$Serial)->get()[0];
                echo '
                    <table id="tabla_item" class="table table-bordered">
        
                      <thead>
                        <tr>
                          
                          <th scope="col">Serial</th>
                          <th scope="col">Sector</th>
                          <th scope="col">Descripcion</th>
                          <th scope="col">Estado</th>
                          <th scope="col">Modificar</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                ';
                
            
            
            echo '
                    <tr>
                    <form method="get" action="'.route('modificar_item').'">
                      <td><input id="Serial" name="Serial" readonly type="text" value="'.$item->Serial.'"></td>
                      <td><input id="Sector" name="Sector" type="text" value="'.$item->Sector.'"></td>
                      <td><input id="Descripcion" name="Descripcion" type="text" value="'.$item->Descripcion.'"></td>
                      <td><input id="Estado" type="text" name="Estado" value="'.$item->Estado.'"></td>
                      <td><input type="submit" value="Actualizar"></td>
                    </form>
            
                    </tr>    
                        </tbody>
                    </table>';
                
            
          
    }
    public static function cargar_inventario(){
        $item = new \stdClass(); 
        $items= DB::table('tInventario')->get();
        $cont_tablas= 1;
        request()->session()->put('cont_tablas',$cont_tablas);
        $cont = 0;
        request()->session()->put('cont',$cont);
        
        $items->each(function($item)
        {
            $cont_tablas = session('cont_tablas');
            $cont = session('cont');
            if(session('cont')==0){
                echo '
                    <table id="tabla_items_',session('cont_tablas'),'" class="table table-bordered">
        
                      <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Serial</th>
                          <th scope="col">Sector</th>
                          <th scope="col">Subvencion</th>
                          <th scope="col">N� Factura</th>
                          <th scope="col">Fecha Factura</th>
                          <th scope="col">Proveedor</th>
                          <th scope="col">Rut Proveedor</th>
                          <th scope="col">Descripcion</th>
                          <th scope="col">Estado</th>
                          <th scope="col">Modificar</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                ';
                request()->session()->put('cont_tablas',session('cont_tablas')+1);
                
            }
            
            echo '
                    <tr>
                      <th scope="row">',$item->id,'</th>
                      <td>',$item->Serial,'</td>
                      <td>',$item->Sector,'</td>
                      <td>',$item->Subvencion,'</td>
                      <td>',$item->N_Boleta,'</td>
                      <td>',$item->F_factura,'</td>
                      <td>',$item->Proveedor,'</td>
                      <td>',$item->Rut_Proveedor,'</td>
                      <td>',$item->Descripcion,'</td>
                      <td>',$item->Estado,'</td>
                      <td><a href='.url('/inventario/modificar?Serial='.$item->Serial.'').'>Modificar</a></td>
                    </tr>
            ';
            
            request()->session()->put('cont',session('cont')+1);
            
            if(session('cont')==10){
                echo '
                        </tbody>
                    </table>
                ';
                request()->session()->put('cont',0);
            }
            
            
        });
    }
    
    public function agregar_item(Request $request){
        $this->validate(request(),[
            'tipo' => 'required|max:50',
            'serial' => 'required|max:20',
            'sector' => 'max:60',
            'subvencion' => 'required|max:50',
            'n_boleta' => 'required|max:70',
            'f_factura' => 'required',
            'proveedor' => 'max:70',
            'rut_proveedor' => 'max:20',
            'descripcion' => 'max:200',
            'estado' => 'required|max:50'         
        ]);
        
        if(request()->isMethod('post')){
            
            $tipo =  request('tipo');
            $serial =  request('serial');
            $sector =  request('sector');
            $subvencion =  request('subvencion');
            $n_boleta =  request('n_boleta');
            $f_factura =  request('f_factura');
            $proveedor =  request('proveedor');
            $rut_proveedor =  request('rut_proveedor');
            $descripcion =  request('descripcion');
            $estado =  request('estado');
            DB::table('tInventario')->insert(
                ['Tipo' => $tipo, 
                 'Serial' => $serial, 
                 'Sector' => $sector, 
                 'Subvencion' => $subvencion, 
                 'N_Boleta' => $n_boleta, 
                 'F_factura' => $f_factura, 
                 'Proveedor' => $proveedor, 
                 'Rut_Proveedor' => $rut_proveedor, 
                 'Descripcion' => $descripcion, 
                 'Estado' => $estado
                ]
            );                
            return back()->with('succ',"Se agrego el item con exito");
        }
    }
    public static function modificar_item(){
        if(request()->isMethod('get')){
        
                    if(request()->filled('Serial') && request()->filled('Sector') && request()->filled('Descripcion')&& request()->filled('Estado')){ // si el monto existe inserta el descuento
                        DB::table('tInventario')
                        ->where([
                            ['Serial','=',request('Serial')],
                        ])
                        ->update([
                            'Sector'=>request('Sector'),
                            'Descripcion'=>request('Descripcion'),
                            'Estado'=> request('Estado')
                        ]);
        
                    }
                }            
            return view("modules.inventario");
            
            }
        
    
}