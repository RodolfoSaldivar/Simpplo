

<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>

	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<?php echo $this->Html->css('materialize.min.css'); ?>

	<?php
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

	
	<div class="container" style="margin-top:5%;">
		<?php echo $this->fetch('content'); ?>
	</div>


	<a href="#hasta_arriba" class="hasta_arriba">Hasta Arriba</a>
	

	<?php echo $this->Html->script('jquery-2.1.1.min.js'); ?>
	<?php echo $this->Html->script('materialize.min.js'); ?>
	<?php echo $this->fetch('script'); ?>

	<script type="text/javascript">

		//Boton de hasta arriba
		$(window).scroll(function() {
			if ( $(window).scrollTop() > $(window).height() ) {
				$('a.hasta_arriba').fadeIn('slow');
			} else {
				$('a.hasta_arriba').fadeOut('slow');
			}
		});

		$('a.hasta_arriba').click(function() {
			$('html, body').animate({
				scrollTop: 0
			}, 700);
			return false;
		});

		<?php echo $this->Session->flash('flash', array(
		    'element' => 'toast'
		)); ?>

	</script>
</body>
</html>