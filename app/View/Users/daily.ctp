<?php
$this->set('title_for_layout', ucfirst($this->TimePaginator->formatDate($date)));

$this->Html->script('jquery.masonry.min', array('inline' => false));
$this->Html->script('daily', array('inline' => false));
?>

<div class="modal hide" id="modalLayer"></div>

<div id="users-daily-wrapper">
	<div id="users-daily">
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

		<div id="usersList">
			<?php if (!empty($users)) {
				foreach ($users as $i => $user) {
					echo $this->element('Users'.DS.'program', array('user' => $user, 'date' => $date));
				}
			} ?>

			<?php foreach ($trainingPlans as $plan) {
				echo $this->element('TrainingPlans'.DS.'plan', array('plan' => $plan));
			} ?>
		</div>

		<?php echo $this->element('Pagination'.DS.'time_pagination', compact('date')); ?>
	</div>
</div>