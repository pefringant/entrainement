<?php $this->Html->script('daily', array('inline' => false)); ?>

<div class="users daily">
	<h1><?php echo ucfirst($this->TimePaginator->formatDate($date)); ?></h1>

	<?php if (empty($data)): ?>
	<div class="alert">
		<strong><?php echo ucfirst($this->TimePaginator->formatDate($date)); ?> : pas de programme</strong><br/>
	</div>
	<?php endif; ?>

	<ul id="usersList">
	<?php if (!empty($data)): ?>
		<?php foreach ($data as $row): ?>
		<li><?php echo h($row['User']['short_name']); ?>&nbsp;</li>
		<?php endforeach; ?>
	<?php endif; ?>
	</ul>

	<?php
	if (strtotime($date) >= strtotime(date('Y-m-d'))): ?>
	<div class="actions">
		<?php
		echo $this->Html->link("{$this->TB->icon('plus', 'white')} Ajouter un athlète", array('controller' => 'programs', 'action' => 'add', 'date' => $date), array(
			'class' => 'btn btn-primary',
			'escape' => false,
			'data-toggle' => 'modal',
			'data-target' => '#modalLayer'
		));
		?>
	</div>
	<?php endif; ?>

	<?php echo $this->element('Pagination'.DS.'time_pagination', compact('date')); ?>
</div>

<div class="modal hide" id="modalLayer">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Exercice</h3>
	</div>
	<div class="modal-body" id="modalLayerBody"></div>
</div>
