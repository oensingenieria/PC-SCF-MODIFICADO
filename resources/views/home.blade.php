@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Bienvenido</div>
				<div class="panel-body">
				
				<div class="row">
				
				<div class="col-md-12  ">
				<img class="img-responsive center-block" alt="pc logo" src="/logo.png">
				<br>
				<p class="text-center">Conectado como:&nbsp;<b>{{Auth::user()->username}}</b></p>
				</div>

				</div>


				</div>
			</div>
		</div>
	</div>
</div>
@endsection
