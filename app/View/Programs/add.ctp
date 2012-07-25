<div class="programs form">
<?php echo $this->Form->create('Program'); ?>
	<fieldset>
		<legend><?php echo __('Add Program'); ?></legend>
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
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Programs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('controller' => 'exercises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercise'), array('controller' => 'exercises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
