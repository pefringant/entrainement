<div class="programs view">
<h2><?php  echo __('Program'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($program['Program']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Exercise'); ?></dt>
		<dd>
			<?php echo $this->Html->link($program['Exercise']['id'], array('controller' => 'exercises', 'action' => 'view', $program['Exercise']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($program['User']['id'], array('controller' => 'users', 'action' => 'view', $program['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Effective Date'); ?></dt>
		<dd>
			<?php echo h($program['Program']['effective_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sets'); ?></dt>
		<dd>
			<?php echo h($program['Program']['sets']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reps'); ?></dt>
		<dd>
			<?php echo h($program['Program']['reps']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weight'); ?></dt>
		<dd>
			<?php echo h($program['Program']['weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stop'); ?></dt>
		<dd>
			<?php echo h($program['Program']['stop']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Break'); ?></dt>
		<dd>
			<?php echo h($program['Program']['break']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($program['Program']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Program'), array('action' => 'edit', $program['Program']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Program'), array('action' => 'delete', $program['Program']['id']), null, __('Are you sure you want to delete # %s?', $program['Program']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Programs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Program'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('controller' => 'exercises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercise'), array('controller' => 'exercises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
