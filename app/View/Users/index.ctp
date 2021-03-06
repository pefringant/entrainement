<?php
$this->set('title_for_layout', "Athlètes");

$this->Html->script('bootstrap-typeahead', array('inline' => false));
$this->Html->script('jquery.lastupdate', array('inline' => false));
$this->Js->buffer("
	$('tbody').lastupdate();
");

?>

<div class="users index">
	<h1>Athlètes</h1>

	<?php echo $this->Form->create('User', array(
		'class' => 'form-inline well',
		'inputDefaults' => array(
			'div' => false
		)
	)); ?>
	<?php echo $this->Form->input('query', array(
		'type' => 'text',
		'label' => "Recherche rapide :",
		'class' => 'input-large',
		'data-provide' => 'typeahead',
		'data-source' => '["' . join('","', $names) . '"]',
	)); ?> 
	<?php echo $this->Form->submit("Rechercher", array(
		'div' => false,
		'class' => 'btn btn-success'
	)); ?> 
	<?php echo $this->Form->end(); ?>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Photo</th>
				<th><?php echo $this->Paginator->sort('short_name', "Surnom"); ?></th>
				<th><?php echo $this->Paginator->sort('first_name', "Prénom"); ?></th>
				<th><?php echo $this->Paginator->sort('last_name', "Nom"); ?></th>
				<th class="actions">Actions</th>
			</tr>
		</thead>

		<tbody>
		<?php foreach ($users as $user): ?>
			<tr id="id-<?php echo $user['User']['id']; ?>">
				<td>
					<div class="user-program-photo">
						<?php echo $this->Users->photo($user, 'tiny'); ?>
					</div>
				</td>
				<td><strong><?php echo h($user['User']['short_name']); ?></strong>&nbsp;</td>
				<td><?php echo h($user['User']['first_name']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['last_name']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link("{$this->TB->icon('calendar', 'white')} Programme", array('controller' => 'programs', 'action' => 'user_programs', $user['User']['id']), array('class' => 'btn btn-info', 'escape' => false)); ?>
					<?php /*echo $this->Html->link("{$this->TB->icon('zoom-in', 'white')} Détails", array('action' => 'view', $user['User']['id']), array('class' => 'btn btn-info', 'escape' => false));*/ ?>
					<?php echo $this->Html->link("{$this->TB->icon('pencil', 'white')} Modifier", array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
					<?php echo $this->Form->postLink("{$this->TB->icon('trash', 'white')} Supprimer", array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger', 'escape' => false), "Etes-vous sûr de vouloir supprimer définitivement cet athlète ?"); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	
	<?php echo $this->element('Pagination'.DS.'numbers'); ?> 

	<div class="actions">
		<?php
		$addIcon = $this->TB->icon('plus', 'white');
		echo $this->Html->link("$addIcon Ajouter un athlète", array('action' => 'add'), array(
			'class' => 'btn btn-success btn-large',
			'escape' => false,
		));
		?>
	</div>
</div>
