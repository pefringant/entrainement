<!DOCTYPE html>
<html lang="fr">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout; ?></title>
	<!-- meta info -->
	<?php
		echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0'));
	?>

	<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- styles -->
	<?php
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-responsive.min');
	?>
	<!-- page specific scripts -->
		<?php echo $scripts_for_layout; ?>
</head>

<body>
	<?php echo $this->element('navbar'); ?> 

	<div class="container-fluid">
		<div class="row-fluid">
			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
		</div>
	</div>

	<?php echo $this->Html->script('jquery-1.7.2.min'); ?>
	<?php echo $this->Html->script('bootstrap.min'); ?>
</body>
</html>