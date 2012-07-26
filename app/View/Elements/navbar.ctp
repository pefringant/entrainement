<?php
$mainNav = array(
	"Programmes" => array('plugin'=>null, 'controller'=>'programs', 'action'=>'index'),
	"Exercices" => array('plugin'=>null, 'controller'=>'exercises', 'action'=>'index'),
	"Athlètes" => array('plugin'=>null, 'controller'=>'users', 'action'=>'index'),
);
?>

<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>

			<?php echo $this->Html->link("Caen Saint Jean-Eudes", '/', array('class' => 'brand')); ?> 
			
			<div class="nav-collapse">
				<ul class="nav">
					<?php foreach ($mainNav as $label => $url): ?>
					<li<?php if ($this->params['controller'] == $url['controller']) echo ' class="active"'; ?>>
						<?php echo $this->Html->link($label, $url); ?> 
					</li>
					<?php endforeach; ?> 
				</ul>
			</div>
		</div>
	</div>
</div>