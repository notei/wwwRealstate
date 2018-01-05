
<div class="row">
	<div class="col-md-4">
		<div class="card">
		  <div class="card-header">
		    Cliente
		  </div>
		  <div class="card-block">
		    <h5 class="card-title"><?=Yii::$app->user->identity->txt_correo ?></h5>
		    
		    
		    <ul class="list-group list-group-flush">
			    <li class="list-group-item">Cuenta: <?=Yii::$app->user->identity->idTipoUsuario->txt_nombre ?></li>
			    <li class="list-group-item">
			    	<a href="<?=Yii::$app->homeUrl?>user-home/propiedades">
			    		Propiedades: <?=$numPropiedadesPublicadas ?> pub. de <?=count($modelPropiedades) ?>
			    	</a>
		    	</li>
			    <li class="list-group-item">
			    	<a href="<?=Yii::$app->homeUrl?>user-home/contactos">
			    		Contactos registrados: <?=count($modelPersonas) ?>
		    		</a>
	    		</li>
		  	</ul>

		  </div>
		</div>

<?if($empresa != null): ?>

	
		<div class="card">
		  <div class="card-header">
		    Empresa
		  </div>
		  <div class="card-block">
		    <h5 class="card-title"><?=$empresa->txt_nombre?></h5>
		    
		    
		    <ul class="list-group list-group-flush">
			    <li class="list-group-item">
			    	<img class="ico" src="<?=Yii::$app->homeUrl?>img/ico/ico_rfc.png">
			    	<?=$empresa->txt_rfc?>
		    	</li>
			    <li class="list-group-item">
			    	<img class="ico" src="<?=Yii::$app->homeUrl?>img/ico/ico_loc.png">
			    	<?=$empresa->txt_direccion?>
		    	</li>
			    <li class="list-group-item">
			    	<img class="ico" src="<?=Yii::$app->homeUrl?>img/ico/ico_person.png">
			    	<?=$empresa->txt_persona_contacto?>
		    	</li>
			    <li class="list-group-item">
			    	<img class="ico" src="<?=Yii::$app->homeUrl?>img/ico/ico_phone.png">
			    	<?=$empresa->txt_telefono?>
			    </li>
			    <li class="list-group-item">
			    	<img class="ico" src="<?=Yii::$app->homeUrl?>img/ico/ico_loc.png">
			    	<?=$empresa->txt_calle?> 
			    	<?=$empresa->txt_num_exterior?> 
			    	<?=$empresa->txt_num_interior?>  
			    	<?=$empresa->idColonia->txt_nombre?> 
			    	<?=$empresa->idMunicipio->txt_nombre?> 
			    	<?=$empresa->idCiudad->txt_nombre?> 
			    	<?=$empresa->idEstado->txt_nombre?>
			    	CP, <?=$empresa->txt_cp?></li>
		  	</ul>

		  </div>
		</div>
	<?endif?>	

	</div>

<?if($empresa != null): ?>
	<div class="col-md-8">
	<div class="card">
		  <div class="card-header">
		    Mapa
		  </div>
		  <div class="card-block">
		    
		<div style="width: 100%; min-height: 400px; background-color: red;background-size: cover;  background-image: url('https://maps.googleapis.com/maps/api/staticmap?center=<?=$empresa->num_lat?>,<?=$empresa->num_long?>&zoom=10&size=600x600&maptype=roadmap&markers=color:blue%7Clabel:S%7C<?=$empresa->num_lat?>,<?=$empresa->num_long?>&key=AIzaSyApQXWD2AIAGyxTXoBGsOBhzXZB1gw3UO8'">
			
	</div>
	</div>
	</div>
	<?endif?>	

</div>

<?php if($empresa != null):?>
<?endif?>