<?php
$mainNav = array(
	"Athlètes" => array('plugin'=>null, 'controller'=>'users', 'action'=>'index'),
	"Exercices" => array('plugin'=>null, 'controller'=>'exercises', 'action'=>'index'),
	"Programmes types" => array('plugin'=>null, 'controller'=>'training_plans', 'action'=>'index'),
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
			
			<form method="post" action="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'daily')); ?>" class="navbar-form pull-left">
				<input type="date" name="date" value="<?php echo (empty($date)) ? date('Y-m-d') : $date; ?>" class="input-medium">
				<input type="submit" value="Voir les programmes" class="btn btn-primary">
			</form>

			<div class="nav-collapse pull-right">
				<ul class="nav">
					<?php foreach ($mainNav as $label => $url): ?>
					<li<?php if ($this->request->controller == $url['controller'] && $this->request->action == $url['action']) echo ' class="active"'; ?>>
						<?php echo $this->Html->link($label, $url); ?> 
					</li>
					<?php endforeach; ?> 
				</ul>
			</div>

			
		</div>
	</div>
</div>