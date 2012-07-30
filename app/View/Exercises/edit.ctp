<?php
$this->set('title_for_layout', "Modifier un exercice");
?>
<div class="exercises form">
	<h1>Modifier un exercice</h1>

	<?php echo $this->Form->create('Exercise', array('class' => 'form-horizontal')); ?>
	<?php echo $this->Form->input('id'); ?> 
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
		<?php echo $this->Form->postLink("{$this->TB->icon('trash', 'white')} Supprimer", array('action' => 'delete', $this->Form->value('Exercice.id')), array('class' => 'btn btn-danger', 'escape' => false), "Etes-vous sûr de vouloir supprimer définitivement cet exercice ?"); ?> 
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