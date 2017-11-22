<?php
use App\Http\Controllers\Busqueda_personal;
Busqueda_personal::get_cargos();
Busqueda_personal::cal_sub_Total();
Busqueda_personal::Liquido_Alcansado();
Busqueda_personal::Sobre_Giro();
Busqueda_personal::Gastos_Extras();


?>

@if (session()->has('Empleado'))



<table id="tabla_vista_previa">
    <tr id="fila_1"><td>
        <table id="tabla_head">
            <tr><td></td></tr>
            <tr><td></td></tr>
			<tr>
				<td class="letra_pequena">Sociedad Jardin infantil Mi Mundo</td>
				<td rowspan="5" class="espaciado_derecho"></td>
			</tr>
			<tr>
				<td class="letra_pequena">77556-430-k</td>
			</tr>
			<tr>
				<td class="letra_pequena">Santa Cruz N°1064-Triguén</td>
			</tr>
			<tr>
				<td class="letra_pequena">(045)2869521</td>
			</tr>
			<tr>
				<td class="letra_pequena"></td>
			</tr>
            <tr> <td></td></tr>
            <tr><td colspan="2" rowspan="2" id="titulo"><h1>LIQUIDACIÓN DE SUELDOS</h1></td></tr>
        </table>
            </td></tr>
            <tr id="fila_2"><td>
            <table id="tabla_head_datos" >
                <tr>
                    <td colspan="2" class="head_datos_letra_col1"> NOMBRE</td>
                    <td colspan="4" class="head_datos_letra_col2">{{ session('Empleado')->Datos->Nombre }}</td>
                    <td colspan="3" class="head_datos_horas">HORA CLASES</td>
                    <td class="head_datos_horas">{{ session('Empleado')->Datos->N_horas }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="head_datos_letra_col1">RUT</td>
                    <td colspan="4" class="head_datos_letra_col2">{{ session('Empleado')->Datos->Rut }}</td>
                    <td colspan="3" class="head_datos_horas">HORA SEP</td>
                    <td class="head_datos_horas"></td>
                </tr>
                <tr>
                    <td colspan="2" class="head_datos_letra_col1">FECHA DE INGRESO</td>
                    <td colspan="4" class="head_datos_letra_col2">{{ session('Empleado')->Datos->F_ingreso }}</td>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="2" class="head_datos_letra_col1">TIPO DE CONTRATO</td>
                    <td colspan="4" class="head_datos_letra_col2">{{ session('Empleado')->Contrato->Contrato }}</td>
                    <td class="head_datos_letra_col3"></td>
                    <td colspan="3" rowspan="3" id="head_col4" class="head_datos_letra_col4"><?php Busqueda_personal::get_fecha_php(); ?> </td>

                </tr>
                <tr>
                    <td colspan="2" class="head_datos_letra_col1">CARGO O DESEMPEÑO</td>
                    <td colspan="4" class="head_datos_letra_col2"> {{ session('Empleado')->Datos->Cargos }}</td>
                    <td class="head_datos_letra_col3"></td>
                </tr>
                <tr>
                    <td colspan="2" class="head_datos_letra_col1">CENTRO DE COSTOS</td>
                    <td colspan="4" class="head_datos_letra_col2">Colegio Mi Mundo				
</td>
                    <td class="head_datos_letra_col3"></td>
                </tr>
                <tr>
                    <td colspan="2" class="head_datos_letra_col1">SUELDO BASE</td>
                    <td colspan="4" class="head_datos_letra_col2" id="formatoDineroV">
                    	{{ session('Empleado')->Datos->Sueldo_base }} 
                    </td>
                    <td colspan="4"></td>
                </tr>                    
            </table>              
        </td></tr>
    <tr><td>
    
    <table  id="tabla_bonos_descuentos">
        <!--<tr>
            <td colspan="6" ></td>
        </tr>-->
        <tr>
            <td colspan="3" id="Haberes">HABERES</td>
            <td colspan="3" id="Descuentos">DESCUENTOS</td>
        </tr>
        <tr>
                            <td class="Haberes_column1">30 DÍAS</td>
                            <td class="Haberes_column2">Sueldo Mensual</td>
                            <td class="Haberes_column3" id="formatoDineroV" value="{{ session('Empleado')->Datos->Sueldo_base }}">{{ session('Empleado')->Datos->Sueldo_base }}</td>

                            <td class="Descuentos_column1">{{ session('Empleado')->Afp->Tasa }} %</td>
                            <td class="Descuentos_column2">{{ session('Empleado')->Afp->AFP }} </td>
                            <td class="Descuentos_column3">${{ session('Empleado')->Datos->Total_AFP }}</td>
        </tr>
    <?php
    
    $contador = 0;  
    if(session('Empleado')->Datos->Rut){
    	$sql1 = DB::table('tBonos')
      	->join('rel_tEmpleados_tBonos','tBonos.id_Bono', '=', 'rel_tEmpleados_tBonos.id_Bono')
      	->join('tEmpleados', 'rel_tEmpleados_tBonos.Rut', '=', 'tEmpleados.Rut')
      	->where('tEmpleados.Rut','=',session('Empleado')->Datos->Rut)
      	->get();
	
      	$sql2= DB::table('rel_tEmpleados_tDescuentos')
        ->join('tEmpleados','rel_tEmpleados_tDescuentos.Rut', '=','tEmpleados.Rut')
        ->join('tDescuentos', 'rel_tEmpleados_tDescuentos.id_Descuento', '=', 'tDescuentos.id_Descuento')
        ->where('tEmpleados.Rut','=', session('Empleado')->Datos->Rut)
        ->get();
		
		$sql3 = DB::table('tPrestamos')
        ->where('tPrestamos.Rut',"=", session('Empleado')->Datos->Rut,' AND',' tPrestamos.activo','=',true)
        ->get();
        
        $sql4 = DB::table('tLicencias')
        ->where('tLicencias.Rut',"=", session('Empleado')->Datos->Rut,' AND',' tLicencias.activo','=',true)
        ->get();


       

        while ($contador<20) {
            echo "<tr>";
            echo "<td class='Haberes_column1'></td>";
            echo "<td class='Haberes_column2'>";

          
            if(!empty($sql1[$contador]->Bono)){ 
           		if($sql1[$contador]->id_Bono!=26){
                    echo  $sql1[$contador]->Bono;
                	}
                }
            
                
            echo "</td>";
            echo "<td class='Haberes_column3'>";
            if(!empty($sql1[$contador]->Monto)){ 
                    if($sql1[$contador]->id_Bono!=26){
                    echo "$".$sql1[$contador]->Monto;
                	}
                }
            echo "</td>";
            echo "<td class='Descuentos_column1'>";

            if($contador==0){
                echo session('Empleado')->Isapre->Tasa."%";
            }
            echo "</td>";
            echo "<td class='Descuentos_column2'>";

          	if($contador == 0){
          		echo session('Empleado')->Isapre->ISAPRE;
          	}
          	if($contador==1){
                echo "Seguro Cesantia";
            }

            if($contador >= 2){
            	if(!empty($sql2[$contador])){
            		echo "$".$sql2[$contador]->Monto;
            	}else{
            		if(!empty($sql3[$contador])){
            			echo $sql3[$contador]->Nombre;
            		}
            		else{
            			if(!empty($sql4[$contador])){
            				echo 'Licencias Medicas';
            				//echo $sql4;
            			}	
            		}
            	}
            }

            echo "</td>";
            echo "<td class='Descuentos_column3'>";
            
            if($contador == 0){
            	echo "$".session('Empleado')->Datos->Total_Isapre;
            }
            if($contador == 1){
            	echo "$".session('Empleado')->Datos->Total_Seguro;
            }

            if($contador >= 2){
            	if(!empty($sql2->Monto)){
            		echo "$".$sql2->Monto;
            	}else{
            		if($sql4 == true){
            	//		echo 'hola';
            		}
            	}
            } 
            echo "</td>";
            echo "</tr>";



            $contador += 1;
        }

    } 
    while($contador<20){
            echo "<tr>";
            echo "<td class='Haberes_column1'></td>";
            echo "<td class='Haberes_column2'></td>";
            echo "<td class='Haberes_column3'></td>";
            echo "<td class='Descuentos_column1'></td>";
            echo "<td class='Descuentos_column2'></td>";
            echo "<td class='Descuentos_column3'></td>";
            echo "</tr>";
            $contador+=1;             
    }  

            
    ?>


                        <tr>
                            <td colspan="2" id="total_haberes" class="negrita">TOTAL HABERES</td>
                            <td class="total_valores">${{ session('Empleado')->Datos->Total_Haberes }}</td>
                            <td colspan="2" id="total_descuento" class="negrita">TOTAL DESCUENTOS</td>
                            <td class="total_valores">${{ session('Empleado')->Datos->Total_Descuentos }}</td>
                        </tr>




                    </table>
                </td></tr>
                <tr><td>
                    <table id="tabla_resultados" >


                        <tr>
                            <td colspan="6"></td>
                        </tr>


                        <tr>
                            <td class="resultados2_column1" colspan="3" >TOTAL IMPONIBLE</td>
                            <td class="total_valores">${{ session('Empleado')->Datos->Total_Imponible }}</td>
                            <td class="resultados2_column4" colspan="3">TOTAL HABERES</td>
                            <td class="total_valores">${{ session('Empleado')->Datos->Total_Haberes }}</td>

                        </tr>
                        <tr>
                            <td class="resultados2_column1" colspan="3">TOTAL TRIBUTABLE</td>
                            <td class="total_valores">${{ session('Empleado')->Datos->Total_Tributable}}</td>
                            <td class="resultados2_column4" colspan="3">DESCUENTOS LEGALES</td>
                            <td class="resultados2_column5">${{ session('Empleado')->Datos->Descuentos_Legal }}</td>

                        </tr>


                        <tr>
                            <td class="resultados1_column1">MUTUAL</td>
                            <td  class="resultados2_column2" colspan="2">CESANTIA</td>
                            <td class="resultados2_column3">S.I.S.</td>

                            <td colspan="3" class="resultados2_column4">DESCUENTOS VARIOS</td>
                            <td class="resultados2_column5">${{ session('Empleado')->Datos->Descuentos_Otros }}</td>
                        </tr>
                        <tr>
                            <td class="resultados3_column">$ {{ session('Empleado')->Datos->Gastos_extras_Mutual }}

                            </td>
                            <td  class="resultados3_column" colspan="2">${{ session('Empleado')->Datos->Gastos_extras_Seguro_cesantia }}</td>
                            <td class="resultados3_column">${{ session('Empleado')->Datos->Gastos_extras_SIS}} </td>

                            <td colspan="3" class="resultados2_column4">SUB TOTAL</td>
                            <td class="resultados2_column5">${{ session('Empleado')->Datos->sub_Total}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td  class="resultados2_column2" colspan="2">LIQUIDO ALCANZADO</td>
                            <td class="resultados3_column">${{ session('Empleado')->Datos->Liquido_Alcansado}}</td>

                            <td colspan="3" class="resultados2_column4">ASIGNACIÓN FAMILIAR</td>
                            <td class="resultados2_column5">${{ session('Empleado')->Datos->Asignacion_Familiar}} </td>
                        </tr>
                        <tr>
                            <td ></td>
                            <td colspan="2"></td>
                            <td></td>

                            <td colspan="3" class="resultados2_column4">LIQUIDO A PAGAR</td>
                            <td class="resultados2_column5">${{ session('Empleado')->Datos->Liquido_Pagar}} </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2"></td>
                            <td></td>

                            <td colspan="3" class="resultados2_column4">SOBREGIRO</td>
                            <td class="total_valores">${{ session('Empleado')->Datos->Sobre_Giro }}</td>
                        </tr>
                        <tr>
                            <td colspan="8"></td>
                        </tr>
                        <tr id="final_tabla_resultados">
                            <td colspan="2" id="final1_tabla_resultados">SON:</td>
                            <td colspan="6" id="final2_tabla_resultados"> 
                            	
                            	<script> 


                            	$(document).ready(function(){
                            		val = <?php echo session('Empleado')->Datos->Liquido_Alcansado; ?>;
                            		val = numeroALetras(val, {
											  plural: 'PESOS CHILENOS',
											  singular: 'PESO CHILENO',
											  centPlural: 'PESOS',
											  centSingular: 'PESO'
											});
                           
                            		$("#final2_tabla_resultados").html(val);
                            	
                            	});
                            	
                            	
                            	</script>
                            </td>
                        </tr>
                    </table>    
                </td></tr>
                <tr><td>
                    <table id="tabla_footer">
                        <tr>
                            <td colspan="6" id="tabla_footer_acuerdo"><br/><p>
                                <div>Certifico he recibido de mi empleador a mi entera satisfacción la </div>
                                <div>Suma indicada y declaro tener pleno conocimiento de los descuentos reflejados en este documento,</div>
                                <div>los cuales han sido autorizados por ley y/o mutuo acuerdo y no tengo cargo ni cobro alguno posterior que</div>
                                <div>hacer, por ninguno de los conectos comprendidos en esta liquidación.</div>                            
                                </p><br/><br/><br></td>
                        </tr>
						<tr>
							<td class="espaciado_extra"></td><td class="espacios_blanco"></td><td class="espacios_blanco"></td><td class="espaciado_extra"></td>
						</tr>
                        <tr>
                            <td id="firma_contador">
                                <div class="negrita">REVISADO POR</div>
                        <?php
                        $EFL  = DB::table('tEmpleados')
                        		->join('rel_tEmpleados_tCargos','tEmpleados.Rut','=','rel_tEmpleados_tCargos.Rut')
                        		->where('rel_tEmpleados_tCargos.id_Cargo','=',14)
                        		->get();


                        ?>
                                <div > {{ $EFL[0]->Nombre}}</div>
                                <div id="Rutv">{{ $EFL[0]->Rut }}</div>                        
                            </td>
                            <td class="espacios_blanco"></td>
                            <td class="espacios_blanco"></td>

                            <td id="firma_empleado">
                                <strong>RECIBI CONFORME</strong>
                                {{ session('Empleado')->Datos->Nombre}}<br />
                                <div id="Rutv">{{ session('Empleado')->Datos->Rut}}</div><br />
                            </td>
                        </tr>
                        <tr>
                            <td coldspan="6"><br/><br/><br/></td>
                        </tr>
                    </table>    
                </td></tr>
            </table>

@else
	@include('modules/liquidaciones/noEmpleado/')
@endif
<input type="button" name="imprimir" value="Imprimir" onclick="window.print();">

<?php //Escribir_Reporte("Se imprimio la liquidacion del Empleado con rut: ".//$_SESSION['Rut'])."."?

