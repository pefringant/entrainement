<?php
$this->set('title_for_layout', "Exercices");
?>

<div class="users index">
	<h1>Exercices</h1>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('full_name', "Nom complet"); ?></th>
				<th><?php echo $this->Paginator->sort('short_name', "Nom abrégé"); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>

		<tbody>
		<?php foreach ($exercises as $exercise): ?>
			<tr>
				<td><?php echo h($exercise['Exercise']['full_name']); ?>&nbsp;</td>
				<td><strong><?php echo h($exercise['Exercise']['short_name']); ?></strong>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link("{$this->TB->icon('pencil', 'white')} Modifier", array('action' => 'edit', $exercise['Exercise']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
					<?php echo $this->Form->postLink("{$this->TB->icon('trash', 'white')} Supprimer", array('action' => 'delete', $exercise['Exercise']['id']), array('class' => 'btn btn-danger', 'escape' => false), "Etes-vous sûr de vouloir supprimer définitivement cet exercice ?"); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	
	<?php echo $this->element('Pagination'.DS.'numbers'); ?> 

	<div class="actions">
		<?php
		$addIcon = $this->TB->icon('plus', 'white');
		echo $this->Html->link("$addIcon Ajouter un exercice", array('action' => 'add'), array(
			'class' => 'btn btn-success btn-large',
			'escape' => false,
		));
		?>
	</div>
</div>
