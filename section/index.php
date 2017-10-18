<?php 
	require('heading.php'); 
	require('menu.php');

	$sesion = new SesionActiva();
	$active = $sesion->ActiveSesion();
?>

<script src="../js/bootstrap.js"></script>
<style>
	.carousel-inner > .item > img, .carousel-inner > .item > a > img{width:80%;margin:auto;}
</style>

<div class="jumbotron">
	<div class="container"><br>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
		      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      <li data-target="#myCarousel" data-slide-to="1"></li>
		      <li data-target="#myCarousel" data-slide-to="2"></li>
		      <li data-target="#myCarousel" data-slide-to="3"></li>
		    </ol>

		    <div class="carousel-inner" role="listbox">
		    	<div class="item active">
		    		<img src="../img/kratos-a.png" title="Mortal Kombat X" width="460" height="345">
		    	</div>

		    	<div class="item">
		        	<img src="../img/mkx-a.png" alt="God Of War Ascencion" width="460" height="345">
		        </div>
	    
	      		<div class="item">
	        		<img src="../img/nfs-a.png" alt="Flower" width="460" height="345">
	      		</div>

	      		<div class="item">
	        		<img src="../img/as-a.png" alt="Flower" width="460" height="345">
	      		</div>
		    </div>
			
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	      		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	      		<span class="sr-only">Previous</span>
	    	</a>

	    	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	      		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	      		<span class="sr-only">Next</span>
	    	</a>
		</div>
		
		<h2 class="text-primary">Bienvenid@ A Gamer Olympus</h2>

		<div class="row">
			<div class="col-md-6">
				<p style="text-align:justify;">
					Acá Podrás Encontrar Los Juegos Más Actualizados Del 2015, Si Quieres Vivir Una Vida Llena De Emociones, Con Emociones 
					En Proporciones Épicas Te Invitamos A Que Entres Ya A Nuestro Catálogo De Ventas Y Rentas De Juegos.
				</p>
			</div>

			<div class="col-md-6">
				<img src="../img/killkratos.gif" alt="Kratos">
			</div>
		</div>
	</div>
</div>