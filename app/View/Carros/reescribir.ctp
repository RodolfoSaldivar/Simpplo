

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