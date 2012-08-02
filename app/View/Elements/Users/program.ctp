<div id="user-<?php echo $user['User']['id']; ?>" class="user-program">
	<div class="user-program-header">
		<div class="user-program-photo">
			<?php echo $this->Users->photo($user, 'tiny'); ?> 
		</div>
		<h3><?php echo $this->Html->link(
			$user['User']['short_name'], 
			array('controller' => 'programs', 'action' => 'user_programs', $user['User']['id']),
			array(
				'title' => $user['User']['full_name']
			)
		); ?></h3>
		<div class="user-program-remove">
			<?php
			echo $this->Form->postLink(
				$this->TB->icon('remove'),
				array('controller' => 'programs', 'action' => 'delete_user', $user['User']['id'], $date),
				array('escape' => false),
				"Etes-vous sûr de vouloir supprimer définitivement ce programme ?"
			);
			?>
		</div>
	</div>
	<div class="user-program-body">
		<?php if (!empty($user['Program'])): ?>
		<table class="table table-condensed table-striped">
			<thead>
				<tr>
					<th>Exercice</th>
					<th>Récup</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($user['Program'] as $row) {
				if (empty($popoverPlacement)) {
					$popoverPlacement = 'right';
				}
				echo $this->element('Program'.DS.'user_program', array('program' => array('Program' => $row), 'popoverPlacement' => $popoverPlacement));
			} ?>
			</tbody>
		</table>
		<?php endif; ?>
	</div>
	<div class="user-program-footer">
		<?php echo $this->Html->link(
			"{$this->TB->icon('plus')} Ajouter un exercice",
			array('controller' => 'programs', 'action' => 'add', 'date' => $date, 'user' => $user['User']['id']),
			array(
				'escape' => false,
				'class' => 'btn btn-mini',
				'data-toggle' => 'modal',
				'data-target' => '#modalLayer'
			)
		); ?>
	</div>
</div>