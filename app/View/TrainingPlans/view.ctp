<div class="trainingPlans view">
<h2><?php  echo __('Training Plan'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($trainingPlan['TrainingPlan']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($trainingPlan['TrainingPlan']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($trainingPlan['TrainingPlan']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($trainingPlan['TrainingPlan']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Training Plan'), array('action' => 'edit', $trainingPlan['TrainingPlan']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Training Plan'), array('action' => 'delete', $trainingPlan['TrainingPlan']['id']), null, __('Are you sure you want to delete # %s?', $trainingPlan['TrainingPlan']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Training Plans'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Training Plan'), array('action' => 'add')); ?> </li>
	</ul>
</div>
