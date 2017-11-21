


<div class="row">
	<div class="col s12">
		<h3>Avisos de ocación:</h3>
	</div>
</div>

<div class="row">
	<div class="col s12">
		<h5>Estos son los avisos guardados en la base de datos:</h5>
	</div>
</div>

<div class="row">
	<div class="col s12 m8 l6">
		<a id="btn_eliminar" class="waves-effect waves-light btn left" style="padding:0 20px;">
			<i class="material-icons left">delete</i>
			Eliminar
		</a>
		<a id="btn_reescribir" class="waves-effect waves-light btn right" style="padding:0 20px;">
			<i class="material-icons left">restore_page</i>
			Reescribir
		</a>
	</div>
</div>

<div class="row">
	<div class="col s12 m8 l6">
		<a href="/rest.json" class="waves-effect waves-light btn right" style="width:100%;">
			Ver JSON
		</a>
	</div>
</div>

<div class="row">
	<div class="col s12 m8 l6">
		<a href="/rest.xml" class="waves-effect waves-light btn right" style="width:100%;">
			Ver XML
		</a>
	</div>
</div>

<table class="highlight bordered">
	<thead>
		<tr>
			<th>Foto</th>
			<th>Nombre</th>
			<th>Precio</th>
			<th>Año</th>
			<th>Transmisión</th>
			<th>Color</th>
			<th>Puertas</th>
		</tr>
	</thead>

	<tbody id="cambiar_tabla">
		<?php foreach ($carros as $key => $carro): ?>
			<tr>
				<td>
					<img src="<?php echo $carro["Carro"]["foto"] ?>">
				</td>
				<td>
					<?php echo $carro["Carro"]["nombre"] ?>
				</td>
				<td>
					<?php echo $carro["Carro"]["precio"] ?>
				</td>
				<td>
					<?php echo $carro["Carro"]["anio"] ?>
				</td>
				<td>
					<?php echo $carro["Carro"]["transmision"] ?>
				</td>
				<td>
					<?php echo $carro["Carro"]["color"] ?>
				</td>
				<td>
					<?php echo $carro["Carro"]["puertas"] ?>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>



<?php $this->Html->scriptStart(array('inline' => false)); ?>

	$(document).on("click", "#btn_eliminar", function()
	{
		$.ajax({
	        type:'POST',
	        cache: false,
	        url: '/carros/eliminar',
	        success: function(response)
	        {
	        	$('#cambiar_tabla').replaceWith(response);
	        	Materialize.toast("Avisos eliminados de la BDD.", 5000)
	        }
	    });
	});



	$(document).on("click", "#btn_reescribir", function()
	{
		$.ajax({
	        type:'POST',
	        cache: false,
	        url: '/carros/reescribir',
	        success: function(response)
	        {
	        	$('#cambiar_tabla').replaceWith(response);
	        	Materialize.toast("Avisos guardados.", 5000)
	        }
	    });
	});

<?php $this->Html->scriptEnd(); ?>