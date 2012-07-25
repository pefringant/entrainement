<div class="programs index">
	<h2><?php echo __('Programs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('exercise_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('effective_date'); ?></th>
			<th><?php echo $this->Paginator->sort('sets'); ?></th>
			<th><?php echo $this->Paginator->sort('reps'); ?></th>
			<th><?php echo $this->Paginator->sort('weight'); ?></th>
			<th><?php echo $this->Paginator->sort('stop'); ?></th>
			<th><?php echo $this->Paginator->sort('break'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($programs as $program): ?>
	<tr>
		<td><?php echo h($program['Program']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($program['Exercise']['short_name'], array('controller' => 'exercises', 'action' => 'view', $program['Exercise']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($program['User']['short_name'], array('controller' => 'users', 'action' => 'view', $program['User']['id'])); ?>
		</td>
		<td><?php echo h($program['Program']['effective_date']); ?>&nbsp;</td>
		<td><?php echo h($program['Program']['sets']); ?>&nbsp;</td>
		<td><?php echo h($program['Program']['reps']); ?>&nbsp;</td>
		<td><?php echo h($program['Program']['weight']); ?>&nbsp;</td>
		<td><?php echo h($program['Program']['stop']); ?>&nbsp;</td>
		<td><?php echo h($program['Program']['break']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $program['Program']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $program['Program']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $program['Program']['id']), null, __('Are you sure you want to delete # %s?', $program['Program']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Program'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Exercises'), array('controller' => 'exercises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exercise'), array('controller' => 'exercises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
