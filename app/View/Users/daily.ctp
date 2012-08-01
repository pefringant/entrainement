<?php
$this->set('title_for_layout', ucfirst($this->TimePaginator->formatDate($date)));

$this->Html->script('jquery.masonry.min', array('inline' => false));
$this->Html->script('daily', array('inline' => false));

$usersByRow = 5;
?>

<div class="users daily">
	<div id="daily-header">
		<h1><?php echo ucfirst($this->TimePaginator->formatDate($date)); ?></h1>
		<?php
		if (strtotime($date) >= strtotime(date('Y-m-d'))): ?>
		<div class="actions">
			<?php
			echo $this->Html->link(
				"{$this->TB->icon('plus', 'white')} Ajouter un athlète", 
				array('controller' => 'programs', 'action' => 'add', 'date' => $date), 
					array(
					'class' => 'btn btn-primary',
					'escape' => false,
					'data-toggle' => 'modal',
					'data-target' => '#modalLayer'
				)
			); ?>
		</div>
		<?php endif; ?>
	</div>

	<?php if (empty($data)): ?>
	<div class="alert">
		<strong><?php echo ucfirst($this->TimePaginator->formatDate($date)); ?> : pas de programme</strong><br/>
	</div>
	<?php endif; ?>

	<div id="usersList">
		<?php if (!empty($data)) {
			foreach ($data as $i => $row) {
				$popoverPlacement = ($i % 5 <= 2) ? 'right' : 'left';
				echo $this->element('Users'.DS.'program', array('user' => $row, 'date' => $date, 'popoverPlacement' => $popoverPlacement));
			}
		} ?>
	</div>

	<?php echo $this->element('Pagination'.DS.'time_pagination', compact('date')); ?>
</div>

<div class="modal hide" id="modalLayer"></div>
