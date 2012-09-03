<?php
$this->set('title_for_layout', "Nouveau programme type");
?>
<div class="trainingPlans form">
	<h1>Nouveau programme type</h1>

	<?php echo $this->Form->create('TrainingPlan', array('type' => 'file', 'class' => 'form-horizontal')); ?>
	<fieldset>
		<?php echo $this->TB->input('title', array(
			'label' => "Titre :",
		)); ?> 
	</fieldset>

	<div class="form-actions">
		<?php echo $this->TB->button("Continuer", array("style" => "success", "size" => "large")); ?>
	</div>
	<?php echo $this->Form->end(); ?>

	<div class="actions">
		<?php
		echo $this->Html->link("{$this->TB->icon('list')} Liste des programmes types", array('action' => 'index'), array(
			'class' => 'btn btn-large',
			'escape' => false,
		));
		?>
	</div>
</div>