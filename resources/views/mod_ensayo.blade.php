@extends('app')

@section('content')


<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
  	 <h2 class="text-center" style="font-family: sans-serif;color: #FFCC00;font-style: inherit;font-variant: small-caps;font-weight: 700;background-color: #F2F9F7;">Modificacion de Ensayo</h2>
  	 <div style="margin-top:35px" > 
		  <hr>
		 </div>

  <div style="margin-top:35px" > 
     @if( count($trabajabilidad) <= 0 && count($yield) <= 0 && count($vebe) <= 0 && count($transferencia)<= 0 && count($falla7) <= 0 && count($falla28) <= 0)
      <p class="bg-danger text-center" style="height:40px;padding-top:10px"><b>Datos no encontrados . No existe ningun ensayo realizado con este numero de carga.</b></p>
     @endif
  </div>

     <div style="margin-top:35px" > 
		  
		  <p class="text-center" style="color: #5189B3;font-weight: 800;font-size: larger;">
      @if(count($trabajabilidad) > 0 )
      &nbsp; <button class="btn btn-warning" data-remodal-target="buscarcarga_modal" >Trababilidad</button>&nbsp;
      @endif

      @if(count($yield) > 0 )
      <button class="btn btn-warning" data-remodal-target="buscaryield_modal" >Yield</button>  &nbsp;
      @endif

      @if(count($vebe) > 0 )
      <button class="btn btn-warning" data-remodal-target="buscarvebe_modal" >Vebe</button>  &nbsp;
      @endif

      @if(count($transferencia) > 0 )
      <button class="btn btn-warning" data-remodal-target="buscartransferencia_modal" >Transferencia</button>  &nbsp;
      @endif

      @if(count($falla7) > 0 )
      <button class="btn btn-warning" data-remodal-target="buscarfalla7_modal" >Falla7</button>  &nbsp;
      @endif

      @if(count($falla28) > 0 )
      <button class="btn btn-warning" data-remodal-target="buscarfalla28_modal" >Falla28</button></p> &nbsp;
      @endif
		  

      <hr>
     </div>

  </div>
  <div class="col-md-2"></div>
</div>


@if(count($trabajabilidad) > 0)
{{--Modal trabajabilidad--}}
<div class="remodal" data-remodal-id="buscarcarga_modal" style=" max-width: 1000px;width: 100%;">
<button data-remodal-action="close" class="remodal-close"></button>
<div class="row"> 
<div class="col-md-12"> 
<b>{{$trabajabilidad->Numero_Carga}}</b>
<form class="form-horizontal formvalidate" method="post" action="/pc/configuracion/actualizar/trabajabilidad">
<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  <table class="table table-bordered">
        
           <thead class="bg-success " style="font-weight:bold" >
              <tr>
               <td>Nombre de proyecto</td>
                <td>Nombre del elemento</td>
                <td>Hora de ensayo</td>
                <td>Trabajabilidad y flujo (cm) </td>
                <td>Temperatura (°C)</td>
                <td>Volumen (m3)</td>
                <td>Codigo Tarro</td>
                <td>Encargado</td>

              </tr>
             </thead> 

             <div> 
        
             <tbody >
             
       
      
         
         <tr >
              <td><input required="" type="text" class="form-control" name="Nombre_Proyecto" id="Nombre_Proyecto"  value="{{$trabajabilidad->Nombre_Proyecto}}" placeholder="Elemento"></td>

              <td><input required="" type="text" class="form-control" name="Nombre_Elemento" id="Nombre_Elemento"  value="{{$trabajabilidad->Nombre_Elemento}}"  placeholder="Elemento"></td>
              <td><input  type="text" required="" name="Hora_Ensayo" class="form-control timepicker" id="timepicker" placeholder="Hora" value="{{$trabajabilidad->Hora_Ensayo}}"></td>
              <td> <input value="{{$trabajabilidad->Revenimiento}}" type="number" step="0.01" name="Revenimiento" class="form-control" id="inputEmail3" placeholder="CM"></td>
              <td><input value="{{$trabajabilidad->Temperatura}}" type="number" step="0.01" required="" name="Temperatura" class="form-control" id="inputEmail3" placeholder="Temperatura"></td>
              <td><input value="{{$trabajabilidad->Volumen}}" type="number" step="0.01" required=""   name="Volumen" class="form-control" id="Volumen" ></td>
              <td> <select name="Codigo_Tarro" class="form-control" >
                    @foreach($tarros as $tarro)
                      @if($trabajabilidad->Codigo_Tarro == $tarro->codigo )
                      <option selected="" value="{{$tarro->codigo}}" > {{$tarro->codigo}} </option>
                      @else
                      <option value="{{$tarro->codigo}}" > {{$tarro->codigo}} </option>
                      @endif 
                    @endforeach

                   </select> </td>
              <td style="color:blue">
                               <select name="Encargado" class="form-control" >
                                        @foreach($encargados as $encargado)
                                          @if($trabajabilidad->Encargado == $encargado->nombre)
                                        <option selected="" value="{{$encargado->nombre}}" > {{$encargado->nombre}} </option>
                                          @else
                                         <option value="{{$encargado->nombre}}" > {{$encargado->nombre}} </option>
                                          @endif
                                        @endforeach
                                      </select>

                  </td>
                 </tr>
           
          
             </tbody>

        </table>
        <input type="hidden" name="id" value="{{$trabajabilidad->id}}" />
        <button class="btn btn-success" type="submit">Actualizar</button>
        </form>
   </div> 


</div>    
</div> {{--Modal busqueda carga--}}
@endif



@if(count($yield) > 0)
{{--Modal yield--}}
<div class="remodal" data-remodal-id="buscaryield_modal" style=" max-width: 1000px;width: 100%;">
<button data-remodal-action="close" class="remodal-close"></button>
<div class="row"> 
<div class="col-md-12"> 
<b>{{$yield->Numero_Carga}}</b>
<form class="form-horizontal formvalidate" method="post" action="/pc/configuracion/actualizar/yield">
<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  <table class="table table-bordered">
        
           <thead class="bg-success ">
              <tr>
                <td>Aditivo1</td>
                <td>Agua</td>
                <td>Aditivo2</td>
                <td>Yield</td>
                <td>Volumen Teorico</td>
                <td>Densidad Real</td>
                <td>Volumen Real</td>
                <td>Rendimiento Real</td>
                <td>Encargado</td>
                
             
              </tr>
             </thead>

             
             <tr>
              
            
              <td><input required="" type="number" step="0.01" class="form-control" name="Aditivo1"  value="{{$yield->Aditivo1}}" placeholder="Elemento"></td>
              <td><input required="" type="number" step="0.01" class="form-control" name="Agua"   value="{{$yield->Agua}}" placeholder="Elemento"></td>

              <td><input required="" type="number" step="0.01" class="form-control" name="Aditivo2"   value="{{$yield->Aditivo2}}" placeholder="Elemento"></td>

              <td><input required="" type="number" step="0.01" class="form-control" name="Yield"   value="{{$yield->Yield}}" placeholder="Elemento"></td>

              <td><input required="" type="number" step="0.01" class="form-control" name="Volumen_Teorico"   value="{{$yield->Volumen_Teorico}}" placeholder="Elemento"></td>

              <td><input required="" type="number" step="0.01" class="form-control" name="Densidad_Real"  value="{{$yield->Densidad_Real}}" placeholder="Elemento"></td>

              <td><input required="" type="number" step="0.01" class="form-control" name="Volumen_Real"   value="{{$yield->Volumen_Real}}" placeholder="Elemento"></td>

              <td><input required="" type="number" step="0.01" class="form-control" name="Rendimiento_Real"   value="{{$yield->Rendimiento_Real}}" placeholder="Elemento"></td>
              

              <td style="color:blue"> <select name="Encargado" class="form-control" >
                                        @foreach($encargados as $encargado)
                                          @if($yield->Encargado == $encargado->nombre)
                                        <option selected="" value="{{$encargado->nombre}}" > {{$encargado->nombre}} </option>
                                          @else
                                         <option value="{{$encargado->nombre}}" > {{$encargado->nombre}} </option>
                                          @endif
                                        @endforeach
                                      </select>

                                      </td>
              
              </tr>
             
             <tbody>
              


             </tbody>


        </table>

        <input type="hidden" name="id" value="{{$yield->id}}" />
        <button class="btn btn-success" type="submit">Actualizar</button>
        </form>
   </div> 


</div>    
</div> {{--Modal busqueda carga--}}
@endif


@if(count($vebe) > 0)
{{--Modal trabajabilidad--}}
<div class="remodal" data-remodal-id="buscarvebe_modal" style=" max-width: 1000px;width: 100%;">
<button data-remodal-action="close" class="remodal-close"></button>
<div class="row"> 
<div class="col-md-12"> 
<b>{{$vebe->Numero_Carga}}</b>
<form class="form-horizontal formvalidate" method="post" action="/pc/configuracion/actualizar/vebe">
<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  <table class="table table-bordered ">
        
           <thead class="bg-success">
              <tr>
              
      
                <td>Vebe</td>
                <td>Peralte</td>
                <td>Volumen</td>
                <td>Humedad</td>
                <td>Amperimetro</td>
                
                <td>Encargado</td>
                

              </tr>
             </thead> 


        
             <tbody>

             

              <tr>
            
               
               
                <td><input type="number" step="0.01" name="Vebe" class="form-control" required="" value="{{$vebe->Vebe}}" > </td>
                
                <td> <input type="number" step="0.01" name="Peralte" class="form-control" required="" value="{{$vebe->Peralte}}" > </td> 
                
                <td> <input type="number" step="0.01" name="Volumen" class="form-control" required="" value="{{$vebe->Volumen}}" > </td>
                
                <td> <input type="number" step="0.01" name="Humedad" class="form-control" required="" value="{{$vebe->Humedad}}" > </td>
               
                <td> <input type="number" step="0.01" name="Amperimetro" class="form-control" required="" value="{{$vebe->Amperimetro}}" > </td>

                <td style="color:blue">
                               <select name="Encargado" class="form-control" >
                                        @foreach($encargados as $encargado)
                                          @if($vebe->Encargado == $encargado->nombre)
                                        <option selected="" value="{{$encargado->nombre}}" > {{$encargado->nombre}} </option>
                                          @else
                                         <option value="{{$encargado->nombre}}" > {{$encargado->nombre}} </option>
                                          @endif
                                        @endforeach
                                      </select>

                  </td>
              
             </tr>
             
         

             </tbody>

        </table>
        <input type="hidden" name="id" value="{{$vebe->id}}" />
        <button class="btn btn-success" type="submit">Actualizar</button>
        </form>
   </div> 


</div>    
</div> {{--Modal busqueda carga--}}
@endif


@if(count($transferencia) > 0)
{{--Modal trabajabilidad--}}
<div class="remodal" data-remodal-id="buscartransferencia_modal" style=" max-width: 1000px;width: 100%;">
<button data-remodal-action="close" class="remodal-close"></button>
<div class="row"> 
<div class="col-md-12"> 
<b>{{$transferencia->Numero_Carga}}</b>
<form class="form-horizontal formvalidate" method="post" action="/pc/configuracion/actualizar/transferencia">
<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
   <table class="table table-bordered ">
        
           <thead class="bg-success">
              <tr>
                <td>Falla 1</td>
                <td>Edad falla 1</td>
                <td>Falla 2</td>
                <td>Edad falla 2</td>
                <td>Falla 3</td>
                <td>Edad falla 3</td>
                <td>Promedio carga</td>
                <td>Encargado</td>
                
              </tr>
             </thead>
             
                   <tbody>
      
             <tr>
               
              <td><input type="number" step="0.01" name="Falla1" class="form-control" required="" value="{{$transferencia->Falla1}}" ></td>

              <td><input type="number"  name="Edad_f1" class="form-control" required="" value="{{$transferencia->Edad_f1}}" ></td>

              <td><input type="number" step="0.01" name="Falla2" class="form-control" required="" value="{{$transferencia->Falla2}}" ></td>

              <td><input type="number"  name="Edad_f2" class="form-control" required="" value="{{$transferencia->Edad_f2}}" ></td>

              <td><input type="number" step="0.01" name="Falla3" class="form-control" required="" value="{{$transferencia->Falla3}}" ></td>

              <td><input type="number"  name="Edad_f3" class="form-control" required="" value="{{$transferencia->Edad_f3}}" > </td>

              <td><input type="number" step="0.01" name="Promedio_Carga" class="form-control" required="" value="{{$transferencia->Promedio_Carga}}" ></td>

          
                  <td style="color:blue">
                               <select name="Encargado" class="form-control" >
                                        @foreach($encargados as $encargado)
                                          @if($transferencia->Encargado == $encargado->nombre)
                                        <option selected="" value="{{$encargado->nombre}}" > {{$encargado->nombre}} </option>
                                          @else
                                         <option value="{{$encargado->nombre}}" > {{$encargado->nombre}} </option>
                                          @endif
                                        @endforeach
                                      </select>

                  </td>
            
             </tr>
            
              
             </tbody>


        </table>
        <input type="hidden" name="id" value="{{$transferencia->id}}" />
        <button class="btn btn-success" type="submit">Actualizar</button>
        </form>
   </div> 


</div>    
</div> {{--Modal busqueda carga--}}
@endif


@if(count($falla7) > 0)
{{--Modal falla 7--}}
<div class="remodal" data-remodal-id="buscarfalla7_modal" style=" max-width: 1000px;width: 100%;">
<button data-remodal-action="close" class="remodal-close"></button>
<div class="row"> 
<div class="col-md-12"> 
<b>{{$falla7->Numero_Carga}}</b>
<form class="form-horizontal formvalidate" method="post" action="/pc/configuracion/actualizar/falla7">
<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
    <table class="table table-bordered ">
        
           <thead class="bg-success">
              <tr>
                <td>Lugar Falla</td>
                <td>Falla 1</td>
                <td>Falla 2</td>
                <td>Falla 3</td>
                <td>Resist. Nominal</td>
                <td>Resist. Promedio</td>
                <td>Resist. Porcentual</td>
                <td>Encargado</td>
                
              </tr>
             </thead> 

             <tbody>

              <tr>
              
              
              <td><input name="Lugar_Falla" required  type="Text" class="form-control "  value="{{$falla7->Lugar_Falla}}"></td>

              <td><input type="number" step="0.01" name="Falla1" class="form-control" required="" value="{{$falla7->Falla1}}" ></td>

              <td><input type="number" step="0.01" name="Falla2" class="form-control" required="" value="{{$falla7->Falla2}}" ></td>

              <td><input type="number" step="0.01" name="Falla3" class="form-control" required="" value="{{$falla7->Falla3}}" ></td>

              <td><input type="number" step="0.01" name="Resis_Nominal" class="form-control" required="" value="{{$falla7->Resis_Nominal}}" ></td>

              <td><input type="number" step="0.01" name="Resis_Promedio" class="form-control" required="" value="{{$falla7->Resis_Promedio}}" ></td>

              <td><input type="number" step="0.01" name="Resis_Porcentual" class="form-control" required="" value="{{$falla7->Resis_Porcentual}}" ></td>

               <td style="color:blue">
                               <select name="Encargado" class="form-control" >
                                        @foreach($encargados as $encargado)
                                          @if($falla7->Encargado == $encargado->nombre)
                                        <option selected="" value="{{$encargado->nombre}}" > {{$encargado->nombre}} </option>
                                          @else
                                         <option value="{{$encargado->nombre}}" > {{$encargado->nombre}} </option>
                                          @endif
                                        @endforeach
                                      </select>

                  </td>
              

             </tr>


             </tbody>

        </table>
        <input type="hidden" name="id" value="{{$falla7->id}}" />
        <button class="btn btn-success" type="submit">Actualizar</button>
        </form>
   </div> 


</div>    
</div> {{--Modal busqueda carga--}}
@endif



@if(count($falla28) > 0)
{{--Modal falla 28 --}}
<div class="remodal" data-remodal-id="buscarfalla28_modal" style=" max-width: 1000px;width: 100%;">
<button data-remodal-action="close" class="remodal-close"></button>
<div class="row"> 
<div class="col-md-12"> 
<b>{{$falla28->Numero_Carga}}</b>
<form class="form-horizontal formvalidate" method="post" action="/pc/configuracion/actualizar/falla28">
<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
   <table class="table table-bordered ">
        
           <thead class="bg-success">
              <tr>
                <td>Lugar Falla</td>
                <td>Falla 1</td>
                <td>Falla 2</td>
                <td>Falla 3</td>
                <td>Resist. Nominal</td>
                <td>Resist. Promedio</td>
                <td>Resist. Porcentual</td>
                <td>Encargado</td>
                
              </tr>
             </thead> 

             <tbody>

              <tr>
              
              
              <td><input name="Lugar_Falla" required  type="Text" class="form-control "  value="{{$falla28->Lugar_Falla}}"></td>

              <td><input type="number" step="0.01" name="Falla1" class="form-control" required="" value="{{$falla28->Falla1}}" ></td>

              <td><input type="number" step="0.01" name="Falla2" class="form-control" required="" value="{{$falla28->Falla2}}" ></td>

              <td><input type="number" step="0.01" name="Falla3" class="form-control" required="" value="{{$falla28->Falla3}}" ></td>

              <td><input type="number" step="0.01" name="Resis_Nominal" class="form-control" required="" value="{{$falla28->Resis_Nominal}}" ></td>

              <td><input type="number" step="0.01" name="Resis_Promedio" class="form-control" required="" value="{{$falla28->Resis_Promedio}}" ></td>

              <td><input type="number" step="0.01"  name="Resis_Porcentual" class="form-control" required="" value="{{$falla28->Resis_Porcentual}}" ></td>

               <td style="color:blue">
                               <select name="Encargado" class="form-control" >
                                        @foreach($encargados as $encargado)
                                          @if($falla28->Encargado == $encargado->nombre)
                                        <option selected="" value="{{$encargado->nombre}}" > {{$encargado->nombre}} </option>
                                          @else
                                         <option value="{{$encargado->nombre}}" > {{$encargado->nombre}} </option>
                                          @endif
                                        @endforeach
                                      </select>

                  </td>
              

             </tr>


             </tbody>

        </table>
        <input type="hidden" name="id" value="{{$falla28->id}}" />
        <button class="btn btn-success" type="submit">Actualizar</button>
        </form>
   </div> 


</div>    
</div> {{--Modal busqueda carga--}}
@endif


@endsection