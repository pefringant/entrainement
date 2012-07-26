<div class="programs index">
	<h1><?php echo ucfirst($this->TimePaginator->formatDate($date)); ?></h1>
	<?php if (empty($programs)): ?>
	<div class="alert">
		<strong>Pas de programme pour <?php echo $this->TimePaginator->formatDate($date); ?></strong><br/>
	</div>
	<?php else: ?>
	<table cellpadding="0" cellspacing="0">
		<?php foreach ($programs as $program): ?>
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
	<?php endif; ?>

	<?php
	if (strtotime($date) >= strtotime(date('Y-m-d'))): ?>
	<div class="actions">
		<?php
		$addIcon = $this->TB->icon('plus', 'white');
		echo $this->Html->link("$addIcon Ajouter un athlète", array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false));
		?>

		<a class="btn" data-toggle="modal" href="#myModal">Launch Modal</a>
	</div>
	<?php endif; ?>

	<?php echo $this->element('time_pagination', compact('date')); ?>
</div>


<div class="modal hide" id="myModal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>Modal header</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Close</a>
    <a href="#" class="btn btn-primary">Save changes</a>
  </div>
</div>

<?php 
$this->Js->buffer("
	$('#myModal').modal({
		remote: '/modal.html'
	});
");
?>