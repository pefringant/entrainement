<?php
$this->set('title_for_layout', "Modifier un exercice");
?>
<div class="programs form">
	<h1>Modifier un exercice</h1>

	<?php echo $this->Form->create('Program', array('class' => 'form-horizontal')); ?>
	<?php echo $this->Form->input('id'); ?> 
	<?php echo $this->Form->input('user_id', array('type' => 'hidden')); ?> 
	<div class="control-group">
		<label class="control-label">Date :</label>
		<div class="controls">
			<?php echo $this->Form->date('effective_date'); ?> 
		</div>
	</div>
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
	<?php echo $this->TB->input('weight', array(
		'label' => "Poids :",
		'min' => 1,
		'style' => 'width: 78px',
		'help_inline' => " kg"
	)); ?><br/>
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
			"{$this->TB->icon('calendar')} Programme de {$this->data['User']['short_name']}", 
			array('action' => 'user_programs', $this->data['User']['id']), 
			array(
				'class' => 'btn btn-large',
				'escape' => false,
			)
		); ?>
	</div>
</div>