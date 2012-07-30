<?php
$this->set('title_for_layout', "Nouvel exercice");
?>
<div class="exercises form">
	<h1>Nouvel exercice</h1>

	<?php echo $this->Form->create('Exercise', array('class' => 'form-horizontal')); ?>
	<?php echo $this->TB->input('full_name', array(
		'label' => "Nom complet :",
	)); ?> 
	<?php echo $this->TB->input('short_name', array(
		'label' => "Nom abrégé :",
	)); ?> 
	<?php echo $this->TB->input('description', array(
		'label' => "Description :",
	)); ?> 
	<div class="form-actions">
		<?php echo $this->TB->button("{$this->TB->icon('ok', 'white')} Valider", array("style" => "success", "size" => "large")); ?>
	</div>
	<?php echo $this->Form->end(); ?>

	<div class="actions">
		<?php
		echo $this->Html->link("{$this->TB->icon('list')} Liste des exercices", array('action' => 'index'), array(
			'class' => 'btn btn-large',
			'escape' => false,
		));
		?>
	</div>
</div>