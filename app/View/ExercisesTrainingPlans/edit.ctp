<?php
$this->set('title_for_layout', "Exercice du programme {$this->request->data['TrainingPlan']['title']}");
?>
<div class="exercises form">
	<h1>Exercice du programme "<?php echo $this->request->data['TrainingPlan']['title']; ?>"</h1>

	<?php echo $this->Form->create('ExercisesTrainingPlan', array('class' => 'form-horizontal')); ?>
	<?php echo $this->Form->input('id'); ?> 
	<?php echo $this->Form->input('training_plan_id', array('type' => 'hidden')); ?> 
	<?php echo $this->TB->input('exercise_id', array(
		'label' => "Exercice :",
	)); ?> 
	<?php echo $this->TB->input('sets', array(
		'label' => "Séries :",
		'min' => 1,
		'class' => 'span1',
	)); ?> 
	<?php echo $this->TB->input('reps', array(
		'label' => "Répétitions :",
		'min' => 1,
		'class' => 'span1',
	)); ?> 
	<?php echo $this->TB->input('description', array(
		'label' => "Précisions :", 
	)); ?> 
	<?php echo $this->TB->input('break', array(
		'label' => "Récupération :",
		'class' => 'span1',
		'options' => $this->Programs->breakOptions,
	)); ?> 

	<div class="form-actions">
		<?php echo $this->TB->button("{$this->TB->icon('ok', 'white')} Valider", array("style" => "success", "size" => "large")); ?> 
		<?php echo $this->Form->postLink("{$this->TB->icon('trash', 'white')} Supprimer", array('action' => 'delete', $this->Form->value('User.id')), array('class' => 'btn btn-danger', 'escape' => false), "Etes-vous sûr de vouloir supprimer définitivement cet exercice ?"); ?> 
	</div>
	<?php echo $this->Form->end(); ?>

	<div class="actions">
		<?php echo $this->Html->link(
			"{$this->TB->icon('arrow-left')} Retour au programme \"{$this->request->data['TrainingPlan']['title']}\"", 
			array('controller' => 'training_plans', 'action' => 'edit', $this->request->data['TrainingPlan']['id']), 
			array(
				'class' => 'btn btn-large',
				'escape' => false,
			)
		); ?>
	</div>
</div>