<?php echo $this->Form->create('Program'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('exercise_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('effective_date');
		echo $this->Form->input('sets');
		echo $this->Form->input('reps');
		echo $this->Form->input('weight');
		echo $this->Form->input('stop');
		echo $this->Form->input('break');
	?>
	</fieldset>
	<?php echo $this->Js->submit("Ajouter", array(
		'update' => '#modalLayerBody'
	)); ?>
<?php echo $this->Form->end(); ?>
