<?php
$this->set('title_for_layout', ucfirst($this->TimePaginator->formatDate($date)));

$this->Html->script('jquery.masonry.min', array('inline' => false));
$this->Html->script('daily', array('inline' => false));

$usersByRow = 5;
?>

<div class="users daily">
	<div id="daily-header">
		<h1><?php echo ucfirst($this->TimePaginator->formatDate($date)); ?></h1>
		<?php if (strtotime($date) >= strtotime(date('Y-m-d'))): ?>
		<div class="actions">
			<?php echo $this->Html->link(
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

	<?php if (empty($users)): ?>
	<div class="alert">
		<strong>Pas d'athlète enregistré :</strong> 
		<?php echo $this->Html->link(
			"ajouter un athlète", 
			array('controller' => 'programs', 'action' => 'add', 'date' => $date), 
			array(
				'data-toggle' => 'modal',
				'data-target' => '#modalLayer'
			)
		); ?>
	</div>
	<?php endif; ?>

	<div id="usersList">
		<?php if (!empty($users)) {
			foreach ($users as $i => $user) {
				$popoverPlacement = ($i % $usersByRow <= ($usersByRow / 2)) ? 'right' : 'left';
				echo $this->element('Users'.DS.'program', array('user' => $user, 'date' => $date, 'popoverPlacement' => $popoverPlacement));
			}
		} ?>
	</div>

	<?php echo $this->element('Pagination'.DS.'time_pagination', compact('date')); ?>
</div>

<div class="modal hide" id="modalLayer"></div>
