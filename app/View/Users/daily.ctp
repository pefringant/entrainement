<div class="users daily">
	<h1><?php echo ucfirst($this->TimePaginator->formatDate($date)); ?></h1>
	<?php if (empty($users)): ?>
	<div class="alert">
		<strong>Pas de programme pour <?php echo $this->TimePaginator->formatDate($date); ?></strong><br/>
	</div>
	<?php else: ?>
	<table cellpadding="0" cellspacing="0">
		<?php foreach ($users as $user): ?>
		<tr>
			<td><?php echo h($user['User']['short_name']); ?>&nbsp;</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>

	<?php
	if (strtotime($date) >= strtotime(date('Y-m-d'))): ?>
	<div class="actions">
		<?php
		$addIcon = $this->TB->icon('plus', 'white');
		echo $this->Html->link("$addIcon Ajouter un athlète", array('action' => 'add', 'date' => $date), array(
			'class' => 'btn btn-primary',
			'escape' => false,
			'data-toggle' => 'modal',
			'data-target' => '#modalLayer'
		));
		?>
	</div>
	<?php endif; ?>

	<?php echo $this->element('time_pagination', compact('date')); ?>
</div>

<div class="modal hide" id="modalLayer">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Exercice</h3>
	</div>
	<div class="modal-body" id="modalLayerBody"></div>
</div>

<?php 
$this->Js->buffer("
	$('#modalLayer').modal({
		show: false
	});

	$('a[data-toggle=modal]').click(function(e) {
		e.preventDefault();
		$('#modalLayerBody').load($(this).attr('href'));
	});
");
?>