@extends('app')

@section('content')


<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
  	 <h2 class="text-center" style="font-family: sans-serif;color: #FFCC00;font-style: inherit;font-variant: small-caps;font-weight: 700;background-color: #F2F9F7;">Configuraciones del sistema</h2>
  	 <div style="margin-top:35px" > 
		  
		  <p class="text-center" style="color: #5189B3;font-weight: 800;font-size: larger;">Moldes:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btn btn-info">12 ingresados</button> Moldes:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btn btn-info">Encargados</button> Moldes:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btn btn-info">Encargados</button>  </p>
		  <hr>
     </div>

    
     <div style="margin-top:35px" > 
		  
		  <p class="text-center" style="color: #5189B3;font-weight: 800;font-size: larger;">Editar un Ensayo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btn btn-warning" data-remodal-target="buscarcarga_modal" >Buscar</button> </p>
		  <hr>
     </div>

  </div>
  <div class="col-md-2"></div>
</div>



{{--Modal busqueda carga--}}
<div class="remodal" data-remodal-id="buscarcarga_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3>Digite el numero de carga</h3>
  <br>
  

  <div class="row">
  <div class="col-md-12">
      <div class="col-md-12">
        <form class="form-horizontal" method="post" action="/pc/configuracion/busqueda/carga">
        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
        
        <div class="form-group"> 
        <label>Numero Carga: <input class="form-control" type="text" name="Parametro" placeholder="Numero Carga"  required=""    /></label>
        </div>

        <div class="form-group"> 
        <button class="btn btn-success" style="margin-bottom:65px;">Buscar</button>
        </div>
        
        </form>

      </div>

  </div>

  </div>
    
</div> {{--Modal busqueda carga--}}

@endsection