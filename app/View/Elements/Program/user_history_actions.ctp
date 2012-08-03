<div class="actions">
	<?php echo $this->Html->link(
		"{$this->TB->icon('calendar')} Programme de {$user['User']['short_name']}", 
		array('controller' => 'programs', 'action' => 'user_programs', $user['User']['id']), 
		array(
			'class' => 'btn btn-large',
			'escape' => false,
		)
	); ?> 
	<?php echo $this->Html->link(
		"{$this->TB->icon('list')} Liste des athlètes", 
		array('controller' => 'users', 'action' => 'index'), 
		array(
			'class' => 'btn btn-large',
			'escape' => false,
		)
	); ?> 
</div>